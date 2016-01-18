<?php
//Include Common Files @1-F5A349A4
define("RelativePath", "..");
define("PathToCurrentPage", "/admin.menu/");
define("FileName", "p_user_pass_change.php");
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

//Class_Initialize Event @4-12DE22E2
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
            $this->new_password2 = new clsControl(ccsTextBox, "new_password2", "new_password2", ccsText, "", CCGetRequestParam("new_password2", $Method, NULL), $this);
            $this->p_user_id = new clsControl(ccsHidden, "p_user_id", "p_user_id", ccsFloat, "", CCGetRequestParam("p_user_id", $Method, NULL), $this);
            $this->old_password = new clsControl(ccsTextBox, "old_password", "Password Lama", ccsText, "", CCGetRequestParam("old_password", $Method, NULL), $this);
            $this->old_password->Required = true;
            $this->new_password = new clsControl(ccsTextBox, "new_password", "Password Baru", ccsText, "", CCGetRequestParam("new_password", $Method, NULL), $this);
            $this->new_password->Required = true;
            $this->user_name = new clsControl(ccsTextBox, "user_name", "User Name", ccsText, "", CCGetRequestParam("user_name", $Method, NULL), $this);
            $this->user_name->Required = true;
            if(!$this->FormSubmitted) {
                if(!is_array($this->user_name->Value) && !strlen($this->user_name->Value) && $this->user_name->Value !== false)
                    $this->user_name->SetText(CCGetUserLogin());
            }
        }
    }
//End Class_Initialize Event

//Initialize Method @4-D3026D7D
    function Initialize()
    {

        if(!$this->Visible)
            return;

        $this->DataSource->Parameters["sesUserID"] = CCGetSession("UserID", NULL);
    }
//End Initialize Method

//Validate Method @4-7F10FB4C
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->new_password2->Validate() && $Validation);
        $Validation = ($this->p_user_id->Validate() && $Validation);
        $Validation = ($this->old_password->Validate() && $Validation);
        $Validation = ($this->new_password->Validate() && $Validation);
        $Validation = ($this->user_name->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->new_password2->Errors->Count() == 0);
        $Validation =  $Validation && ($this->p_user_id->Errors->Count() == 0);
        $Validation =  $Validation && ($this->old_password->Errors->Count() == 0);
        $Validation =  $Validation && ($this->new_password->Errors->Count() == 0);
        $Validation =  $Validation && ($this->user_name->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @4-E3A21302
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->new_password2->Errors->Count());
        $errors = ($errors || $this->p_user_id->Errors->Count());
        $errors = ($errors || $this->old_password->Errors->Count());
        $errors = ($errors || $this->new_password->Errors->Count());
        $errors = ($errors || $this->user_name->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        $errors = ($errors || $this->DataSource->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @4-C7985C7F
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
        $Redirect = "p_user_pass_change.php" . "?" . CCGetQueryString("QueryString", array("ccsForm"));
        if($this->PressedButton == "Button_Delete") {
            $Redirect = "p_user_pass_change.php" . "?" . CCGetQueryString("QueryString", array("ccsForm", "p_role_id"));
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

//InsertRow Method @4-F91AF1D7
    function InsertRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInsert", $this);
        if(!$this->InsertAllowed) return false;
        $this->DataSource->new_password2->SetValue($this->new_password2->GetValue(true));
        $this->DataSource->p_user_id->SetValue($this->p_user_id->GetValue(true));
        $this->DataSource->old_password->SetValue($this->old_password->GetValue(true));
        $this->DataSource->new_password->SetValue($this->new_password->GetValue(true));
        $this->DataSource->user_name->SetValue($this->user_name->GetValue(true));
        $this->DataSource->Insert();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInsert", $this);
        return (!$this->CheckErrors());
    }
//End InsertRow Method

//UpdateRow Method @4-C3140C8B
    function UpdateRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUpdate", $this);
        if(!$this->UpdateAllowed) return false;
        $this->DataSource->p_user_id->SetValue($this->p_user_id->GetValue(true));
        $this->DataSource->new_password2->SetValue($this->new_password2->GetValue(true));
        $this->DataSource->p_user_id->SetValue($this->p_user_id->GetValue(true));
        $this->DataSource->old_password->SetValue($this->old_password->GetValue(true));
        $this->DataSource->new_password->SetValue($this->new_password->GetValue(true));
        $this->DataSource->user_name->SetValue($this->user_name->GetValue(true));
        $this->DataSource->Update();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterUpdate", $this);
        return (!$this->CheckErrors());
    }
//End UpdateRow Method

//DeleteRow Method @4-F2256062
    function DeleteRow()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeDelete", $this);
        if(!$this->DeleteAllowed) return false;
        $this->DataSource->p_user_id->SetValue($this->p_user_id->GetValue(true));
        $this->DataSource->Delete();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterDelete", $this);
        return (!$this->CheckErrors());
    }
//End DeleteRow Method

