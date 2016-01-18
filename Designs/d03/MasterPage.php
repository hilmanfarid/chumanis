<?php

class clsRecordMasterPageDXX { //DXX Class @13-983B20A5

//Variables @13-9E315808

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

//Class_Initialize Event @13-C032D0E0
    function clsRecordMasterPageDXX($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record DXX/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "DXX";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->design = new clsControl(ccsListBox, "design", "design", ccsText, "", CCGetRequestParam("design", $Method, NULL), $this);
            $this->design->DSType = dsListOfValues;
            $this->design->Values = array(array("d01", "multicolor"), array("d02", "gray"), array("d03", "blue"), array("d04", "green"), array("d05", "orange"));
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            if(!$this->FormSubmitted) {
                if(!is_array($this->design->Value) && !strlen($this->design->Value) && $this->design->Value !== false)
                    $this->design->SetText(CCGetCookie("design"));
            }
        }
    }
//End Class_Initialize Event

//Validate Method @13-85C8DA32
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->design->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->design->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @13-46E6722D
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->design->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @13-DD94EE4C
    function Operation()
    {
        if(!$this->Visible)
            return;

        global $Redirect;
        global $FileName;

        if(!$this->FormSubmitted) {
            return;
        }

        if($this->FormSubmitted) {
            $this->PressedButton = "Button_DoSearch";
            if($this->Button_DoSearch->Pressed) {
                $this->PressedButton = "Button_DoSearch";
            }
        }
        $Redirect = $FileName;
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = $FileName . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @13-791863AF
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

        $this->design->Prepare();

        $RecordBlock = "Record " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $RecordBlock;
        $this->EditMode = $this->EditMode && $this->ReadAllowed;
        if (!$this->FormSubmitted) {
        }

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->design->Errors->ToString());
            $Error = ComposeStrings($Error, $this->Errors->ToString());
            $Tpl->SetVar("Error", $Error);
            $Tpl->Parse("Error", false);
        }
        $CCSForm = $this->EditMode ? $this->ComponentName . ":" . "Edit" : $this->ComponentName;
        $this->HTMLFormAction = $FileName . "?" . CCAddParam(CCGetQueryString("QueryString", ""), "ccsForm", $CCSForm);
        $Tpl->SetVar("Action", !$CCSUseAmp ? $this->HTMLFormAction : str_replace("&", "&amp;", $this->HTMLFormAction));
        $Tpl->SetVar("HTMLFormName", $this->ComponentName);
        $Tpl->SetVar("HTMLFormEnctype", $this->FormEnctype);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        $this->Attributes->Show();
        if(!$this->Visible) {
            $Tpl->block_path = $ParentPath;
            return;
        }

        $this->design->Show();
        $this->Button_DoSearch->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End DXX Class @13-FCB6E20C

class clsMasterPage { //MasterPage class @1-BFE8F48A

//Variables @1-6DB8BB64
    public $ComponentType = "IncludablePage";
    public $Connections = array();
    public $FileName = "";
    public $Redirect = "";
    public $Tpl = "";
    public $TemplateFileName = "";
    public $BlockToParse = "";
    public $ComponentName = "";
    public $Attributes = "";
    public $PathToCurrentMasterPage = "";
    public $TemplatePathValue = "";
    public $HTML;

    // Events;
    public $CCSEvents = "";
    public $CCSEventResult = "";
    public $RelativePath;
    public $Visible;
    public $Parent;
    public $TemplateSource;
//End Variables

//Class_Initialize Event @1-AA1E13E7
    function clsMasterPage($RelativePath, $ComponentName, & $Parent)
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = $ComponentName;
        $this->RelativePath = $RelativePath;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->FileName = "MasterPage.php";
        $this->Redirect = "";
        $this->TemplateFileName = "MasterPage.html";
        $this->BlockToParse = "main";
        $this->TemplateEncoding = "CP1252";
        $this->ContentType = "text/html";
    }
//End Class_Initialize Event

//Class_Terminate Event @1-C8389021
    function Class_Terminate()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUnload", $this);
        unset($this->DXX);
    }
//End Class_Terminate Event

//BindEvents Method @1-EBFD06DB
    function BindEvents()
    {
        $this->lhMenu->CCSEvents["BeforeShow"] = "MasterPage_lhMenu_BeforeShow";
        $this->llMenu->CCSEvents["BeforeShow"] = "MasterPage_llMenu_BeforeShow";
        $this->CCSEvents["OnInitializeView"] = "MasterPage_OnInitializeView";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInitialize", $this);
    }
//End BindEvents Method

//Operations Method @1-E2D33348
    function Operations()
    {
        global $Redirect;
        if(!$this->Visible)
            return "";
        $this->DXX->Operation();
    }
//End Operations Method

//Initialize Method @1-947448A0
    function Initialize($Path = "")
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        global $PathToCurrentMasterPage;
        $this->TemplatePathValue = $Path;
        $PathToCurrentMasterPage = $this->RelativePath;
        global $Scripts;
        $IncScripts = "|";
        $SList = explode("|", $IncScripts);
        foreach ($SList as $Script) {
            if ($Script != "" && strpos($Scripts, "|" . $Script . "|") === false)  $Scripts = $Scripts . $Script . "|";
        }
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeInitialize", $this);
        if(!$this->Visible)
            return "";
        $this->Attributes = & $this->Parent->Attributes;

        // Create Components
        $this->lhMenu = new clsControl(ccsLabel, "lhMenu", "lhMenu", ccsText, "", CCGetRequestParam("lhMenu", ccsGet, NULL), $this);
        $this->lhMenu->HTML = true;
        $this->llMenu = new clsControl(ccsLabel, "llMenu", "llMenu", ccsText, "", CCGetRequestParam("llMenu", ccsGet, NULL), $this);
        $this->llMenu->HTML = true;
        $this->DXX = new clsRecordMasterPageDXX("", $this);
        $this->Head = new clsPanel("Head", $this);
        $this->Head->isContentPlaceholder = true;
        $this->Content = new clsPanel("Content", $this);
        $this->Content->isContentPlaceholder = true;
        $this->BindEvents();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnInitializeView", $this);
        $this->Tpl = new clsTemplate();
        if ($this->TemplateSource) {
            $this->Tpl->LoadTemplateFromStr($this->TemplateSource, "main", $this->TemplateEncoding);
        } else {
            $this->Tpl->LoadTemplate($this->RelativePath . $this->TemplateFileName, "main", $this->TemplateEncoding);
        }
    }
//End Initialize Method

//Show Method @1-AA1431F7
    function Show()
    {
        global $CCSLocales;
        $this->Tpl->block_path = "/main";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) {
            $this->Tpl->block_path = $block_path;
            $this->Tpl->SetVar($this->ComponentName, "");
            return "";
        }
        $this->Tpl->SetVar("CCS_PathToCurrentPage", RelativePath . $this->RelativePath);
        $this->Tpl->SetVar("page:pathToCurrentPage", RelativePath . $this->RelativePath);
        $this->Attributes->Show();
        $this->DXX->Show();
        $this->lhMenu->Show();
        $this->llMenu->Show();
        $this->Tpl->block_path = "";
        $this->Tpl->Parse("main", false);
        $this->HTML = $this->Tpl->GetVar("main");
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeOutput", $this);
    }
//End Show Method

} //End MasterPage Class @1-FCB6E20C

//Include Event File @1-F38E39C0
include_once(RelativePath . "/Designs/d01/MasterPage_events.php");
//End Include Event File


?>
