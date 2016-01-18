<?php
//Include Common Files @1-FB9A47B2
define("RelativePath", "..");
define("PathToCurrentPage", "/admin.menu/");
define("FileName", "p_module_form.php");
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

//Class_Initialize Event @4-F61A7340
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
            $this->code = new clsControl(ccsTextBox, "code", "Code", ccsText, "", CCGetRequestParam("code", $Method, NULL), $this);
            $this->code->Required = true;
            $this->is_active = new clsControl(ccsListBox, "is_active", "Is Active", ccsText, "", CCGetRequestParam("is_active", $Method, NULL), $this);
            $this->is_active->DSType = dsListOfValues;
            $this->is_active->Values = array(array("Y", "ENABLE"), array("N", "DISABLE"));
            $this->is_active->Required = true;
            $this->description = new clsControl(ccsTextArea, "description", "Description", ccsText, "", CCGetRequestParam("description", $Method, NULL), $this);
            $this->p_module_id = new clsControl(ccsHidden, "p_module_id", "p_module_id", ccsFloat, "", CCGetRequestParam("p_module_id", $Method, NULL), $this);
            $this->tooltip_text = new clsControl(ccsTextBox, "tooltip_text", "tooltip_text", ccsText, "", CCGetRequestParam("tooltip_text", $Method, NULL), $this);
            $this->tooltip_text->Required = true;
            $this->listing_no = new clsControl(ccsTextBox, "listing_no", "listing_no", ccsText, "", CCGetRequestParam("listing_no", $Method, NULL), $this);
            $this->listing_no->Required = true;
            $this->created_by = new clsControl(ccsTextBox, "created_by", "Created By", ccsText, "", CCGetRequestParam("created_by", $Method, NULL), $this);
            $this->creation_date = new clsControl(ccsTextBox, "creation_date", "Creation Date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("creation_date", $Method, NULL), $this);
            $this->updated_by = new clsControl(ccsTextBox, "updated_by", "Updated By", ccsText, "", CCGetRequestParam("updated_by", $Method, NULL), $this);
            $this->updated_date = new clsControl(ccsTextBox, "updated_date", "Updated Date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("updated_date", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->created_by->Value) && !strlen($this->created_by->Value) && $this->created_by->Value !== false)
                    $this->created_by->SetText(CCGetUserLogin());
                if(!is_array($this->creation_date->Value) && !strlen($this->creation_date->Value) && $this->creation_date->Value !== false)
                    $this->creation_date->SetValue(time());
                if(!is_array($this->updated_by->Value) && !strlen($this->updated_by->Value) && $this->updated_by->Value !== false)
                    $this->updated_by->SetText(CCGetUserLogin());
                if(!is_array($this->updated_date->Value) && !strlen($this->updated_date->Value) && $this->updated_date->Value !== false)
                    $this->updated_date->SetValue(time());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @4-802767D9
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlp_module_id"] = CCGetFromGet("p_module_id", NULL);
    }
//End Initialize Method

//Validate Method @4-CF8A9ECF
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->code->Validate() && $Validation);
        $Validation = ($this->is_active->Validate() && $Validation);
        $Validation = ($this->description->Validate() && $Validation);
        $Validation = ($this->p_module_id->Validate() && $Validation);
        $Validation = ($this->tooltip_text->Validate() && $Validation);
        $Validation = ($this->listing_no->Validate() && $Validation);
        $Validation = ($this->created_by->Validate() && $Validation);
        $Validation = ($this->creation_date->Validate() && $Validation);
        $Validation = ($this->updated_by->Validate() && $Validation);
        $Validation = ($this->updated_date->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->code->Errors->Count() == 0);
        $Validation =  $Validation && ($this->is_active->Errors->Count() == 0);
        $Validation =  $Validation && ($this->description->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_module_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->tooltip_text->Errors->Count() == 0);
        $Validation =  $Validation && ($this->listing_no->Errors->Count() == 0);
        $Validation =  $Validation && ($this->created_by->Errors->Count() == 0);
        $Validation =  $Validation && ($this->creation_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->updated_by->Errors->Count() == 0);
        $Validation =  $Validation && ($this->updated_date->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @4-D29B6A59
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->code->Errors->Count());
        $errors = ($errors || $this->is_active->Errors->Count());
        $errors = ($errors || $this->description->Errors->Count());
        $errors = ($errors || $this->p_module_id->Errors->Count());
        $errors = ($errors || $this->tooltip_text->Errors->Count());
        $errors = ($errors || $this->listing_no->Errors->Count());
        $errors = ($errors || $this->created_by->Errors->Count());
        $errors = ($errors || $this->creation_date->Errors->Count());
        $errors = ($errors || $this->updated_by->Errors->Count());
        $errors = ($errors || $this->updated_date->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @4-0673742C
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
        $Redirect = "p_module.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = "p_module.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "p_role_id"));
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