//Show Method @4-65F2993D
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
                    $this->new_password2->SetValue($this->DataSource->new_password2->GetValue());
                    $this->p_user_id->SetValue($this->DataSource->p_user_id->GetValue());
                    $this->old_password->SetValue($this->DataSource->old_password->GetValue());
                    $this->new_password->SetValue($this->DataSource->new_password->GetValue());
                    $this->user_name->SetValue($this->DataSource->user_name->GetValue());
                }
            } else {
                $this->EditMode = false;
            }
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->new_password2->Errors->ToString());
            $Error = ComposeStrings($Error, $this->p_user_id->Errors->ToString());
            $Error = ComposeStrings($Error, $this->old_password->Errors->ToString());
            $Error = ComposeStrings($Error, $this->new_password->Errors->ToString());
            $Error = ComposeStrings($Error, $this->user_name->Errors->ToString());
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
        $this->new_password2->Show();
        $this->p_user_id->Show();
        $this->old_password->Show();
        $this->new_password->Show();
        $this->user_name->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

} //End roleForm Class @4-FCB6E20C

class clsroleFormDataSource extends clsDBhrcon {  //roleFormDataSource Class @4-F8C9D9C3

//DataSource Variables @4-3E549876
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

    public $UpdateFields = array();

    // Datasource fields
    public $new_password2;
    public $p_user_id;
    public $old_password;
    public $new_password;
    public $user_name;
//End DataSource Variables

//DataSourceClass_Initialize Event @4-AEF9B811
    function clsroleFormDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Record roleForm/Error";
        $this->Initialize();
        $this->new_password2 = new clsField("new_password2", ccsText, "");
        
        $this->p_user_id = new clsField("p_user_id", ccsFloat, "");
        
        $this->old_password = new clsField("old_password", ccsText, "");
        
        $this->new_password = new clsField("new_password", ccsText, "");
        
        $this->user_name = new clsField("user_name", ccsText, "");
        

        $this->UpdateFields["user_pwd"] = array("Name" => "user_pwd", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["p_user_id"] = array("Name" => "p_user_id", "Value" => "", "DataType" => ccsFloat, "OmitIfEmpty" => 1);
        $this->UpdateFields["user_pwd"] = array("Name" => "user_pwd", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["user_pwd"] = array("Name" => "user_pwd", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
        $this->UpdateFields["user_name"] = array("Name" => "user_name", "Value" => "", "DataType" => ccsText, "OmitIfEmpty" => 1);
    }
//End DataSourceClass_Initialize Event

//Prepare Method @4-EB142696
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "sesUserID", ccsFloat, "", "", $this->Parameters["sesUserID"], "", false);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "p_user_id", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsFloat),false);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @4-9642A18D
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->SQL = "SELECT * \n\n" .
        "FROM p_user {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        $this->PageSize = 1;
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @4-4EC2C0D6
    function SetValues()
    {
        $this->new_password2->SetDBValue($this->f("user_pwd"));
        $this->p_user_id->SetDBValue(trim($this->f("p_user_id")));
        $this->old_password->SetDBValue($this->f("user_pwd"));
        $this->new_password->SetDBValue($this->f("user_pwd"));
        $this->user_name->SetDBValue($this->f("user_name"));
    }
//End SetValues Method

