<?php
//Include Common Files @1-FFB84AE6
define("RelativePath", "..");
define("PathToCurrentPage", "/admin.menu/");
define("FileName", "p_user_role_form.php");
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

//Class_Initialize Event @4-CA8478BE
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
            $this->p_user_role_id = new clsControl(ccsHidden, "p_user_role_id", "p_user_role_id", ccsFloat, "", CCGetRequestParam("p_user_role_id", $Method, NULL), $this);
            $this->created_by = new clsControl(ccsTextBox, "created_by", "Created By", ccsText, "", CCGetRequestParam("created_by", $Method, NULL), $this);
            $this->creation_date = new clsControl(ccsTextBox, "creation_date", "Creation Date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("creation_date", $Method, NULL), $this);
            $this->updated_by = new clsControl(ccsTextBox, "updated_by", "Updated By", ccsText, "", CCGetRequestParam("updated_by", $Method, NULL), $this);
            $this->updated_date = new clsControl(ccsTextBox, "updated_date", "Updated Date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("updated_date", $Method, NULL), $this);
            $this->user_name = new clsControl(ccsTextBox, "user_name", "Created By", ccsText, "", CCGetRequestParam("user_name", $Method, NULL), $this);
            $this->p_role_id = new clsControl(ccsHidden, "p_role_id", "Role", ccsText, "", CCGetRequestParam("p_role_id", $Method, NULL), $this);
            $this->p_role_id->Required = true;
            $this->p_user_id = new clsControl(ccsHidden, "p_user_id", "p_user_id", ccsText, "", CCGetRequestParam("p_user_id", $Method, NULL), $this);
            $this->p_user_id->Required = true;
            $this->valid_from = new clsControl(ccsTextBox, "valid_from", "Awal Berlaku", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("valid_from", $Method, NULL), $this);
            $this->valid_from->Required = true;
            $this->valid_to = new clsControl(ccsTextBox, "valid_to", "Code", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("valid_to", $Method, NULL), $this);
            $this->description = new clsControl(ccsTextArea, "description", "description", ccsText, "", CCGetRequestParam("description", $Method, NULL), $this);
            $this->DatePicker_valid_from1 = new clsDatePicker("DatePicker_valid_from1", "roleForm", "valid_from", $this);
            $this->DatePicker_valid_to1 = new clsDatePicker("DatePicker_valid_to1", "roleForm", "valid_to", $this);
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

//Initialize Method @4-A9853DD4
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlp_user_role_id"] = CCGetFromGet("p_user_role_id", NULL);
    }
//End Initialize Method

//Validate Method @4-0F3E0133
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->code->Validate() && $Validation);
        $Validation = ($this->p_user_role_id->Validate() && $Validation);
        $Validation = ($this->created_by->Validate() && $Validation);
        $Validation = ($this->creation_date->Validate() && $Validation);
        $Validation = ($this->updated_by->Validate() && $Validation);
        $Validation = ($this->updated_date->Validate() && $Validation);
        $Validation = ($this->user_name->Validate() && $Validation);
        $Validation = ($this->p_role_id->Validate() && $Validation);
        $Validation = ($this->p_user_id->Validate() && $Validation);
        $Validation = ($this->valid_from->Validate() && $Validation);
        $Validation = ($this->valid_to->Validate() && $Validation);
        $Validation = ($this->description->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->code->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_user_role_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->created_by->Errors->Count() == 0);
        $Validation =  $Validation && ($this->creation_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->updated_by->Errors->Count() == 0);
        $Validation =  $Validation && ($this->updated_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->user_name->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_role_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_user_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->valid_from->Errors->Count() == 0);
        $Validation =  $Validation && ($this->valid_to->Errors->Count() == 0);
        $Validation =  $Validation && ($this->description->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @4-A77BC472
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->code->Errors->Count());
        $errors = ($errors || $this->p_user_role_id->Errors->Count());
        $errors = ($errors || $this->created_by->Errors->Count());
        $errors = ($errors || $this->creation_date->Errors->Count());
        $errors = ($errors || $this->updated_by->Errors->Count());
        $errors = ($errors || $this->updated_date->Errors->Count());
        $errors = ($errors || $this->user_name->Errors->Count());
        $errors = ($errors || $this->p_role_id->Errors->Count());
        $errors = ($errors || $this->p_user_id->Errors->Count());
        $errors = ($errors || $this->valid_from->Errors->Count());
        $errors = ($errors || $this->valid_to->Errors->Count());
        $errors = ($errors || $this->description->Errors->Count());
        $errors = ($errors || $this->DatePicker_valid_from1->Errors->Count());
        $errors = ($errors || $this->DatePicker_valid_to1->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @4-65EF28C8
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
        $Redirect = "p_user_role.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = "p_user_role.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "p_role_id"));
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

