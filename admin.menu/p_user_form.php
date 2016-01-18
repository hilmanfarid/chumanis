<?php
//Include Common Files @1-CC5E5F24
define("RelativePath", "..");
define("PathToCurrentPage", "/admin.menu/");
define("FileName", "p_user_form.php");
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

//Class_Initialize Event @4-16C3D1AF
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
            $this->user_status_id = new clsControl(ccsListBox, "user_status_id", "Status User", ccsText, "", CCGetRequestParam("user_status_id", $Method, NULL), $this);
            $this->user_status_id->DSType = dsListOfValues;
            $this->user_status_id->Values = array(array("1", "ACTIVE"), array("2", "BLOCKED"), array("3", "NEW"), array("4", "INACTIVE"));
            $this->user_status_id->Required = true;
            $this->p_user_id = new clsControl(ccsHidden, "p_user_id", "p_user_id", ccsFloat, "", CCGetRequestParam("p_user_id", $Method, NULL), $this);
            $this->full_name = new clsControl(ccsTextBox, "full_name", "Nama Lengkap User", ccsText, "", CCGetRequestParam("full_name", $Method, NULL), $this);
            $this->full_name->Required = true;
            $this->created_by = new clsControl(ccsTextBox, "created_by", "Created By", ccsText, "", CCGetRequestParam("created_by", $Method, NULL), $this);
            $this->creation_date = new clsControl(ccsTextBox, "creation_date", "Creation Date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("creation_date", $Method, NULL), $this);
            $this->updated_by = new clsControl(ccsTextBox, "updated_by", "Updated By", ccsText, "", CCGetRequestParam("updated_by", $Method, NULL), $this);
            $this->updated_date = new clsControl(ccsTextBox, "updated_date", "Updated Date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("updated_date", $Method, NULL), $this);
            $this->ip_address_4 = new clsControl(ccsTextBox, "ip_address_4", "IP Address 4", ccsText, "", CCGetRequestParam("ip_address_4", $Method, NULL), $this);
            $this->ip_address_4->Required = true;
            $this->user_name = new clsControl(ccsTextBox, "user_name", "Nama User", ccsText, "", CCGetRequestParam("user_name", $Method, NULL), $this);
            $this->user_name->Required = true;
            $this->ip_address_6 = new clsControl(ccsTextBox, "ip_address_6", "IP Address 6", ccsText, "", CCGetRequestParam("ip_address_6", $Method, NULL), $this);
            $this->ip_address_6->Required = true;
            $this->last_login_time = new clsControl(ccsTextBox, "last_login_time", "Terakhir Login", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("last_login_time", $Method, NULL), $this);
            $this->email_address = new clsControl(ccsTextBox, "email_address", "Email", ccsText, "", CCGetRequestParam("email_address", $Method, NULL), $this);
            $this->email_address->Required = true;
            $this->expired_user_date = new clsControl(ccsTextBox, "expired_user_date", "Kadaluarsa User", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("expired_user_date", $Method, NULL), $this);
            $this->expired_user_date->Required = true;
            $this->expired_pwd_date = new clsControl(ccsTextBox, "expired_pwd_date", "Kadaluarsa Password", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("expired_pwd_date", $Method, NULL), $this);
            $this->expired_pwd_date->Required = true;
            $this->DatePicker_expired_user_date1 = new clsDatePicker("DatePicker_expired_user_date1", "roleForm", "expired_user_date", $this);
            $this->DatePicker_expired_pwd_date1 = new clsDatePicker("DatePicker_expired_pwd_date1", "roleForm", "expired_pwd_date", $this);
            $this->company_name = new clsControl(ccsTextBox, "company_name", "Nama Perusahaan", ccsText, "", CCGetRequestParam("company_name", $Method, NULL), $this);
            $this->company_name->Required = true;
            $this->p_company_client_id = new clsControl(ccsHidden, "p_company_client_id", "ID Perusahaan", ccsInteger, "", CCGetRequestParam("p_company_client_id", $Method, NULL), $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->created_by->Value) && !strlen($this->created_by->Value) && $this->created_by->Value !== false)
                    $this->created_by->SetText(CCGetUserLogin());
                if(!is_array($this->creation_date->Value) && !strlen($this->creation_date->Value) && $this->creation_date->Value !== false)
                    $this->creation_date->SetValue(time());
                if(!is_array($this->updated_by->Value) && !strlen($this->updated_by->Value) && $this->updated_by->Value !== false)
                    $this->updated_by->SetText(CCGetUserLogin());
                if(!is_array($this->updated_date->Value) && !strlen($this->updated_date->Value) && $this->updated_date->Value !== false)
                    $this->updated_date->SetValue(time());
                if(!is_array($this->last_login_time->Value) && !strlen($this->last_login_time->Value) && $this->last_login_time->Value !== false)
                    $this->last_login_time->SetValue(time());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @4-487D5E1B
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["urlp_user_id"] = CCGetFromGet("p_user_id", NULL);
    }
