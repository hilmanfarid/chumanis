<?php
//Include Common Files @1-BA5C2B36
define("RelativePath", "..");
define("PathToCurrentPage", "/admin.menu/");
define("FileName", "p_role_maint.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Master Page implementation @1-ED59B080
include_once(RelativePath . "/admin.menu/../Designs/d01/MasterPage.php");
//End Master Page implementation

class clsRecordroleForm { //roleForm Class @4-702DEF5F

//Variables @4-9E315808

    // Public variables
    public $ComponentType = "Record";
    public $ComponentName;
    public $Parent;
    public $HTMLFormAction;
    public $PressedButton;
    public $Errors;
    public $ErrorBlock;
    public $FormSubmitted;
    public $FormEnctype;
    public $Visible;
    public $IsEmpty;

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";

    public $InsertAllowed = false;
    public $UpdateAllowed = false;
    public $DeleteAllowed = false;
    public $ReadAllowed   = false;
    public $EditMode      = false;
    public $ds;
    public $DataSource;
    public $ValidatingControls;
    public $Controls;
    public $Attributes;

    // Class variables
//End Variables

//Class_Initialize Event @4-37F3D5BD
    function clsRecordroleForm($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record roleForm/Error";
        $this->DataSource = new clsroleFormDataSource($this);
        $this->ds = & $this->DataSource;
        $this->InsertAllowed = true;
        $this->UpdateAllowed = true;
        $this->DeleteAllowed = true;
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "roleForm";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->EditMode = ($FormMethod == "Edit");
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_Insert = new clsButton("Button_Insert", $Method, $this);
            $this->Button_Update = new clsButton("Button_Update", $Method, $this);
            $this->Button_Delete = new clsButton("Button_Delete", $Method, $this);
            $this->Button_Cancel = new clsButton("Button_Cancel", $Method, $this);
            $this->code = new clsControl(ccsTextBox, "code", "Role Code", ccsText, "", CCGetRequestParam("code", $Method, NULL), $this);
            $this->code->Required = true;
            $this->description = new clsControl(ccsTextArea, "description", "Description", ccsText, "", CCGetRequestParam("description", $Method, NULL), $this);
            $this->updated_by = new clsControl(ccsTextBox, "updated_by", "Updated By", ccsText, "", CCGetRequestParam("updated_by", $Method, NULL), $this);
            $this->p_role_id = new clsControl(ccsHidden, "p_role_id", "p_role_id", ccsFloat, "", CCGetRequestParam("p_role_id", $Method, NULL), $this);
            $this->listing_no = new clsControl(ccsTextBox, "listing_no", "listing_no", ccsFloat, "", CCGetRequestParam("listing_no", $Method, NULL), $this);
            $this->listing_no->Required = true;
            $this->valid_from = new clsControl(ccsTextBox, "valid_from", "Awal Berlaku", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("valid_from", $Method, NULL), $this);
            $this->created_by = new clsControl(ccsTextBox, "created_by", "Created By", ccsText, "", CCGetRequestParam("created_by", $Method, NULL), $this);
            $this->creation_date = new clsControl(ccsTextBox, "creation_date", "Creation Date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("creation_date", $Method, NULL), $this);
            $this->updated_date = new clsControl(ccsTextBox, "updated_date", "Updated Date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("updated_date", $Method, NULL), $this);
            $this->idmenulabel = new clsControl(ccsHidden, "idmenulabel", "idmenulabel", ccsFloat, "", CCGetRequestParam("idmenulabel", $Method, NULL), $this);
            $this->valid_to = new clsControl(ccsTextBox, "valid_to", "Akhir Berlaku", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("valid_to", $Method, NULL), $this);
            $this->DatePicker_valid_to2 = new clsDatePicker("DatePicker_valid_to2", "roleForm", "valid_to", $this);
            $this->DatePicker_valid_from2 = new clsDatePicker("DatePicker_valid_from2", "roleForm", "valid_from", $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->updated_by->Value) && !strlen($this->updated_by->Value) && $this->updated_by->Value !== false)
                    $this->updated_by->SetText(CCGetUserLogin());
                if(!is_array($this->valid_from->Value) && !strlen($this->valid_from->Value) && $this->valid_from->Value !== false)
                    $this->valid_from->SetValue(time());
                if(!is_array($this->created_by->Value) && !strlen($this->created_by->Value) && $this->created_by->Value !== false)
                    $this->created_by->SetText(CCGetUserLogin());
                if(!is_array($this->creation_date->Value) && !strlen($this->creation_date->Value) && $this->creation_date->Value !== false)
                    $this->creation_date->SetValue(time());
                if(!is_array($this->updated_date->Value) && !strlen($this->updated_date->Value) && $this->updated_date->Value !== false)
                    $this->updated_date->SetValue(time());
                if(!is_array($this->valid_to->Value) && !strlen($this->valid_to->Value) && $this->valid_to->Value !== false)
                    $this->valid_to->SetValue(time());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @4-B7053FAD
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlp_role_id"] = CCGetFromGet("p_role_id", NULL);
    }
//End Initialize Method

//Validate Method @4-D440C9FC
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->code->Validate() && $Validation);
        $Validation = ($this->description->Validate() && $Validation);
        $Validation = ($this->updated_by->Validate() && $Validation);
        $Validation = ($this->p_role_id->Validate() && $Validation);
        $Validation = ($this->listing_no->Validate() && $Validation);
        $Validation = ($this->valid_from->Validate() && $Validation);
        $Validation = ($this->created_by->Validate() && $Validation);
        $Validation = ($this->creation_date->Validate() && $Validation);
        $Validation = ($this->updated_date->Validate() && $Validation);
        $Validation = ($this->idmenulabel->Validate() && $Validation);
        $Validation = ($this->valid_to->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->code->Errors->Count() == 0);
        $Validation =  $Validation && ($this->description->Errors->Count() == 0);
        $Validation =  $Validation && ($this->updated_by->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_role_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->listing_no->Errors->Count() == 0);
        $Validation =  $Validation && ($this->valid_from->Errors->Count() == 0);
        $Validation =  $Validation && ($this->created_by->Errors->Count() == 0);
        $Validation =  $Validation && ($this->creation_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->updated_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->idmenulabel->Errors->Count() == 0);
        $Validation =  $Validation && ($this->valid_to->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @4-0DA7DBDB
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->code->Errors->Count());
        $errors = ($errors || $this->description->Errors->Count());
        $errors = ($errors || $this->updated_by->Errors->Count());
        $errors = ($errors || $this->p_role_id->Errors->Count());
        $errors = ($errors || $this->listing_no->Errors->Count());
        $errors = ($errors || $this->valid_from->Errors->Count());
        $errors = ($errors || $this->created_by->Errors->Count());
        $errors = ($errors || $this->creation_date->Errors->Count());
        $errors = ($errors || $this->updated_date->Errors->Count());
        $errors = ($errors || $this->idmenulabel->Errors->Count());
        $errors = ($errors || $this->valid_to->Errors->Count());
        $errors = ($errors || $this->DatePicker_valid_to2->Errors->Count());
        $errors = ($errors || $this->DatePicker_valid_from2->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @4-E5EB304E
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        $this->DataSource->Prepare();
        if(!$this->FormSubmitted) {
            $this->EditMode = $this->DataSource->AllParametersSet;
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = $this->EditMode ? "Button_Update" : "Button_Insert";
            if($this->Button_Insert->Pressed) {
                $this->PressedButton = "Button_Insert";
            } else if($this->Button_Update->Pressed) {
                $this->PressedButton = "Button_Update";
            } else if($this->Button_Delete->Pressed) {
                $this->PressedButton = "Button_Delete";
            } else if($this->Button_Cancel->Pressed) {
                $this->PressedButton = "Button_Cancel";
            }
        }
        $Redirect = "p_role_list.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "code"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = "p_role_list.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "code", "p_role_id"));
            if(!CCGetEvent($this->Button_Delete->CCSEvents, "OnClick", $this->Button_Delete) || !$this->DeleteRow()) {
                $Redirect = "";
            }
        } else if($this->PressedButton == "Button_Cancel") {
            if(!CCGetEvent($this->Button_Cancel->CCSEvents, "OnClick", $this->Button_Cancel)) {
                $Redirect = "";
            }
        } else if($this->Validate()) {
            if($this->PressedButton == "Button_Insert") {
                if(!CCGetEvent($this->Button_Insert->CCSEvents, "OnClick", $this->Button_Insert) || !$this->InsertRow()) {
                    $Redirect = "";
                }
            } else if($this->PressedButton == "Button_Update") {
                if(!CCGetEvent($this->Button_Update->CCSEvents, "OnClick", $this->Button_Update) || !$this->UpdateRow()) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
        if ($Redirect)
            $this->DataSource->close();
    }
//End Operation Method

//InsertRow Method @4-ACC0A675
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->code->SetValue($this->code->GetValue(true));
        $this->DataSource->description->SetValue($this->description->GetValue(true));
        $this->DataSource->valid_from->SetValue($this->valid_from->GetValue(true));
        $this->DataSource->valid_to->SetValue($this->valid_to->GetValue(true));
        $this->DataSource->listing_no->SetValue($this->listing_no->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @4-5AEFDF73
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->code->SetValue($this->code->GetValue(true));
        $this->DataSource->description->SetValue($this->description->GetValue(true));
        $this->DataSource->listing_no->SetValue($this->listing_no->GetValue(true));
        $this->DataSource->valid_from->SetValue($this->valid_from->GetValue(true));
        $this->DataSource->valid_to->SetValue($this->valid_to->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @4-3301F88F
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->p_role_id->SetValue($this->p_role_id->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @4-CE187B2D
    function Show()
    {
        global $CCSUseAmp;
        $Tpl = CCGetTemplate($this);
        global $FileName;
        global $CCSLocales;
        $Error = "";

        if(!$this->Visible)
            return;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if($this->EditMode) {
            if($this->DataSource->Errors->Count()){
                $this->Errors->AddErrors($this->DataSource->Errors);
                $this->DataSource->Errors->clear();
            }
            $this->DataSource->Open();
            if($this->DataSource->Errors->Count() == 0 && $this->DataSource->next_record()) {
                $this->DataSource->SetValues();
                if(!$this->FormSubmitted){
                    $this->code->SetValue($this->DataSource->code->GetValue());
                    $this->description->SetValue($this->DataSource->description->GetValue());
                    $this->updated_by->SetValue($this->DataSource->updated_by->GetValue());
                    $this->p_role_id->SetValue($this->DataSource->p_role_id->GetValue());
                    $this->listing_no->SetValue($this->DataSource->listing_no->GetValue());
                    $this->valid_from->SetValue($this->DataSource->valid_from->GetValue());
                    $this->created_by->SetValue($this->DataSource->created_by->GetValue());
                    $this->creation_date->SetValue($this->DataSource->creation_date->GetValue());
                    $this->updated_date->SetValue($this->DataSource->updated_date->GetValue());
                    $this->valid_to->SetValue($this->DataSource->valid_to->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->code->Errors->ToString());
            $Error = ComposeStrings($Error, $this->description->Errors->ToString());
            $Error = ComposeStrings($Error, $this->updated_by->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_role_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->listing_no->Errors->ToString());
            $Error = ComposeStrings($Error, $this->valid_from->Errors->ToString());
            $Error = ComposeStrings($Error, $this->created_by->Errors->ToString());
            $Error = ComposeStrings($Error, $this->creation_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->updated_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->idmenulabel->Errors->ToString());
            $Error = ComposeStrings($Error, $this->valid_to->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_valid_to2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_valid_from2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DataSource->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);
        $this->Button_Insert->Visible = !$this->EditMode && $this->InsertAllowed;
        $this->Button_Update->Visible = $this->EditMode && $this->UpdateAllowed;
        $this->Button_Delete->Visible = $this->EditMode && $this->DeleteAllowed;

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->Button_Insert->Show();
        $this->Button_Update->Show();
        $this->Button_Delete->Show();
        $this->Button_Cancel->Show();
        $this->code->Show();
        $this->description->Show();
        $this->updated_by->Show();
        $this->p_role_id->Show();
        $this->listing_no->Show();
        $this->valid_from->Show();
        $this->created_by->Show();
        $this->creation_date->Show();
        $this->updated_date->Show();
        $this->idmenulabel->Show();
        $this->valid_to->Show();
        $this->DatePicker_valid_to2->Show();
        $this->DatePicker_valid_from2->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End roleForm Class @4-FCB6E20C

class clsroleFormDataSource extends clsDBhrcon {  //roleFormDataSource Class @4-F8C9D9C3

//DataSource Variables @4-2A625F71
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $InsertParameters;
    public $UpdateParameters;
    public $DeleteParameters;
    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $code;
    public $description;
    public $updated_by;
    public $p_role_id;
    public $listing_no;
    public $valid_from;
    public $created_by;
    public $creation_date;
    public $updated_date;
    public $idmenulabel;
    public $valid_to;
//End DataSource Variables

//DataSourceClass_Initialize Event @4-EBCD9EDD
    function clsroleFormDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record roleForm/Error";
        $this->Initialize();
        $this->code = new clsField("code", ccsText, "");
        
        $this->description = new clsField("description", ccsText, "");
        
        $this->updated_by = new clsField("updated_by", ccsText, "");
        
        $this->p_role_id = new clsField("p_role_id", ccsFloat, "");
        
        $this->listing_no = new clsField("listing_no", ccsFloat, "");
        
        $this->valid_from = new clsField("valid_from", ccsDate, $this->DateFormat);
        
        $this->created_by = new clsField("created_by", ccsText, "");
        
        $this->creation_date = new clsField("creation_date", ccsDate, $this->DateFormat);
        
        $this->updated_date = new clsField("updated_date", ccsDate, $this->DateFormat);
        
        $this->idmenulabel = new clsField("idmenulabel", ccsFloat, "");
        
        $this->valid_to = new clsField("valid_to", ccsDate, $this->DateFormat);
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @4-92BA5D3F
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlp_role_id", ccsFloat, "", "", $this->Parameters["urlp_role_id"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "p_role_id", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @4-6F45D08A
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM p_role {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @4-61549BDC
    function SetValues()
    {
        $this->code->SetDBValue($this->f("code"));
        $this->description->SetDBValue($this->f("description"));
        $this->updated_by->SetDBValue($this->f("updated_by"));
        $this->p_role_id->SetDBValue(trim($this->f("p_role_id")));
        $this->listing_no->SetDBValue(trim($this->f("listing_no")));
        $this->valid_from->SetDBValue(trim($this->f("valid_from")));
        $this->created_by->SetDBValue($this->f("created_by"));
        $this->creation_date->SetDBValue(trim($this->f("creation_date")));
        $this->updated_date->SetDBValue(trim($this->f("updated_date")));
        $this->valid_to->SetDBValue(trim($this->f("valid_to")));
    }
//End SetValues Method

//Insert Method @4-7A59C882
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["code"] = new clsSQLParameter("ctrlcode", ccsText, "", "", $this->code->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["description"] = new clsSQLParameter("ctrldescription", ccsText, "", "", $this->description->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["struser"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["valid_from"] = new clsSQLParameter("ctrlvalid_from", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), array("dd", "-", "mmm", "-", "yyyy"), $this->valid_from->GetValue(true), null, false, $this->ErrorBlock);
        $this->cp["valid_to"] = new clsSQLParameter("ctrlvalid_to", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), array("dd", "-", "mmm", "-", "yyyy"), $this->valid_to->GetValue(true), null, false, $this->ErrorBlock);
        $this->cp["listing_no"] = new clsSQLParameter("ctrllisting_no", ccsInteger, "", "", $this->listing_no->GetValue(true), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["code"]->GetValue()) and !strlen($this->cp["code"]->GetText()) and !is_bool($this->cp["code"]->GetValue())) 
            $this->cp["code"]->SetValue($this->code->GetValue(true));
        if (!is_null($this->cp["description"]->GetValue()) and !strlen($this->cp["description"]->GetText()) and !is_bool($this->cp["description"]->GetValue())) 
            $this->cp["description"]->SetValue($this->description->GetValue(true));
        if (!is_null($this->cp["struser"]->GetValue()) and !strlen($this->cp["struser"]->GetText()) and !is_bool($this->cp["struser"]->GetValue())) 
            $this->cp["struser"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["valid_from"]->GetValue()) and !strlen($this->cp["valid_from"]->GetText()) and !is_bool($this->cp["valid_from"]->GetValue())) 
            $this->cp["valid_from"]->SetValue($this->valid_from->GetValue(true));
        if (!strlen($this->cp["valid_from"]->GetText()) and !is_bool($this->cp["valid_from"]->GetValue(true))) 
            $this->cp["valid_from"]->SetText(null);
        if (!is_null($this->cp["valid_to"]->GetValue()) and !strlen($this->cp["valid_to"]->GetText()) and !is_bool($this->cp["valid_to"]->GetValue())) 
            $this->cp["valid_to"]->SetValue($this->valid_to->GetValue(true));
        if (!strlen($this->cp["valid_to"]->GetText()) and !is_bool($this->cp["valid_to"]->GetValue(true))) 
            $this->cp["valid_to"]->SetText(null);
        if (!is_null($this->cp["listing_no"]->GetValue()) and !strlen($this->cp["listing_no"]->GetText()) and !is_bool($this->cp["listing_no"]->GetValue())) 
            $this->cp["listing_no"]->SetValue($this->listing_no->GetValue(true));
        if (!strlen($this->cp["listing_no"]->GetText()) and !is_bool($this->cp["listing_no"]->GetValue(true))) 
            $this->cp["listing_no"]->SetText(0);
        $this->SQL = "select * from f_crud_p_role\n" .
        "(null, \n" .
        "'" . $this->SQLValue($this->cp["code"]->GetDBValue(), ccsText) . "',\n" .
        "" . $this->SQLValue($this->cp["listing_no"]->GetDBValue(), ccsInteger) . ",\n" .
        "to_date('" . $this->SQLValue($this->cp["valid_from"]->GetDBValue(), ccsDate) . "','dd-mon-yyyy'),\n" .
        "(case when '" . $this->SQLValue($this->cp["valid_to"]->GetDBValue(), ccsDate) . "'='' or '" . $this->SQLValue($this->cp["valid_to"]->GetDBValue(), ccsDate) . "' is null then null else to_date('" . $this->SQLValue($this->cp["valid_to"]->GetDBValue(), ccsDate) . "','dd-mon-yyyy') end),\n" .
        "'" . $this->SQLValue($this->cp["description"]->GetDBValue(), ccsText) . "',\n" .
        "'" . $this->SQLValue($this->cp["struser"]->GetDBValue(), ccsText) . "',\n" .
        "'C')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            //begin-tambahan
   			$Result = $this->next_record();			
			if (($this->f('oint_result')) != 1) {
				$this->Errors->AddError($this->f('ostr_msg'));
				return;
			} 
			//end-tambahan     
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @4-093A1F09
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["code"] = new clsSQLParameter("ctrlcode", ccsText, "", "", $this->code->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["description"] = new clsSQLParameter("ctrldescription", ccsText, "", "", $this->description->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_role_id"] = new clsSQLParameter("urlp_role_id", ccsFloat, "", "", CCGetFromGet("p_role_id", NULL), 0, false, $this->ErrorBlock);
        $this->cp["struser"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["listing_no"] = new clsSQLParameter("ctrllisting_no", ccsInteger, "", "", $this->listing_no->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["valid_from"] = new clsSQLParameter("ctrlvalid_from", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), array("dd", "-", "mmm", "-", "yyyy"), $this->valid_from->GetValue(true), null, false, $this->ErrorBlock);
        $this->cp["valid_to"] = new clsSQLParameter("ctrlvalid_to", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), array("dd", "-", "mmm", "-", "yyyy"), $this->valid_to->GetValue(true), null, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["code"]->GetValue()) and !strlen($this->cp["code"]->GetText()) and !is_bool($this->cp["code"]->GetValue())) 
            $this->cp["code"]->SetValue($this->code->GetValue(true));
        if (!is_null($this->cp["description"]->GetValue()) and !strlen($this->cp["description"]->GetText()) and !is_bool($this->cp["description"]->GetValue())) 
            $this->cp["description"]->SetValue($this->description->GetValue(true));
        if (!is_null($this->cp["p_role_id"]->GetValue()) and !strlen($this->cp["p_role_id"]->GetText()) and !is_bool($this->cp["p_role_id"]->GetValue())) 
            $this->cp["p_role_id"]->SetText(CCGetFromGet("p_role_id", NULL));
        if (!strlen($this->cp["p_role_id"]->GetText()) and !is_bool($this->cp["p_role_id"]->GetValue(true))) 
            $this->cp["p_role_id"]->SetText(0);
        if (!is_null($this->cp["struser"]->GetValue()) and !strlen($this->cp["struser"]->GetText()) and !is_bool($this->cp["struser"]->GetValue())) 
            $this->cp["struser"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["listing_no"]->GetValue()) and !strlen($this->cp["listing_no"]->GetText()) and !is_bool($this->cp["listing_no"]->GetValue())) 
            $this->cp["listing_no"]->SetValue($this->listing_no->GetValue(true));
        if (!strlen($this->cp["listing_no"]->GetText()) and !is_bool($this->cp["listing_no"]->GetValue(true))) 
            $this->cp["listing_no"]->SetText(0);
        if (!is_null($this->cp["valid_from"]->GetValue()) and !strlen($this->cp["valid_from"]->GetText()) and !is_bool($this->cp["valid_from"]->GetValue())) 
            $this->cp["valid_from"]->SetValue($this->valid_from->GetValue(true));
        if (!strlen($this->cp["valid_from"]->GetText()) and !is_bool($this->cp["valid_from"]->GetValue(true))) 
            $this->cp["valid_from"]->SetText(null);
        if (!is_null($this->cp["valid_to"]->GetValue()) and !strlen($this->cp["valid_to"]->GetText()) and !is_bool($this->cp["valid_to"]->GetValue())) 
            $this->cp["valid_to"]->SetValue($this->valid_to->GetValue(true));
        if (!strlen($this->cp["valid_to"]->GetText()) and !is_bool($this->cp["valid_to"]->GetValue(true))) 
            $this->cp["valid_to"]->SetText(null);
        $this->SQL = "select * from f_crud_p_role\n" .
        "(" . $this->SQLValue($this->cp["p_role_id"]->GetDBValue(), ccsFloat) . ", \n" .
        "'" . $this->SQLValue($this->cp["code"]->GetDBValue(), ccsText) . "',\n" .
        "" . $this->SQLValue($this->cp["listing_no"]->GetDBValue(), ccsInteger) . ",\n" .
        "to_date('" . $this->SQLValue($this->cp["valid_from"]->GetDBValue(), ccsDate) . "','dd-mon-yyyy'),\n" .
        "(case when '" . $this->SQLValue($this->cp["valid_to"]->GetDBValue(), ccsDate) . "'='' or '" . $this->SQLValue($this->cp["valid_to"]->GetDBValue(), ccsDate) . "' is null then null else to_date('" . $this->SQLValue($this->cp["valid_to"]->GetDBValue(), ccsDate) . "','dd-mon-yyyy') end),\n" .
        "'" . $this->SQLValue($this->cp["description"]->GetDBValue(), ccsText) . "',\n" .
        "'" . $this->SQLValue($this->cp["struser"]->GetDBValue(), ccsText) . "',\n" .
        "'U')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            //begin-tambahan
   			$Result = $this->next_record();			
			if (($this->f('oint_result')) != 1) {
				$this->Errors->AddError($this->f('ostr_msg'));
				return;
			} 
			//end-tambahan     
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @4-CF67F3D9
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["p_role_id"] = new clsSQLParameter("ctrlp_role_id", ccsInteger, "", "", $this->p_role_id->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["struser"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["p_role_id"]->GetValue()) and !strlen($this->cp["p_role_id"]->GetText()) and !is_bool($this->cp["p_role_id"]->GetValue())) 
            $this->cp["p_role_id"]->SetValue($this->p_role_id->GetValue(true));
        if (!strlen($this->cp["p_role_id"]->GetText()) and !is_bool($this->cp["p_role_id"]->GetValue(true))) 
            $this->cp["p_role_id"]->SetText(0);
        if (!is_null($this->cp["struser"]->GetValue()) and !strlen($this->cp["struser"]->GetText()) and !is_bool($this->cp["struser"]->GetValue())) 
            $this->cp["struser"]->SetValue(CCGetSession("UserName", NULL));
        $this->SQL = "select * from f_crud_p_role\n" .
        "(" . $this->SQLValue($this->cp["p_role_id"]->GetDBValue(), ccsInteger) . ", \n" .
        "null,\n" .
        "null,\n" .
        "null,\n" .
        "null,\n" .
        "null,\n" .
        "'" . $this->SQLValue($this->cp["struser"]->GetDBValue(), ccsText) . "',\n" .
        "'D')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            //begin-tambahan
   			$Result = $this->next_record();			
			if (($this->f('oint_result')) != 1) {
				$this->Errors->AddError($this->f('ostr_msg'));
				return;
			} 
			//end-tambahan     
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End roleFormDataSource Class @4-FCB6E20C

//Include Page implementation @69-675D7754
include_once(RelativePath . "/admin/NewPage1.php");
//End Include Page implementation

//Initialize Page @1-FC017949
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";
$PathToCurrentMasterPage = "";
$TemplatePathValue = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";
$MasterPage = null;
$TemplateSource = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "p_role_maint.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-C4275029
$DBhrcon = new clsDBhrcon();
$MainPage->Connections["hrcon"] = & $DBhrcon;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$MasterPage = new clsMasterPage("/admin.menu/../Designs/d01/", "MasterPage", $MainPage);
$MasterPage->Attributes = $Attributes;
$MasterPage->Initialize();
$Head = new clsPanel("Head", $MainPage);
$Head->PlaceholderName = "Head";
$Content = new clsPanel("Content", $MainPage);
$Content->PlaceholderName = "Content";
$roleForm = new clsRecordroleForm("", $MainPage);
$NewPage1 = new clsNewPage1("../admin/", "NewPage1", $MainPage);
$NewPage1->Initialize();
$MainPage->Head = & $Head;
$MainPage->Content = & $Content;
$MainPage->roleForm = & $roleForm;
$MainPage->NewPage1 = & $NewPage1;
$Content->AddComponent("roleForm", $roleForm);
$Content->AddComponent("NewPage1", $NewPage1);
$roleForm->Initialize();
$ScriptIncludes = "";
$SList = explode("|", $Scripts);
foreach ($SList as $Script) {
    if ($Script != "") $ScriptIncludes = $ScriptIncludes . "<script src=\"" . $PathToRoot . $Script . "\" type=\"text/javascript\"></script>\n";
}
$Attributes->SetValue("scriptIncludes", $ScriptIncludes);

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-A7427295
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
if (strlen($TemplateSource)) {
    $Tpl->LoadTemplateFromStr($TemplateSource, $BlockToParse, "CP1252");
} else {
    $Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1252");
}
$Tpl->SetVar("CCS_PathToRoot", $PathToRoot);
$Tpl->SetVar("CCS_PathToMasterPage", RelativePath . $PathToCurrentMasterPage);
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "../");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-AAA26939
$MasterPage->Operations();
$NewPage1->Operations();
$roleForm->Operation();
//End Execute Components

//Go to destination page @1-75B3C9D1
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBhrcon->close();
    header("Location: " . $Redirect);
    unset($roleForm);
    $NewPage1->Class_Terminate();
    unset($NewPage1);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-1919319E
$Head->Show();
$Content->Show();
$MasterPage->Tpl->SetVar("Head", $Tpl->GetVar("Panel Head"));
$MasterPage->Tpl->SetVar("Content", $Tpl->GetVar("Panel Content"));
$MasterPage->Show();
if (!isset($main_block)) $main_block = $MasterPage->HTML;
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-2653C36E
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBhrcon->close();
unset($MasterPage);
unset($roleForm);
$NewPage1->Class_Terminate();
unset($NewPage1);
unset($Tpl);
//End Unload Page


?>