//Insert Method @4-AB21C4B7
    function Insert()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $this->cp["new_password2"] = new clsSQLParameter("ctrlnew_password2", ccsText, "", "", $this->new_password2->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["p_user_id"] = new clsSQLParameter("ctrlp_user_id", ccsFloat, "", "", $this->p_user_id->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["old_password"] = new clsSQLParameter("ctrlold_password", ccsText, "", "", $this->old_password->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["new_password"] = new clsSQLParameter("ctrlnew_password", ccsText, "", "", $this->new_password->GetValue(true), "", false, $this->ErrorBlock);
        $this->cp["user_name"] = new clsSQLParameter("ctrluser_name", ccsText, "", "", $this->user_name->GetValue(true), "", false, $this->ErrorBlock);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildInsert", $this->Parent);
        if (!is_null($this->cp["new_password2"]->GetValue()) and !strlen($this->cp["new_password2"]->GetText()) and !is_bool($this->cp["new_password2"]->GetValue())) 
            $this->cp["new_password2"]->SetValue($this->new_password2->GetValue(true));
        if (!is_null($this->cp["p_user_id"]->GetValue()) and !strlen($this->cp["p_user_id"]->GetText()) and !is_bool($this->cp["p_user_id"]->GetValue())) 
            $this->cp["p_user_id"]->SetValue($this->p_user_id->GetValue(true));
        if (!is_null($this->cp["old_password"]->GetValue()) and !strlen($this->cp["old_password"]->GetText()) and !is_bool($this->cp["old_password"]->GetValue())) 
            $this->cp["old_password"]->SetValue($this->old_password->GetValue(true));
        if (!is_null($this->cp["new_password"]->GetValue()) and !strlen($this->cp["new_password"]->GetText()) and !is_bool($this->cp["new_password"]->GetValue())) 
            $this->cp["new_password"]->SetValue($this->new_password->GetValue(true));
        if (!is_null($this->cp["user_name"]->GetValue()) and !strlen($this->cp["user_name"]->GetText()) and !is_bool($this->cp["user_name"]->GetValue())) 
            $this->cp["user_name"]->SetValue($this->user_name->GetValue(true));
        $this->SQL = "INSERT INTO p_user(user_pwd, p_user_id, user_pwd, user_pwd, user_name) VALUES('" . $this->SQLValue($this->cp["new_password2"]->GetDBValue(), ccsText) . "', " . $this->SQLValue($this->cp["p_user_id"]->GetDBValue(), ccsFloat) . ", '" . $this->SQLValue($this->cp["old_password"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["new_password"]->GetDBValue(), ccsText) . "', '" . $this->SQLValue($this->cp["user_name"]->GetDBValue(), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteInsert", $this->Parent);
        if($this->Errors->Count() == 0 && $this->CmdExecution) {
            $this->query($this->SQL);
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteInsert", $this->Parent);
        }
    }
//End Insert Method

//Update Method @4-77BD4C3F
    function Update()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $this->cp["user_pwd"] = new clsSQLParameter("ctrlnew_password2", ccsText, "", "", $this->new_password2->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["p_user_id"] = new clsSQLParameter("ctrlp_user_id", ccsFloat, "", "", $this->p_user_id->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_pwd"] = new clsSQLParameter("ctrlold_password", ccsText, "", "", $this->old_password->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_pwd"] = new clsSQLParameter("ctrlnew_password", ccsText, "", "", $this->new_password->GetValue(true), NULL, false, $this->ErrorBlock);
        $this->cp["user_name"] = new clsSQLParameter("ctrluser_name", ccsText, "", "", $this->user_name->GetValue(true), NULL, false, $this->ErrorBlock);
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "ctrlp_user_id", ccsFloat, "", "", $this->p_user_id->GetValue(true), "", false);
        if(!$wp->AllParamsSet()) {
            $this->Errors->addError($CCSLocales->GetText("CCS_CustomOperationError_MissingParameters"));
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildUpdate", $this->Parent);
        if (!is_null($this->cp["user_pwd"]->GetValue()) and !strlen($this->cp["user_pwd"]->GetText()) and !is_bool($this->cp["user_pwd"]->GetValue())) 
            $this->cp["user_pwd"]->SetValue($this->new_password2->GetValue(true));
        if (!is_null($this->cp["p_user_id"]->GetValue()) and !strlen($this->cp["p_user_id"]->GetText()) and !is_bool($this->cp["p_user_id"]->GetValue())) 
            $this->cp["p_user_id"]->SetValue($this->p_user_id->GetValue(true));
        if (!is_null($this->cp["user_pwd"]->GetValue()) and !strlen($this->cp["user_pwd"]->GetText()) and !is_bool($this->cp["user_pwd"]->GetValue())) 
            $this->cp["user_pwd"]->SetValue($this->old_password->GetValue(true));
        if (!is_null($this->cp["user_pwd"]->GetValue()) and !strlen($this->cp["user_pwd"]->GetText()) and !is_bool($this->cp["user_pwd"]->GetValue())) 
            $this->cp["user_pwd"]->SetValue($this->new_password->GetValue(true));
        if (!is_null($this->cp["user_name"]->GetValue()) and !strlen($this->cp["user_name"]->GetText()) and !is_bool($this->cp["user_name"]->GetValue())) 
            $this->cp["user_name"]->SetValue($this->user_name->GetValue(true));
        $wp->Criterion[1] = $wp->Operation(opEqual, "p_user_id", $wp->GetDBValue("1"), $this->ToSQL($wp->GetDBValue("1"), ccsFloat),false);
        $Where = 
             $wp->Criterion[1];
        $this->UpdateFields["user_pwd"]["Value"] = $this->cp["user_pwd"]->GetDBValue(true);
        $this->UpdateFields["p_user_id"]["Value"] = $this->cp["p_user_id"]->GetDBValue(true);
        $this->UpdateFields["user_pwd"]["Value"] = $this->cp["user_pwd"]->GetDBValue(true);
        $this->UpdateFields["user_pwd"]["Value"] = $this->cp["user_pwd"]->GetDBValue(true);
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

//Delete Method @4-1DB36AF1
    function Delete()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->CmdExecution = true;
        $Where = "";
        $wp = new clsSQLParameters($this->ErrorBlock);
        $wp->AddParameter("1", "ctrlp_user_id", ccsFloat, "", "", $this->p_user_id->GetValue(true), "", false);
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

//Initialize Page @1-8AC8C89D
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
$TemplateFileName = "p_user_pass_change.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
//End Initialize Page

//Include events file @1-EE257B3E
include_once("./p_user_pass_change_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-4539BCF1
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
$MainPage->Head = & $Head;
$MainPage->Content = & $Content;
$MainPage->roleForm = & $roleForm;
$Content->AddComponent("roleForm", $roleForm);
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

//Execute Components @1-46599135
$MasterPage->Operations();
$roleForm->Operation();
//End Execute Components

//Go to destination page @1-058FCE63
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBhrcon->close();
    header("Location: " . $Redirect);
    unset($roleForm);
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

//Unload Page @1-8E34DC85
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBhrcon->close();
unset($MasterPage);
unset($roleForm);
unset($Tpl);
//End Unload Page


?>