//End Initialize Method

//Validate Method @4-14DE0AB4
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->user_status_id->Validate() && $Validation);
        $Validation = ($this->p_user_id->Validate() && $Validation);
        $Validation = ($this->full_name->Validate() && $Validation);
        $Validation = ($this->created_by->Validate() && $Validation);
        $Validation = ($this->creation_date->Validate() && $Validation);
        $Validation = ($this->updated_by->Validate() && $Validation);
        $Validation = ($this->updated_date->Validate() && $Validation);
        $Validation = ($this->ip_address_4->Validate() && $Validation);
        $Validation = ($this->user_name->Validate() && $Validation);
        $Validation = ($this->ip_address_6->Validate() && $Validation);
        $Validation = ($this->last_login_time->Validate() && $Validation);
        $Validation = ($this->email_address->Validate() && $Validation);
        $Validation = ($this->expired_user_date->Validate() && $Validation);
        $Validation = ($this->expired_pwd_date->Validate() && $Validation);
        $Validation = ($this->company_name->Validate() && $Validation);
        $Validation = ($this->p_company_client_id->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->user_status_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_user_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->full_name->Errors->Count() == 0);
        $Validation =  $Validation && ($this->created_by->Errors->Count() == 0);
        $Validation =  $Validation && ($this->creation_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->updated_by->Errors->Count() == 0);
        $Validation =  $Validation && ($this->updated_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ip_address_4->Errors->Count() == 0);
        $Validation =  $Validation && ($this->user_name->Errors->Count() == 0);
        $Validation =  $Validation && ($this->ip_address_6->Errors->Count() == 0);
        $Validation =  $Validation && ($this->last_login_time->Errors->Count() == 0);
        $Validation =  $Validation && ($this->email_address->Errors->Count() == 0);
        $Validation =  $Validation && ($this->expired_user_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->expired_pwd_date->Errors->Count() == 0);
        $Validation =  $Validation && ($this->company_name->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_company_client_id->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @4-664ABBA6
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->user_status_id->Errors->Count());
        $errors = ($errors || $this->p_user_id->Errors->Count());
        $errors = ($errors || $this->full_name->Errors->Count());
        $errors = ($errors || $this->created_by->Errors->Count());
        $errors = ($errors || $this->creation_date->Errors->Count());
        $errors = ($errors || $this->updated_by->Errors->Count());
        $errors = ($errors || $this->updated_date->Errors->Count());
        $errors = ($errors || $this->ip_address_4->Errors->Count());
        $errors = ($errors || $this->user_name->Errors->Count());
        $errors = ($errors || $this->ip_address_6->Errors->Count());
        $errors = ($errors || $this->last_login_time->Errors->Count());
        $errors = ($errors || $this->email_address->Errors->Count());
        $errors = ($errors || $this->expired_user_date->Errors->Count());
        $errors = ($errors || $this->expired_pwd_date->Errors->Count());
        $errors = ($errors || $this->DatePicker_expired_user_date1->Errors->Count());
        $errors = ($errors || $this->DatePicker_expired_pwd_date1->Errors->Count());
        $errors = ($errors || $this->company_name->Errors->Count());
        $errors = ($errors || $this->p_company_client_id->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @4-2DBC746B
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
        $Redirect = "p_user.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = "p_user.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "p_user_id"));
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