//InsertRow Method @4-A96E500F
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->code->SetValue($this->code->GetValue(true));
        $this->DataSource->p_user_role_id->SetValue($this->p_user_role_id->GetValue(true));
        $this->DataSource->created_by->SetValue($this->created_by->GetValue(true));
        $this->DataSource->creation_date->SetValue($this->creation_date->GetValue(true));
        $this->DataSource->updated_by->SetValue($this->updated_by->GetValue(true));
        $this->DataSource->updated_date->SetValue($this->updated_date->GetValue(true));
        $this->DataSource->user_name->SetValue($this->user_name->GetValue(true));
        $this->DataSource->p_role_id->SetValue($this->p_role_id->GetValue(true));
        $this->DataSource->p_user_id->SetValue($this->p_user_id->GetValue(true));
        $this->DataSource->valid_from->SetValue($this->valid_from->GetValue(true));
        $this->DataSource->valid_to->SetValue($this->valid_to->GetValue(true));
        $this->DataSource->description->SetValue($this->description->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @4-97137A15
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->p_user_role_id->SetValue($this->p_user_role_id->GetValue(true));
        $this->DataSource->code->SetValue($this->code->GetValue(true));
        $this->DataSource->p_user_role_id->SetValue($this->p_user_role_id->GetValue(true));
        $this->DataSource->created_by->SetValue($this->created_by->GetValue(true));
        $this->DataSource->creation_date->SetValue($this->creation_date->GetValue(true));
        $this->DataSource->updated_by->SetValue($this->updated_by->GetValue(true));
        $this->DataSource->updated_date->SetValue($this->updated_date->GetValue(true));
        $this->DataSource->user_name->SetValue($this->user_name->GetValue(true));
        $this->DataSource->p_role_id->SetValue($this->p_role_id->GetValue(true));
        $this->DataSource->p_user_id->SetValue($this->p_user_id->GetValue(true));
        $this->DataSource->valid_from->SetValue($this->valid_from->GetValue(true));
        $this->DataSource->valid_to->SetValue($this->valid_to->GetValue(true));
        $this->DataSource->description->SetValue($this->description->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @4-B15D8F68
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->p_user_role_id->SetValue($this->p_user_role_id->GetValue(true));
        $this->DataSource->p_user_role_id->SetValue($this->p_user_role_id->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @4-48A4FA01
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
                    $this->p_user_role_id->SetValue($this->DataSource->p_user_role_id->GetValue());
                    $this->created_by->SetValue($this->DataSource->created_by->GetValue());
                    $this->creation_date->SetValue($this->DataSource->creation_date->GetValue());
                    $this->updated_by->SetValue($this->DataSource->updated_by->GetValue());
                    $this->updated_date->SetValue($this->DataSource->updated_date->GetValue());
                    $this->user_name->SetValue($this->DataSource->user_name->GetValue());
                    $this->p_role_id->SetValue($this->DataSource->p_role_id->GetValue());
                    $this->p_user_id->SetValue($this->DataSource->p_user_id->GetValue());
                    $this->valid_from->SetValue($this->DataSource->valid_from->GetValue());
                    $this->valid_to->SetValue($this->DataSource->valid_to->GetValue());
                    $this->description->SetValue($this->DataSource->description->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->code->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_user_role_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->created_by->Errors->ToString());
            $Error = ComposeStrings($Error, $this->creation_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->updated_by->Errors->ToString());
            $Error = ComposeStrings($Error, $this->updated_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user_name->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_role_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_user_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->valid_from->Errors->ToString());
            $Error = ComposeStrings($Error, $this->valid_to->Errors->ToString());
            $Error = ComposeStrings($Error, $this->description->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_valid_from1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_valid_to1->Errors->ToString());
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
        $this->p_user_role_id->Show();
        $this->created_by->Show();
        $this->creation_date->Show();
        $this->updated_by->Show();
        $this->updated_date->Show();
        $this->user_name->Show();
        $this->p_role_id->Show();
        $this->p_user_id->Show();
        $this->valid_from->Show();
        $this->valid_to->Show();
        $this->description->Show();
        $this->DatePicker_valid_from1->Show();
        $this->DatePicker_valid_to1->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End roleForm Class @4-FCB6E20C

class clsroleFormDataSource extends clsDBhrcon {  //roleFormDataSource Class @4-F8C9D9C3

//DataSource Variables @4-32E0A008
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

    public $InsertFields = array();
    public $UpdateFields = array();

    // Datasource fields
    public $code;
    public $p_user_role_id;
    public $created_by;
    public $creation_date;
    public $updated_by;
    public $updated_date;
    public $user_name;
    public $p_role_id;
    public $p_user_id;
    public $valid_from;
    public $valid_to;
    public $description;
//End DataSource Variables

//DataSourceClass_Initialize Event @4-FF6433CB
    function clsroleFormDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record roleForm/Error";
        $this->Initialize();
        $this->code = new clsField("code", ccsText, "");
        
        $this->p_user_role_id = new clsField("p_user_role_id", ccsFloat, "");
        
        $this->created_by = new clsField("created_by", ccsText, "");
        
        $this->creation_date = new clsField("creation_date", ccsDate, $this->DateFormat);
        
        $this->updated_by = new clsField("updated_by", ccsText, "");
        
        $this->updated_date = new clsField("updated_date", ccsDate, $this->DateFormat);
        
        $this->user_name = new clsField("user_name", ccsText, "");
        
        $this->p_role_id = new clsField("p_role_id", ccsText, "");
        
        $this->p_user_id = new clsField("p_user_id", ccsText, "");
        
        $this->valid_from = new clsField("valid_from", ccsDate, $this->DateFormat);
        
        $this->valid_to = new clsField("valid_to", ccsDate, $this->DateFormat);
        
        $this->description = new clsField("description", ccsText, "");
        

        $this->InsertFields["code"] = array("Name" => "code", "Value" => "", "DataType" => ccsText);
        $this->InsertFields["p_user_role_id"] = array("Name" => "p_user_role_id", "Value" => "", "DataType" => ccsFloat);
        $this->InsertFields["created_by"] = array("Name" => "created_by", "Value" => "", "DataType" => ccsText);
        $this->InsertFields["creation_date"] = array("Name" => "creation_date", "Value" => "", "DataType" => ccsDate);
        $this->InsertFields["updated_by"] = array("Name" => "updated_by", "Value" => "", "DataType" => ccsText);
        $this->InsertFields["updated_date"] = array("Name" => "updated_date", "Value" => "", "DataType" => ccsDate);
        $this->InsertFields["user_name"] = array("Name" => "user_name", "Value" => "", "DataType" => ccsText);
        $this->InsertFields["p_role_id"] = array("Name" => "p_role_id", "Value" => "", "DataType" => ccsText);
        $this->InsertFields["p_user_id"] = array("Name" => "p_user_id", "Value" => "", "DataType" => ccsText);
        $this->InsertFields["valid_from"] = array("Name" => "valid_from", "Value" => "", "DataType" => ccsDate);
        $this->InsertFields["valid_to"] = array("Name" => "valid_to", "Value" => "", "DataType" => ccsDate);
        $this->InsertFields["description"] = array("Name" => "description", "Value" => "", "DataType" => ccsText);
        $this->UpdateFields["code"] = array("Name" => "code", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["p_user_role_id"] = array("Name" => "p_user_role_id", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["created_by"] = array("Name" => "created_by", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["creation_date"] = array("Name" => "creation_date", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["updated_by"] = array("Name" => "updated_by", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["updated_date"] = array("Name" => "updated_date", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["user_name"] = array("Name" => "user_name", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["p_role_id"] = array("Name" => "p_role_id", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["p_user_id"] = array("Name" => "p_user_id", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["valid_from"] = array("Name" => "valid_from", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["valid_to"] = array("Name" => "valid_to", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["description"] = array("Name" => "description", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @4-E37FD68A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlp_user_role_id", ccsText, "", "", $this->Parameters["urlp_user_role_id"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @4-69ECED73
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT a.*, b.code , c.user_name\n" .
        "FROM p_user_role AS a\n" .
        "LEFT JOIN p_role AS b ON a.p_role_id = b.p_role_id\n" .
        "LEFT JOIN p_user AS c ON a.p_user_id = c.p_user_id\n" .
        "WHERE a.p_user_role_id = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "\n" .
        "";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @4-35764927
    function SetValues()
    {
        $this->code->SetDBValue($this->f("code"));
        $this->p_user_role_id->SetDBValue(trim($this->f("p_user_role_id")));
        $this->created_by->SetDBValue($this->f("created_by"));
        $this->creation_date->SetDBValue(trim($this->f("creation_date")));
        $this->updated_by->SetDBValue($this->f("updated_by"));
        $this->updated_date->SetDBValue(trim($this->f("updated_date")));
        $this->user_name->SetDBValue($this->f("user_name"));
        $this->p_role_id->SetDBValue($this->f("p_role_id"));
        $this->p_user_id->SetDBValue($this->f("p_user_id"));
        $this->valid_from->SetDBValue(trim($this->f("valid_from")));
        $this->valid_to->SetDBValue(trim($this->f("valid_to")));
        $this->description->SetDBValue($this->f("description"));
    }
//End SetValues Method

//Insert Method @4-9DCE1D35
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["code"] = new clsSQLParameter("ctrlcode", ccsText, "", "", $this->code->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_user_role_id"] = new clsSQLParameter("ctrlp_user_role_id", ccsFloat, "", "", $this->p_user_role_id->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["created_by"] = new clsSQLParameter("ctrlcreated_by", ccsText, "", "", $this->created_by->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["creation_date"] = new clsSQLParameter("ctrlcreation_date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->creation_date->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["updated_by"] = new clsSQLParameter("ctrlupdated_by", ccsText, "", "", $this->updated_by->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["updated_date"] = new clsSQLParameter("ctrlupdated_date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->updated_date->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["user_name"] = new clsSQLParameter("ctrluser_name", ccsText, "", "", $this->user_name->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_role_id"] = new clsSQLParameter("ctrlp_role_id", ccsText, "", "", $this->p_role_id->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_user_id"] = new clsSQLParameter("ctrlp_user_id", ccsText, "", "", $this->p_user_id->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["valid_from"] = new clsSQLParameter("ctrlvalid_from", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->valid_from->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["valid_to"] = new clsSQLParameter("ctrlvalid_to", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->valid_to->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["description"] = new clsSQLParameter("ctrldescription", ccsText, "", "", $this->description->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["code"]->GetValue()) and !strlen($this->cp["code"]->GetText()) and !is_bool($this->cp["code"]->GetValue())) 
            $this->cp["code"]->SetValue($this->code->GetValue(true));
        if (!is_null($this->cp["p_user_role_id"]->GetValue()) and !strlen($this->cp["p_user_role_id"]->GetText()) and !is_bool($this->cp["p_user_role_id"]->GetValue())) 
            $this->cp["p_user_role_id"]->SetValue($this->p_user_role_id->GetValue(true));
        if (!is_null($this->cp["created_by"]->GetValue()) and !strlen($this->cp["created_by"]->GetText()) and !is_bool($this->cp["created_by"]->GetValue())) 
            $this->cp["created_by"]->SetValue($this->created_by->GetValue(true));
        if (!is_null($this->cp["creation_date"]->GetValue()) and !strlen($this->cp["creation_date"]->GetText()) and !is_bool($this->cp["creation_date"]->GetValue())) 
            $this->cp["creation_date"]->SetValue($this->creation_date->GetValue(true));
        if (!is_null($this->cp["updated_by"]->GetValue()) and !strlen($this->cp["updated_by"]->GetText()) and !is_bool($this->cp["updated_by"]->GetValue())) 
            $this->cp["updated_by"]->SetValue($this->updated_by->GetValue(true));
        if (!is_null($this->cp["updated_date"]->GetValue()) and !strlen($this->cp["updated_date"]->GetText()) and !is_bool($this->cp["updated_date"]->GetValue())) 
            $this->cp["updated_date"]->SetValue($this->updated_date->GetValue(true));
        if (!is_null($this->cp["user_name"]->GetValue()) and !strlen($this->cp["user_name"]->GetText()) and !is_bool($this->cp["user_name"]->GetValue())) 
            $this->cp["user_name"]->SetValue($this->user_name->GetValue(true));
        if (!is_null($this->cp["p_role_id"]->GetValue()) and !strlen($this->cp["p_role_id"]->GetText()) and !is_bool($this->cp["p_role_id"]->GetValue())) 
            $this->cp["p_role_id"]->SetValue($this->p_role_id->GetValue(true));
        if (!is_null($this->cp["p_user_id"]->GetValue()) and !strlen($this->cp["p_user_id"]->GetText()) and !is_bool($this->cp["p_user_id"]->GetValue())) 
            $this->cp["p_user_id"]->SetValue($this->p_user_id->GetValue(true));
        if (!is_null($this->cp["valid_from"]->GetValue()) and !strlen($this->cp["valid_from"]->GetText()) and !is_bool($this->cp["valid_from"]->GetValue())) 
            $this->cp["valid_from"]->SetValue($this->valid_from->GetValue(true));
        if (!is_null($this->cp["valid_to"]->GetValue()) and !strlen($this->cp["valid_to"]->GetText()) and !is_bool($this->cp["valid_to"]->GetValue())) 
            $this->cp["valid_to"]->SetValue($this->valid_to->GetValue(true));
        if (!is_null($this->cp["description"]->GetValue()) and !strlen($this->cp["description"]->GetText()) and !is_bool($this->cp["description"]->GetValue())) 
            $this->cp["description"]->SetValue($this->description->GetValue(true));
        $this->InsertFields["code"]["Value"] = $this->cp["code"]->GetDBValue(true);
        $this->InsertFields["p_user_role_id"]["Value"] = $this->cp["p_user_role_id"]->GetDBValue(true);
        $this->InsertFields["created_by"]["Value"] = $this->cp["created_by"]->GetDBValue(true);
        $this->InsertFields["creation_date"]["Value"] = $this->cp["creation_date"]->GetDBValue(true);
        $this->InsertFields["updated_by"]["Value"] = $this->cp["updated_by"]->GetDBValue(true);
        $this->InsertFields["updated_date"]["Value"] = $this->cp["updated_date"]->GetDBValue(true);
        $this->InsertFields["user_name"]["Value"] = $this->cp["user_name"]->GetDBValue(true);
        $this->InsertFields["p_role_id"]["Value"] = $this->cp["p_role_id"]->GetDBValue(true);
        $this->InsertFields["p_user_id"]["Value"] = $this->cp["p_user_id"]->GetDBValue(true);
        $this->InsertFields["valid_from"]["Value"] = $this->cp["valid_from"]->GetDBValue(true);
        $this->InsertFields["valid_to"]["Value"] = $this->cp["valid_to"]->GetDBValue(true);
        $this->InsertFields["description"]["Value"] = $this->cp["description"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("p_user_role", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @4-59D0CBDE
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["code"] = new clsSQLParameter("ctrlcode", ccsText, "", "", $this->code->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["p_user_role_id"] = new clsSQLParameter("ctrlp_user_role_id", ccsFloat, "", "", $this->p_user_role_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["created_by"] = new clsSQLParameter("ctrlcreated_by", ccsText, "", "", $this->created_by->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["creation_date"] = new clsSQLParameter("ctrlcreation_date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->creation_date->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["updated_by"] = new clsSQLParameter("ctrlupdated_by", ccsText, "", "", $this->updated_by->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["updated_date"] = new clsSQLParameter("ctrlupdated_date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->updated_date->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_name"] = new clsSQLParameter("ctrluser_name", ccsText, "", "", $this->user_name->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["p_role_id"] = new clsSQLParameter("ctrlp_role_id", ccsText, "", "", $this->p_role_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["p_user_id"] = new clsSQLParameter("ctrlp_user_id", ccsText, "", "", $this->p_user_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["valid_from"] = new clsSQLParameter("ctrlvalid_from", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->valid_from->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["valid_to"] = new clsSQLParameter("ctrlvalid_to", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->valid_to->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["description"] = new clsSQLParameter("ctrldescription", ccsText, "", "", $this->description->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "ctrlp_user_role_id", ccsFloat, "", "", $this->p_user_role_id->GetValue(true), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["code"]->GetValue()) and !strlen($this->cp["code"]->GetText()) and !is_bool($this->cp["code"]->GetValue())) 
            $this->cp["code"]->SetValue($this->code->GetValue(true));
        if (!is_null($this->cp["p_user_role_id"]->GetValue()) and !strlen($this->cp["p_user_role_id"]->GetText()) and !is_bool($this->cp["p_user_role_id"]->GetValue())) 
            $this->cp["p_user_role_id"]->SetValue($this->p_user_role_id->GetValue(true));
        if (!is_null($this->cp["created_by"]->GetValue()) and !strlen($this->cp["created_by"]->GetText()) and !is_bool($this->cp["created_by"]->GetValue())) 
            $this->cp["created_by"]->SetValue($this->created_by->GetValue(true));
        if (!is_null($this->cp["creation_date"]->GetValue()) and !strlen($this->cp["creation_date"]->GetText()) and !is_bool($this->cp["creation_date"]->GetValue())) 
            $this->cp["creation_date"]->SetValue($this->creation_date->GetValue(true));
        if (!is_null($this->cp["updated_by"]->GetValue()) and !strlen($this->cp["updated_by"]->GetText()) and !is_bool($this->cp["updated_by"]->GetValue())) 
            $this->cp["updated_by"]->SetValue($this->updated_by->GetValue(true));
        if (!is_null($this->cp["updated_date"]->GetValue()) and !strlen($this->cp["updated_date"]->GetText()) and !is_bool($this->cp["updated_date"]->GetValue())) 
            $this->cp["updated_date"]->SetValue($this->updated_date->GetValue(true));
        if (!is_null($this->cp["user_name"]->GetValue()) and !strlen($this->cp["user_name"]->GetText()) and !is_bool($this->cp["user_name"]->GetValue())) 
            $this->cp["user_name"]->SetValue($this->user_name->GetValue(true));
        if (!is_null($this->cp["p_role_id"]->GetValue()) and !strlen($this->cp["p_role_id"]->GetText()) and !is_bool($this->cp["p_role_id"]->GetValue())) 
            $this->cp["p_role_id"]->SetValue($this->p_role_id->GetValue(true));
        if (!is_null($this->cp["p_user_id"]->GetValue()) and !strlen($this->cp["p_user_id"]->GetText()) and !is_bool($this->cp["p_user_id"]->GetValue())) 
            $this->cp["p_user_id"]->SetValue($this->p_user_id->GetValue(true));
        if (!is_null($this->cp["valid_from"]->GetValue()) and !strlen($this->cp["valid_from"]->GetText()) and !is_bool($this->cp["valid_from"]->GetValue())) 
            $this->cp["valid_from"]->SetValue($this->valid_from->GetValue(true));
        if (!is_null($this->cp["valid_to"]->GetValue()) and !strlen($this->cp["valid_to"]->GetText()) and !is_bool($this->cp["valid_to"]->GetValue())) 
            $this->cp["valid_to"]->SetValue($this->valid_to->GetValue(true));
        if (!is_null($this->cp["description"]->GetValue()) and !strlen($this->cp["description"]->GetText()) and !is_bool($this->cp["description"]->GetValue())) 
            $this->cp["description"]->SetValue($this->description->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "p_user_role_id", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsFloat),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["code"]["Value"] = $this->cp["code"]->GetDBValue(true);
        $this->UpdateFields["p_user_role_id"]["Value"] = $this->cp["p_user_role_id"]->GetDBValue(true);
        $this->UpdateFields["created_by"]["Value"] = $this->cp["created_by"]->GetDBValue(true);
        $this->UpdateFields["creation_date"]["Value"] = $this->cp["creation_date"]->GetDBValue(true);
        $this->UpdateFields["updated_by"]["Value"] = $this->cp["updated_by"]->GetDBValue(true);
        $this->UpdateFields["updated_date"]["Value"] = $this->cp["updated_date"]->GetDBValue(true);
        $this->UpdateFields["user_name"]["Value"] = $this->cp["user_name"]->GetDBValue(true);
        $this->UpdateFields["p_role_id"]["Value"] = $this->cp["p_role_id"]->GetDBValue(true);
        $this->UpdateFields["p_user_id"]["Value"] = $this->cp["p_user_id"]->GetDBValue(true);
        $this->UpdateFields["valid_from"]["Value"] = $this->cp["valid_from"]->GetDBValue(true);
        $this->UpdateFields["valid_to"]["Value"] = $this->cp["valid_to"]->GetDBValue(true);
        $this->UpdateFields["description"]["Value"] = $this->cp["description"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("p_user_role", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @4-04E9D923
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "ctrlp_user_role_id", ccsFloat, "", "", $this->p_user_role_id->GetValue(true), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $wp->AddParameter("2", "ctrlp_user_role_id", ccsFloat, "", "", $this->p_user_role_id->GetValue(true), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "p_user_role_id", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsFloat),false);
        $wp->Criterion[2] = $wp->Operation(opEqual, "p_user_role_id", $wp->GetDBValue("2"), $this->ToSQL($wp->GetDBValue("2"), ccsFloat),false);
        $Where = $wp->opAND(
             false, 
             $wp->Criterion[1], 
             $wp->Criterion[2]);
        $this->SQL = "DELETE FROM p_user_role";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End roleFormDataSource Class @4-FCB6E20C

//Include Page implementation @63-41C3001C
include_once(RelativePath . "/Designs/modal/modal_start.php");
//End Include Page implementation

//Include Page implementation @66-49C15BEE
include_once(RelativePath . "/Designs/modal/modal_end.php");
//End Include Page implementation





//Initialize Page @1-3FA08933
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
$TemplateFileName = "p_user_role_form.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/updatepanel/ccs-update-panel.js|";
//End Initialize Page

//Include events file @1-45971754
include_once("./p_user_role_form_events.php");
//End Include events file

//BeforeInitialize Binding @1-17AC9191
$CCSEvents["BeforeInitialize"] = "Page_BeforeInitialize";
//End BeforeInitialize Binding

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-B20A34A7
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
$LovContainer = new clsPanel("LovContainer", $MainPage);
$modal_start = new clsmodal_start("../Designs/modal/", "modal_start", $MainPage);
$modal_start->Initialize();
$LovAjaxPanel = new clsPanel("LovAjaxPanel", $MainPage);
$modal_end = new clsmodal_end("../Designs/modal/", "modal_end", $MainPage);
$modal_end->Initialize();
$MainPage->Head = & $Head;
$MainPage->Content = & $Content;
$MainPage->roleForm = & $roleForm;
$MainPage->LovContainer = & $LovContainer;
$MainPage->modal_start = & $modal_start;
$MainPage->LovAjaxPanel = & $LovAjaxPanel;
$MainPage->modal_end = & $modal_end;
$Content->AddComponent("roleForm", $roleForm);
$Content->AddComponent("LovContainer", $LovContainer);
$LovContainer->AddComponent("modal_start", $modal_start);
$LovContainer->AddComponent("modal_end", $modal_end);
$LovContainer->AddComponent("LovAjaxPanel", $LovAjaxPanel);
$roleForm->Initialize();
$ScriptIncludes = "";
$SList = explode("|", $Scripts);
foreach ($SList as $Script) {
    if ($Script != "") $ScriptIncludes = $ScriptIncludes . "<script src=\"" . $PathToRoot . $Script . "\" type=\"text/javascript\"></script>\n";
}
$Attributes->SetValue("scriptIncludes", $ScriptIncludes);

BindEvents();

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

//Execute Components @1-93DAD1DB
$MasterPage->Operations();
$modal_end->Operations();
$modal_start->Operations();
$roleForm->Operation();
//End Execute Components

//Go to destination page @1-40700939
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBhrcon->close();
    header("Location: " . $Redirect);
    unset($roleForm);
    $modal_start->Class_Terminate();
    unset($modal_start);
    $modal_end->Class_Terminate();
    unset($modal_end);
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

//Unload Page @1-8515837A
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBhrcon->close();
unset($MasterPage);
unset($roleForm);
$modal_start->Class_Terminate();
unset($modal_start);
$modal_end->Class_Terminate();
unset($modal_end);
unset($Tpl);
//End Unload Page


?>