//InsertRow Method @4-3A50A044
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->code->SetValue($this->code->GetValue(true));
        $this->DataSource->is_active->SetValue($this->is_active->GetValue(true));
        $this->DataSource->description->SetValue($this->description->GetValue(true));
        $this->DataSource->listing_no->SetValue($this->listing_no->GetValue(true));
        $this->DataSource->tooltip_text->SetValue($this->tooltip_text->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @4-CEB7548E
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->code->SetValue($this->code->GetValue(true));
        $this->DataSource->is_active->SetValue($this->is_active->GetValue(true));
        $this->DataSource->description->SetValue($this->description->GetValue(true));
        $this->DataSource->listing_no->SetValue($this->listing_no->GetValue(true));
        $this->DataSource->tooltip_text->SetValue($this->tooltip_text->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @4-299D98C3
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @4-68350E9E
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

        $this->is_active->Prepare();

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
                    $this->is_active->SetValue($this->DataSource->is_active->GetValue());
                    $this->description->SetValue($this->DataSource->description->GetValue());
                    $this->p_module_id->SetValue($this->DataSource->p_module_id->GetValue());
                    $this->tooltip_text->SetValue($this->DataSource->tooltip_text->GetValue());
                    $this->listing_no->SetValue($this->DataSource->listing_no->GetValue());
                    $this->created_by->SetValue($this->DataSource->created_by->GetValue());
                    $this->creation_date->SetValue($this->DataSource->creation_date->GetValue());
                    $this->updated_by->SetValue($this->DataSource->updated_by->GetValue());
                    $this->updated_date->SetValue($this->DataSource->updated_date->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->code->Errors->ToString());
            $Error = ComposeStrings($Error, $this->is_active->Errors->ToString());
            $Error = ComposeStrings($Error, $this->description->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_module_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->tooltip_text->Errors->ToString());
            $Error = ComposeStrings($Error, $this->listing_no->Errors->ToString());
            $Error = ComposeStrings($Error, $this->created_by->Errors->ToString());
            $Error = ComposeStrings($Error, $this->creation_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->updated_by->Errors->ToString());
            $Error = ComposeStrings($Error, $this->updated_date->Errors->ToString());
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
        $this->is_active->Show();
        $this->description->Show();
        $this->p_module_id->Show();
        $this->tooltip_text->Show();
        $this->listing_no->Show();
        $this->created_by->Show();
        $this->creation_date->Show();
        $this->updated_by->Show();
        $this->updated_date->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End roleForm Class @4-FCB6E20C

class clsroleFormDataSource extends clsDBhrcon {  //roleFormDataSource Class @4-F8C9D9C3

//DataSource Variables @4-225E66DA
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
    public $is_active;
    public $description;
    public $p_module_id;
    public $tooltip_text;
    public $listing_no;
    public $created_by;
    public $creation_date;
    public $updated_by;
    public $updated_date;
//End DataSource Variables

//DataSourceClass_Initialize Event @4-D52828F8
    function clsroleFormDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record roleForm/Error";
        $this->Initialize();
        $this->code = new clsField("code", ccsText, "");
        
        $this->is_active = new clsField("is_active", ccsText, "");
        
        $this->description = new clsField("description", ccsText, "");
        
        $this->p_module_id = new clsField("p_module_id", ccsFloat, "");
        
        $this->tooltip_text = new clsField("tooltip_text", ccsText, "");
        
        $this->listing_no = new clsField("listing_no", ccsText, "");
        
        $this->created_by = new clsField("created_by", ccsText, "");
        
        $this->creation_date = new clsField("creation_date", ccsDate, $this->DateFormat);
        
        $this->updated_by = new clsField("updated_by", ccsText, "");
        
        $this->updated_date = new clsField("updated_date", ccsDate, $this->DateFormat);
        

    }
//End DataSourceClass_Initialize Event

//Prepare Method @4-E82A1026
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlp_module_id", ccsFloat, "", "", $this->Parameters["urlp_module_id"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "p_module_id", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @4-2C0E1DF5
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM p_module {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @4-6431E164
    function SetValues()
    {
        $this->code->SetDBValue($this->f("code"));
        $this->is_active->SetDBValue($this->f("is_active"));
        $this->description->SetDBValue($this->f("description"));
        $this->p_module_id->SetDBValue(trim($this->f("p_module_id")));
        $this->tooltip_text->SetDBValue($this->f("tooltip_text"));
        $this->listing_no->SetDBValue($this->f("listing_no"));
        $this->created_by->SetDBValue($this->f("created_by"));
        $this->creation_date->SetDBValue(trim($this->f("creation_date")));
        $this->updated_by->SetDBValue($this->f("updated_by"));
        $this->updated_date->SetDBValue(trim($this->f("updated_date")));
    }
//End SetValues Method

//Insert Method @4-A7FB6A86
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["code"] = new clsSQLParameter("ctrlcode", ccsText, "", "", $this->code->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["is_active"] = new clsSQLParameter("ctrlis_active", ccsText, "", "", $this->is_active->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["description"] = new clsSQLParameter("ctrldescription", ccsText, "", "", $this->description->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["struser"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["listing_no"] = new clsSQLParameter("ctrllisting_no", ccsInteger, "", "", $this->listing_no->GetValue(true), null, false, $this->ErrorBlock);
        $this->cp["tooltip_text"] = new clsSQLParameter("ctrltooltip_text", ccsText, "", "", $this->tooltip_text->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["code"]->GetValue()) and !strlen($this->cp["code"]->GetText()) and !is_bool($this->cp["code"]->GetValue())) 
            $this->cp["code"]->SetValue($this->code->GetValue(true));
        if (!is_null($this->cp["is_active"]->GetValue()) and !strlen($this->cp["is_active"]->GetText()) and !is_bool($this->cp["is_active"]->GetValue())) 
            $this->cp["is_active"]->SetValue($this->is_active->GetValue(true));
        if (!is_null($this->cp["description"]->GetValue()) and !strlen($this->cp["description"]->GetText()) and !is_bool($this->cp["description"]->GetValue())) 
            $this->cp["description"]->SetValue($this->description->GetValue(true));
        if (!is_null($this->cp["struser"]->GetValue()) and !strlen($this->cp["struser"]->GetText()) and !is_bool($this->cp["struser"]->GetValue())) 
            $this->cp["struser"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["listing_no"]->GetValue()) and !strlen($this->cp["listing_no"]->GetText()) and !is_bool($this->cp["listing_no"]->GetValue())) 
            $this->cp["listing_no"]->SetValue($this->listing_no->GetValue(true));
        if (!strlen($this->cp["listing_no"]->GetText()) and !is_bool($this->cp["listing_no"]->GetValue(true))) 
            $this->cp["listing_no"]->SetText(null);
        if (!is_null($this->cp["tooltip_text"]->GetValue()) and !strlen($this->cp["tooltip_text"]->GetText()) and !is_bool($this->cp["tooltip_text"]->GetValue())) 
            $this->cp["tooltip_text"]->SetValue($this->tooltip_text->GetValue(true));
        $this->SQL = "Select * from chumanis.f_crud_p_module(\n" .
        "null,\n" .
        "'" . $this->SQLValue($this->cp["code"]->GetDBValue(), ccsText) . "',\n" .
        "" . $this->SQLValue($this->cp["listing_no"]->GetDBValue(), ccsInteger) . ",\n" .
        "'" . $this->SQLValue($this->cp["is_active"]->GetDBValue(), ccsText) . "',\n" .
        "null,\n" .
        "'" . $this->SQLValue($this->cp["tooltip_text"]->GetDBValue(), ccsText) . "',\n" .
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

//Update Method @4-53FF4F08
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["code"] = new clsSQLParameter("ctrlcode", ccsText, "", "", $this->code->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["is_active"] = new clsSQLParameter("ctrlis_active", ccsText, "", "", $this->is_active->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["description"] = new clsSQLParameter("ctrldescription", ccsText, "", "", $this->description->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["struser"] = new clsSQLParameter("sesUserName", ccsText, "", "", CCGetSession("UserName", NULL), "", false, $this->ErrorBlock);
        $this->cp["p_module_id"] = new clsSQLParameter("urlp_module_id", ccsInteger, "", "", CCGetFromGet("p_module_id", NULL), 0, false, $this->ErrorBlock);
        $this->cp["listing_no"] = new clsSQLParameter("ctrllisting_no", ccsInteger, "", "", $this->listing_no->GetValue(true), 0, false, $this->ErrorBlock);
        $this->cp["tooltip_text"] = new clsSQLParameter("ctrltooltip_text", ccsText, "", "", $this->tooltip_text->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["code"]->GetValue()) and !strlen($this->cp["code"]->GetText()) and !is_bool($this->cp["code"]->GetValue())) 
            $this->cp["code"]->SetValue($this->code->GetValue(true));
        if (!is_null($this->cp["is_active"]->GetValue()) and !strlen($this->cp["is_active"]->GetText()) and !is_bool($this->cp["is_active"]->GetValue())) 
            $this->cp["is_active"]->SetValue($this->is_active->GetValue(true));
        if (!is_null($this->cp["description"]->GetValue()) and !strlen($this->cp["description"]->GetText()) and !is_bool($this->cp["description"]->GetValue())) 
            $this->cp["description"]->SetValue($this->description->GetValue(true));
        if (!is_null($this->cp["struser"]->GetValue()) and !strlen($this->cp["struser"]->GetText()) and !is_bool($this->cp["struser"]->GetValue())) 
            $this->cp["struser"]->SetValue(CCGetSession("UserName", NULL));
        if (!is_null($this->cp["p_module_id"]->GetValue()) and !strlen($this->cp["p_module_id"]->GetText()) and !is_bool($this->cp["p_module_id"]->GetValue())) 
            $this->cp["p_module_id"]->SetText(CCGetFromGet("p_module_id", NULL));
        if (!strlen($this->cp["p_module_id"]->GetText()) and !is_bool($this->cp["p_module_id"]->GetValue(true))) 
            $this->cp["p_module_id"]->SetText(0);
        if (!is_null($this->cp["listing_no"]->GetValue()) and !strlen($this->cp["listing_no"]->GetText()) and !is_bool($this->cp["listing_no"]->GetValue())) 
            $this->cp["listing_no"]->SetValue($this->listing_no->GetValue(true));
        if (!strlen($this->cp["listing_no"]->GetText()) and !is_bool($this->cp["listing_no"]->GetValue(true))) 
            $this->cp["listing_no"]->SetText(0);
        if (!is_null($this->cp["tooltip_text"]->GetValue()) and !strlen($this->cp["tooltip_text"]->GetText()) and !is_bool($this->cp["tooltip_text"]->GetValue())) 
            $this->cp["tooltip_text"]->SetValue($this->tooltip_text->GetValue(true));
        $this->SQL = "Select * from chumanis.f_crud_p_module(\n" .
        "" . $this->SQLValue($this->cp["p_module_id"]->GetDBValue(), ccsInteger) . ",\n" .
        "'" . $this->SQLValue($this->cp["code"]->GetDBValue(), ccsText) . "',\n" .
        "" . $this->SQLValue($this->cp["listing_no"]->GetDBValue(), ccsInteger) . ",\n" .
        "'" . $this->SQLValue($this->cp["is_active"]->GetDBValue(), ccsText) . "',\n" .
        "null,\n" .
        "'" . $this->SQLValue($this->cp["tooltip_text"]->GetDBValue(), ccsText) . "',\n" .
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

//Delete Method @4-191B8C73
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["p_module_id"] = new clsSQLParameter("urlp_module_id", ccsInteger, "", "", CCGetFromGet("p_module_id", NULL), 0, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        if (!is_null($this->cp["p_module_id"]->GetValue()) and !strlen($this->cp["p_module_id"]->GetText()) and !is_bool($this->cp["p_module_id"]->GetValue())) 
            $this->cp["p_module_id"]->SetText(CCGetFromGet("p_module_id", NULL));
        if (!strlen($this->cp["p_module_id"]->GetText()) and !is_bool($this->cp["p_module_id"]->GetValue(true))) 
            $this->cp["p_module_id"]->SetText(0);
        $this->SQL = "Select * from chumanis.f_crud_p_module(\n" .
        "" . $this->SQLValue($this->cp["p_module_id"]->GetDBValue(), ccsInteger) . ",\n" .
        "null,\n" .
        "null,\n" .
        "null,\n" .
        "null,\n" .
        "null,\n" .
        "null,\n" .
        "null,\n" .
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





//Initialize Page @1-D58E0356
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
$TemplateFileName = "p_module_form.html";
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