//InsertRow Method @4-5870ABD5
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->code->SetValue($this->code->GetValue(true));
        $this->DataSource->is_active->SetValue($this->is_active->GetValue(true));
        $this->DataSource->description->SetValue($this->description->GetValue(true));
        $this->DataSource->creation_date->SetValue($this->creation_date->GetValue(true));
        $this->DataSource->created_by->SetValue($this->created_by->GetValue(true));
        $this->DataSource->updated_date->SetValue($this->updated_date->GetValue(true));
        $this->DataSource->updated_by->SetValue($this->updated_by->GetValue(true));
        $this->DataSource->p_module_id->SetValue($this->p_module_id->GetValue(true));
        $this->DataSource->tooltip_text->SetValue($this->tooltip_text->GetValue(true));
        $this->DataSource->listing_no->SetValue($this->listing_no->GetValue(true));
        $this->DataSource->user_status_id->SetValue($this->user_status_id->GetValue(true));
        $this->DataSource->p_user_id->SetValue($this->p_user_id->GetValue(true));
        $this->DataSource->full_name->SetValue($this->full_name->GetValue(true));
        $this->DataSource->ip_address_4->SetValue($this->ip_address_4->GetValue(true));
        $this->DataSource->user_name->SetValue($this->user_name->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @4-B4A3C1F0
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->code->SetValue($this->code->GetValue(true));
        $this->DataSource->is_active->SetValue($this->is_active->GetValue(true));
        $this->DataSource->description->SetValue($this->description->GetValue(true));
        $this->DataSource->creation_date->SetValue($this->creation_date->GetValue(true));
        $this->DataSource->created_by->SetValue($this->created_by->GetValue(true));
        $this->DataSource->updated_date->SetValue($this->updated_date->GetValue(true));
        $this->DataSource->updated_by->SetValue($this->updated_by->GetValue(true));
        $this->DataSource->p_module_id->SetValue($this->p_module_id->GetValue(true));
        $this->DataSource->tooltip_text->SetValue($this->tooltip_text->GetValue(true));
        $this->DataSource->listing_no->SetValue($this->listing_no->GetValue(true));
        $this->DataSource->user_status_id->SetValue($this->user_status_id->GetValue(true));
        $this->DataSource->p_user_id->SetValue($this->p_user_id->GetValue(true));
        $this->DataSource->full_name->SetValue($this->full_name->GetValue(true));
        $this->DataSource->ip_address_4->SetValue($this->ip_address_4->GetValue(true));
        $this->DataSource->user_name->SetValue($this->user_name->GetValue(true));
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

//Show Method @4-E60839CF
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

        $this->user_status_id->Prepare();

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
                    $this->user_status_id->SetValue($this->DataSource->user_status_id->GetValue());
                    $this->p_user_id->SetValue($this->DataSource->p_user_id->GetValue());
                    $this->full_name->SetValue($this->DataSource->full_name->GetValue());
                    $this->created_by->SetValue($this->DataSource->created_by->GetValue());
                    $this->creation_date->SetValue($this->DataSource->creation_date->GetValue());
                    $this->updated_by->SetValue($this->DataSource->updated_by->GetValue());
                    $this->updated_date->SetValue($this->DataSource->updated_date->GetValue());
                    $this->ip_address_4->SetValue($this->DataSource->ip_address_4->GetValue());
                    $this->user_name->SetValue($this->DataSource->user_name->GetValue());
                    $this->ip_address_6->SetValue($this->DataSource->ip_address_6->GetValue());
                    $this->last_login_time->SetValue($this->DataSource->last_login_time->GetValue());
                    $this->email_address->SetValue($this->DataSource->email_address->GetValue());
                    $this->expired_user_date->SetValue($this->DataSource->expired_user_date->GetValue());
                    $this->expired_pwd_date->SetValue($this->DataSource->expired_pwd_date->GetValue());
                    $this->company_name->SetValue($this->DataSource->company_name->GetValue());
                    $this->p_company_client_id->SetValue($this->DataSource->p_company_client_id->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->user_status_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_user_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->full_name->Errors->ToString());
            $Error = ComposeStrings($Error, $this->created_by->Errors->ToString());
            $Error = ComposeStrings($Error, $this->creation_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->updated_by->Errors->ToString());
            $Error = ComposeStrings($Error, $this->updated_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ip_address_4->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user_name->Errors->ToString());
            $Error = ComposeStrings($Error, $this->ip_address_6->Errors->ToString());
            $Error = ComposeStrings($Error, $this->last_login_time->Errors->ToString());
            $Error = ComposeStrings($Error, $this->email_address->Errors->ToString());
            $Error = ComposeStrings($Error, $this->expired_user_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->expired_pwd_date->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_expired_user_date1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->DatePicker_expired_pwd_date1->Errors->ToString());
            $Error = ComposeStrings($Error, $this->company_name->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_company_client_id->Errors->ToString());
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
        $this->user_status_id->Show();
        $this->p_user_id->Show();
        $this->full_name->Show();
        $this->created_by->Show();
        $this->creation_date->Show();
        $this->updated_by->Show();
        $this->updated_date->Show();
        $this->ip_address_4->Show();
        $this->user_name->Show();
        $this->ip_address_6->Show();
        $this->last_login_time->Show();
        $this->email_address->Show();
        $this->expired_user_date->Show();
        $this->expired_pwd_date->Show();
        $this->DatePicker_expired_user_date1->Show();
        $this->DatePicker_expired_pwd_date1->Show();
        $this->company_name->Show();
        $this->p_company_client_id->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End roleForm Class @4-FCB6E20C

class clsroleFormDataSource extends clsDBhrcon {  //roleFormDataSource Class @4-F8C9D9C3

//DataSource Variables @4-CD08EE45
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
    public $user_status_id;
    public $p_user_id;
    public $full_name;
    public $created_by;
    public $creation_date;
    public $updated_by;
    public $updated_date;
    public $ip_address_4;
    public $user_name;
    public $ip_address_6;
    public $last_login_time;
    public $email_address;
    public $expired_user_date;
    public $expired_pwd_date;
    public $company_name;
    public $p_company_client_id;
//End DataSource Variables

//DataSourceClass_Initialize Event @4-97CDC9F3
    function clsroleFormDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record roleForm/Error";
        $this->Initialize();
        $this->user_status_id = new clsField("user_status_id", ccsText, "");
        
        $this->p_user_id = new clsField("p_user_id", ccsFloat, "");
        
        $this->full_name = new clsField("full_name", ccsText, "");
        
        $this->created_by = new clsField("created_by", ccsText, "");
        
        $this->creation_date = new clsField("creation_date", ccsDate, $this->DateFormat);
        
        $this->updated_by = new clsField("updated_by", ccsText, "");
        
        $this->updated_date = new clsField("updated_date", ccsDate, $this->DateFormat);
        
        $this->ip_address_4 = new clsField("ip_address_4", ccsText, "");
        
        $this->user_name = new clsField("user_name", ccsText, "");
        
        $this->ip_address_6 = new clsField("ip_address_6", ccsText, "");
        
        $this->last_login_time = new clsField("last_login_time", ccsDate, $this->DateFormat);
        
        $this->email_address = new clsField("email_address", ccsText, "");
        
        $this->expired_user_date = new clsField("expired_user_date", ccsDate, $this->DateFormat);
        
        $this->expired_pwd_date = new clsField("expired_pwd_date", ccsDate, $this->DateFormat);
        
        $this->company_name = new clsField("company_name", ccsText, "");
        
        $this->p_company_client_id = new clsField("p_company_client_id", ccsInteger, "");
        

        $this->InsertFields["code"] = array("Name" => "code", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["is_active"] = array("Name" => "is_active", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["description"] = array("Name" => "description", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["creation_date"] = array("Name" => "creation_date", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["created_by"] = array("Name" => "created_by", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["updated_date"] = array("Name" => "updated_date", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->InsertFields["updated_by"] = array("Name" => "updated_by", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["p_module_id"] = array("Name" => "p_module_id", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["tooltip_text"] = array("Name" => "tooltip_text", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["listing_no"] = array("Name" => "listing_no", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["user_status_id"] = array("Name" => "user_status_id", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["p_user_id"] = array("Name" => "p_user_id", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->InsertFields["full_name"] = array("Name" => "full_name", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["ip_address_4"] = array("Name" => "ip_address_4", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->InsertFields["user_name"] = array("Name" => "user_name", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["code"] = array("Name" => "code", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["is_active"] = array("Name" => "is_active", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["description"] = array("Name" => "description", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["creation_date"] = array("Name" => "creation_date", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["created_by"] = array("Name" => "created_by", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["updated_date"] = array("Name" => "updated_date", "Value" => "", "DataType" => ccsDate, "OmitIfEmpty" => 1);
        $this->UpdateFields["updated_by"] = array("Name" => "updated_by", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["p_module_id"] = array("Name" => "p_module_id", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["tooltip_text"] = array("Name" => "tooltip_text", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["listing_no"] = array("Name" => "listing_no", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["user_status_id"] = array("Name" => "user_status_id", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["p_user_id"] = array("Name" => "p_user_id", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["full_name"] = array("Name" => "full_name", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["ip_address_4"] = array("Name" => "ip_address_4", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["user_name"] = array("Name" => "user_name", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @4-DADB639B
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlp_user_id", ccsFloat, "", "", $this->Parameters["urlp_user_id"], 0, false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
    }
//End Prepare Method

//Open Method @4-2672DBAE
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT a.*, b.company_name,\n" .
        "CASE WHEN a.user_status_id = 1 THEN 'ACTIVE'\n" .
        "     WHEN a.user_status_id = 2 THEN 'BLOCKED'\n" .
        "     WHEN a.user_status_id = 3 THEN 'NEW'\n" .
        "     WHEN a.user_status_id = 4 THEN 'INACTIVE'\n" .
        "     ELSE ''\n" .
        "END AS user_status\n" .
        "FROM p_user AS a\n" .
        "LEFT JOIN p_company_client AS b ON a.p_company_client_id = b.p_company_client_id\n" .
        "WHERE p_user_id = " . $this->SQLValue($this->wp->GetDBValue("1"), ccsFloat) . " ";
        $this->Order = "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @4-818880CC
    function SetValues()
    {
        $this->user_status_id->SetDBValue($this->f("user_status_id"));
        $this->p_user_id->SetDBValue(trim($this->f("p_user_id")));
        $this->full_name->SetDBValue($this->f("full_name"));
        $this->created_by->SetDBValue($this->f("created_by"));
        $this->creation_date->SetDBValue(trim($this->f("creation_date")));
        $this->updated_by->SetDBValue($this->f("updated_by"));
        $this->updated_date->SetDBValue(trim($this->f("updated_date")));
        $this->ip_address_4->SetDBValue($this->f("ip_address_4"));
        $this->user_name->SetDBValue($this->f("user_name"));
        $this->ip_address_6->SetDBValue($this->f("ip_address_6"));
        $this->last_login_time->SetDBValue(trim($this->f("last_login_time")));
        $this->email_address->SetDBValue($this->f("email_address"));
        $this->expired_user_date->SetDBValue(trim($this->f("expired_user_date")));
        $this->expired_pwd_date->SetDBValue(trim($this->f("expired_pwd_date")));
        $this->company_name->SetDBValue($this->f("company_name"));
        $this->p_company_client_id->SetDBValue(trim($this->f("p_company_client_id")));
    }
//End SetValues Method

//Insert Method @4-FB101FB0
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["code"] = new clsSQLParameter("ctrlcode", ccsText, "", "", $this->code->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["is_active"] = new clsSQLParameter("ctrlis_active", ccsText, "", "", $this->is_active->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["description"] = new clsSQLParameter("ctrldescription", ccsText, "", "", $this->description->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["creation_date"] = new clsSQLParameter("ctrlcreation_date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->creation_date->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["created_by"] = new clsSQLParameter("ctrlcreated_by", ccsText, "", "", $this->created_by->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["updated_date"] = new clsSQLParameter("ctrlupdated_date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->updated_date->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["updated_by"] = new clsSQLParameter("ctrlupdated_by", ccsText, "", "", $this->updated_by->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["p_module_id"] = new clsSQLParameter("ctrlp_module_id", ccsFloat, "", "", $this->p_module_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["tooltip_text"] = new clsSQLParameter("ctrltooltip_text", ccsText, "", "", $this->tooltip_text->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["listing_no"] = new clsSQLParameter("ctrllisting_no", ccsText, "", "", $this->listing_no->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_status_id"] = new clsSQLParameter("ctrluser_status_id", ccsText, "", "", $this->user_status_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["p_user_id"] = new clsSQLParameter("ctrlp_user_id", ccsFloat, "", "", $this->p_user_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["full_name"] = new clsSQLParameter("ctrlfull_name", ccsText, "", "", $this->full_name->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ip_address_4"] = new clsSQLParameter("ctrlip_address_4", ccsText, "", "", $this->ip_address_4->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_name"] = new clsSQLParameter("ctrluser_name", ccsText, "", "", $this->user_name->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["code"]->GetValue()) and !strlen($this->cp["code"]->GetText()) and !is_bool($this->cp["code"]->GetValue())) 
            $this->cp["code"]->SetValue($this->code->GetValue(true));
        if (!is_null($this->cp["is_active"]->GetValue()) and !strlen($this->cp["is_active"]->GetText()) and !is_bool($this->cp["is_active"]->GetValue())) 
            $this->cp["is_active"]->SetValue($this->is_active->GetValue(true));
        if (!is_null($this->cp["description"]->GetValue()) and !strlen($this->cp["description"]->GetText()) and !is_bool($this->cp["description"]->GetValue())) 
            $this->cp["description"]->SetValue($this->description->GetValue(true));
        if (!is_null($this->cp["creation_date"]->GetValue()) and !strlen($this->cp["creation_date"]->GetText()) and !is_bool($this->cp["creation_date"]->GetValue())) 
            $this->cp["creation_date"]->SetValue($this->creation_date->GetValue(true));
        if (!is_null($this->cp["created_by"]->GetValue()) and !strlen($this->cp["created_by"]->GetText()) and !is_bool($this->cp["created_by"]->GetValue())) 
            $this->cp["created_by"]->SetValue($this->created_by->GetValue(true));
        if (!is_null($this->cp["updated_date"]->GetValue()) and !strlen($this->cp["updated_date"]->GetText()) and !is_bool($this->cp["updated_date"]->GetValue())) 
            $this->cp["updated_date"]->SetValue($this->updated_date->GetValue(true));
        if (!is_null($this->cp["updated_by"]->GetValue()) and !strlen($this->cp["updated_by"]->GetText()) and !is_bool($this->cp["updated_by"]->GetValue())) 
            $this->cp["updated_by"]->SetValue($this->updated_by->GetValue(true));
        if (!is_null($this->cp["p_module_id"]->GetValue()) and !strlen($this->cp["p_module_id"]->GetText()) and !is_bool($this->cp["p_module_id"]->GetValue())) 
            $this->cp["p_module_id"]->SetValue($this->p_module_id->GetValue(true));
        if (!is_null($this->cp["tooltip_text"]->GetValue()) and !strlen($this->cp["tooltip_text"]->GetText()) and !is_bool($this->cp["tooltip_text"]->GetValue())) 
            $this->cp["tooltip_text"]->SetValue($this->tooltip_text->GetValue(true));
        if (!is_null($this->cp["listing_no"]->GetValue()) and !strlen($this->cp["listing_no"]->GetText()) and !is_bool($this->cp["listing_no"]->GetValue())) 
            $this->cp["listing_no"]->SetValue($this->listing_no->GetValue(true));
        if (!is_null($this->cp["user_status_id"]->GetValue()) and !strlen($this->cp["user_status_id"]->GetText()) and !is_bool($this->cp["user_status_id"]->GetValue())) 
            $this->cp["user_status_id"]->SetValue($this->user_status_id->GetValue(true));
        if (!is_null($this->cp["p_user_id"]->GetValue()) and !strlen($this->cp["p_user_id"]->GetText()) and !is_bool($this->cp["p_user_id"]->GetValue())) 
            $this->cp["p_user_id"]->SetValue($this->p_user_id->GetValue(true));
        if (!is_null($this->cp["full_name"]->GetValue()) and !strlen($this->cp["full_name"]->GetText()) and !is_bool($this->cp["full_name"]->GetValue())) 
            $this->cp["full_name"]->SetValue($this->full_name->GetValue(true));
        if (!is_null($this->cp["ip_address_4"]->GetValue()) and !strlen($this->cp["ip_address_4"]->GetText()) and !is_bool($this->cp["ip_address_4"]->GetValue())) 
            $this->cp["ip_address_4"]->SetValue($this->ip_address_4->GetValue(true));
        if (!is_null($this->cp["user_name"]->GetValue()) and !strlen($this->cp["user_name"]->GetText()) and !is_bool($this->cp["user_name"]->GetValue())) 
            $this->cp["user_name"]->SetValue($this->user_name->GetValue(true));
        $this->InsertFields["code"]["Value"] = $this->cp["code"]->GetDBValue(true);
        $this->InsertFields["is_active"]["Value"] = $this->cp["is_active"]->GetDBValue(true);
        $this->InsertFields["description"]["Value"] = $this->cp["description"]->GetDBValue(true);
        $this->InsertFields["creation_date"]["Value"] = $this->cp["creation_date"]->GetDBValue(true);
        $this->InsertFields["created_by"]["Value"] = $this->cp["created_by"]->GetDBValue(true);
        $this->InsertFields["updated_date"]["Value"] = $this->cp["updated_date"]->GetDBValue(true);
        $this->InsertFields["updated_by"]["Value"] = $this->cp["updated_by"]->GetDBValue(true);
        $this->InsertFields["p_module_id"]["Value"] = $this->cp["p_module_id"]->GetDBValue(true);
        $this->InsertFields["tooltip_text"]["Value"] = $this->cp["tooltip_text"]->GetDBValue(true);
        $this->InsertFields["listing_no"]["Value"] = $this->cp["listing_no"]->GetDBValue(true);
        $this->InsertFields["user_status_id"]["Value"] = $this->cp["user_status_id"]->GetDBValue(true);
        $this->InsertFields["p_user_id"]["Value"] = $this->cp["p_user_id"]->GetDBValue(true);
        $this->InsertFields["full_name"]["Value"] = $this->cp["full_name"]->GetDBValue(true);
        $this->InsertFields["ip_address_4"]["Value"] = $this->cp["ip_address_4"]->GetDBValue(true);
        $this->InsertFields["user_name"]["Value"] = $this->cp["user_name"]->GetDBValue(true);
        $this->SQL = CCBuildInsert("p_user", $this->InsertFields, $this);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @4-D54F1170
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["code"] = new clsSQLParameter("ctrlcode", ccsText, "", "", $this->code->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["is_active"] = new clsSQLParameter("ctrlis_active", ccsText, "", "", $this->is_active->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["description"] = new clsSQLParameter("ctrldescription", ccsText, "", "", $this->description->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["creation_date"] = new clsSQLParameter("ctrlcreation_date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->creation_date->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["created_by"] = new clsSQLParameter("ctrlcreated_by", ccsText, "", "", $this->created_by->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["updated_date"] = new clsSQLParameter("ctrlupdated_date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), $this->DateFormat, $this->updated_date->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["updated_by"] = new clsSQLParameter("ctrlupdated_by", ccsText, "", "", $this->updated_by->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["p_module_id"] = new clsSQLParameter("ctrlp_module_id", ccsFloat, "", "", $this->p_module_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["tooltip_text"] = new clsSQLParameter("ctrltooltip_text", ccsText, "", "", $this->tooltip_text->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["listing_no"] = new clsSQLParameter("ctrllisting_no", ccsText, "", "", $this->listing_no->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_status_id"] = new clsSQLParameter("ctrluser_status_id", ccsText, "", "", $this->user_status_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["p_user_id"] = new clsSQLParameter("ctrlp_user_id", ccsFloat, "", "", $this->p_user_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["full_name"] = new clsSQLParameter("ctrlfull_name", ccsText, "", "", $this->full_name->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["ip_address_4"] = new clsSQLParameter("ctrlip_address_4", ccsText, "", "", $this->ip_address_4->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_name"] = new clsSQLParameter("ctrluser_name", ccsText, "", "", $this->user_name->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlp_user_id", ccsFloat, "", "", CCGetFromGet("p_user_id", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["code"]->GetValue()) and !strlen($this->cp["code"]->GetText()) and !is_bool($this->cp["code"]->GetValue())) 
            $this->cp["code"]->SetValue($this->code->GetValue(true));
        if (!is_null($this->cp["is_active"]->GetValue()) and !strlen($this->cp["is_active"]->GetText()) and !is_bool($this->cp["is_active"]->GetValue())) 
            $this->cp["is_active"]->SetValue($this->is_active->GetValue(true));
        if (!is_null($this->cp["description"]->GetValue()) and !strlen($this->cp["description"]->GetText()) and !is_bool($this->cp["description"]->GetValue())) 
            $this->cp["description"]->SetValue($this->description->GetValue(true));
        if (!is_null($this->cp["creation_date"]->GetValue()) and !strlen($this->cp["creation_date"]->GetText()) and !is_bool($this->cp["creation_date"]->GetValue())) 
            $this->cp["creation_date"]->SetValue($this->creation_date->GetValue(true));
        if (!is_null($this->cp["created_by"]->GetValue()) and !strlen($this->cp["created_by"]->GetText()) and !is_bool($this->cp["created_by"]->GetValue())) 
            $this->cp["created_by"]->SetValue($this->created_by->GetValue(true));
        if (!is_null($this->cp["updated_date"]->GetValue()) and !strlen($this->cp["updated_date"]->GetText()) and !is_bool($this->cp["updated_date"]->GetValue())) 
            $this->cp["updated_date"]->SetValue($this->updated_date->GetValue(true));
        if (!is_null($this->cp["updated_by"]->GetValue()) and !strlen($this->cp["updated_by"]->GetText()) and !is_bool($this->cp["updated_by"]->GetValue())) 
            $this->cp["updated_by"]->SetValue($this->updated_by->GetValue(true));
        if (!is_null($this->cp["p_module_id"]->GetValue()) and !strlen($this->cp["p_module_id"]->GetText()) and !is_bool($this->cp["p_module_id"]->GetValue())) 
            $this->cp["p_module_id"]->SetValue($this->p_module_id->GetValue(true));
        if (!is_null($this->cp["tooltip_text"]->GetValue()) and !strlen($this->cp["tooltip_text"]->GetText()) and !is_bool($this->cp["tooltip_text"]->GetValue())) 
            $this->cp["tooltip_text"]->SetValue($this->tooltip_text->GetValue(true));
        if (!is_null($this->cp["listing_no"]->GetValue()) and !strlen($this->cp["listing_no"]->GetText()) and !is_bool($this->cp["listing_no"]->GetValue())) 
            $this->cp["listing_no"]->SetValue($this->listing_no->GetValue(true));
        if (!is_null($this->cp["user_status_id"]->GetValue()) and !strlen($this->cp["user_status_id"]->GetText()) and !is_bool($this->cp["user_status_id"]->GetValue())) 
            $this->cp["user_status_id"]->SetValue($this->user_status_id->GetValue(true));
        if (!is_null($this->cp["p_user_id"]->GetValue()) and !strlen($this->cp["p_user_id"]->GetText()) and !is_bool($this->cp["p_user_id"]->GetValue())) 
            $this->cp["p_user_id"]->SetValue($this->p_user_id->GetValue(true));
        if (!is_null($this->cp["full_name"]->GetValue()) and !strlen($this->cp["full_name"]->GetText()) and !is_bool($this->cp["full_name"]->GetValue())) 
            $this->cp["full_name"]->SetValue($this->full_name->GetValue(true));
        if (!is_null($this->cp["ip_address_4"]->GetValue()) and !strlen($this->cp["ip_address_4"]->GetText()) and !is_bool($this->cp["ip_address_4"]->GetValue())) 
            $this->cp["ip_address_4"]->SetValue($this->ip_address_4->GetValue(true));
        if (!is_null($this->cp["user_name"]->GetValue()) and !strlen($this->cp["user_name"]->GetText()) and !is_bool($this->cp["user_name"]->GetValue())) 
            $this->cp["user_name"]->SetValue($this->user_name->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "p_user_id", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsFloat),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["code"]["Value"] = $this->cp["code"]->GetDBValue(true);
        $this->UpdateFields["is_active"]["Value"] = $this->cp["is_active"]->GetDBValue(true);
        $this->UpdateFields["description"]["Value"] = $this->cp["description"]->GetDBValue(true);
        $this->UpdateFields["creation_date"]["Value"] = $this->cp["creation_date"]->GetDBValue(true);
        $this->UpdateFields["created_by"]["Value"] = $this->cp["created_by"]->GetDBValue(true);
        $this->UpdateFields["updated_date"]["Value"] = $this->cp["updated_date"]->GetDBValue(true);
        $this->UpdateFields["updated_by"]["Value"] = $this->cp["updated_by"]->GetDBValue(true);
        $this->UpdateFields["p_module_id"]["Value"] = $this->cp["p_module_id"]->GetDBValue(true);
        $this->UpdateFields["tooltip_text"]["Value"] = $this->cp["tooltip_text"]->GetDBValue(true);
        $this->UpdateFields["listing_no"]["Value"] = $this->cp["listing_no"]->GetDBValue(true);
        $this->UpdateFields["user_status_id"]["Value"] = $this->cp["user_status_id"]->GetDBValue(true);
        $this->UpdateFields["p_user_id"]["Value"] = $this->cp["p_user_id"]->GetDBValue(true);
        $this->UpdateFields["full_name"]["Value"] = $this->cp["full_name"]->GetDBValue(true);
        $this->UpdateFields["ip_address_4"]["Value"] = $this->cp["ip_address_4"]->GetDBValue(true);
        $this->UpdateFields["user_name"]["Value"] = $this->cp["user_name"]->GetDBValue(true);
        $this->SQL = CCBuildUpdate("p_user", $this->UpdateFields, $this);
        $this->SQL .= strlen($Where) ? " WHERE " . $Where : $Where;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteUpdate", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteUpdate", $this->Parent);
        }
    }
//End Update Method

//Delete Method @4-62319CB0
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "urlp_user_id", ccsFloat, "", "", CCGetFromGet("p_user_id", NULL), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildDelete", $this->Parent);
        $wp->Criterion[1] = $wp->Operation(opEqual, "p_user_id", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsFloat),false);
        $Where = 
             $wp->Criterion[1];
        $this->SQL = "DELETE FROM p_user";
        $this->SQL = CCBuildSQL($this->SQL, $Where, "");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteDelete", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteDelete", $this->Parent);
        }
    }
//End Delete Method

} //End roleFormDataSource Class @4-FCB6E20C

//Include Page implementation @19-41C3001C
include_once(RelativePath . "/Designs/modal/modal_start.php");
//End Include Page implementation

//Include Page implementation @86-49C15BEE
include_once(RelativePath . "/Designs/modal/modal_end.php");
//End Include Page implementation





//Initialize Page @1-E9F93F30
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
$TemplateFileName = "p_user_form.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|js/jquery/updatepanel/ccs-update-panel.js|";
//End Initialize Page

//Include events file @1-6507C868
include_once("./p_user_form_events.php");
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
