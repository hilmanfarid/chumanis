<?php
//Include Common Files @1-ACEDC255
define("RelativePath", "..");
define("PathToCurrentPage", "/admin/");
define("FileName", "p_role_list.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Master Page implementation @1-0875C812
include_once(RelativePath . "/admin/../Designs/d01/MasterPage.php");
//End Master Page implementation

class clsGridp_role { //p_role class @10-0DD42E16

//Variables @10-74021F26

    // Public variables
    public $ComponentType = "Grid";
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $ErrorBlock;
    public $ds;
    public $DataSource;
    public $PageSize;
    public $IsEmpty;
    public $ForceIteration = false;
    public $HasRecord = false;
    public $SorterName = "";
    public $SorterDirection = "";
    public $PageNumber;
    public $RowNumber;
    public $ControlsVisible = array();

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";
    public $Attributes;

    // Grid Controls
    public $StaticControls;
    public $RowControls;
    public $Sorter_p_role_id;
    public $Sorter_code;
    public $Sorter_listing_no;
    public $Sorter_valid_from;
    public $Sorter_valid_to;
    public $Sorter_description;
    public $Sorter_creation_date;
    public $Sorter_created_by;
    public $Sorter_updated_date;
    public $Sorter_updated_by;
//End Variables

//Class_Initialize Event @10-E00005F7
    function clsGridp_role($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "p_role";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid p_role";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsp_roleDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 3;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;
        $this->SorterName = CCGetParam("p_roleOrder", "");
        $this->SorterDirection = CCGetParam("p_roleDir", "");

        $this->p_role_id = new clsControl(ccsLink, "p_role_id", "p_role_id", ccsFloat, "", CCGetRequestParam("p_role_id", ccsGet, NULL), $this);
        $this->p_role_id->Page = "p_role_maint.php";
        $this->code = new clsControl(ccsLabel, "code", "code", ccsText, "", CCGetRequestParam("code", ccsGet, NULL), $this);
        $this->listing_no = new clsControl(ccsLabel, "listing_no", "listing_no", ccsFloat, "", CCGetRequestParam("listing_no", ccsGet, NULL), $this);
        $this->valid_from = new clsControl(ccsLabel, "valid_from", "valid_from", ccsDate, $DefaultDateFormat, CCGetRequestParam("valid_from", ccsGet, NULL), $this);
        $this->valid_to = new clsControl(ccsLabel, "valid_to", "valid_to", ccsDate, $DefaultDateFormat, CCGetRequestParam("valid_to", ccsGet, NULL), $this);
        $this->description = new clsControl(ccsLabel, "description", "description", ccsText, "", CCGetRequestParam("description", ccsGet, NULL), $this);
        $this->creation_date = new clsControl(ccsLabel, "creation_date", "creation_date", ccsDate, $DefaultDateFormat, CCGetRequestParam("creation_date", ccsGet, NULL), $this);
        $this->created_by = new clsControl(ccsLabel, "created_by", "created_by", ccsText, "", CCGetRequestParam("created_by", ccsGet, NULL), $this);
        $this->updated_date = new clsControl(ccsLabel, "updated_date", "updated_date", ccsDate, $DefaultDateFormat, CCGetRequestParam("updated_date", ccsGet, NULL), $this);
        $this->updated_by = new clsControl(ccsLabel, "updated_by", "updated_by", ccsText, "", CCGetRequestParam("updated_by", ccsGet, NULL), $this);
        $this->p_role_Insert = new clsControl(ccsLink, "p_role_Insert", "p_role_Insert", ccsText, "", CCGetRequestParam("p_role_Insert", ccsGet, NULL), $this);
        $this->p_role_Insert->Parameters = CCGetQueryString("QueryString", array("p_role_id", "ccsForm"));
        $this->p_role_Insert->Page = "p_role_maint.php";
        $this->Sorter_p_role_id = new clsSorter($this->ComponentName, "Sorter_p_role_id", $FileName, $this);
        $this->Sorter_p_role_id->Visible = false;
        $this->Sorter_code = new clsSorter($this->ComponentName, "Sorter_code", $FileName, $this);
        $this->Sorter_listing_no = new clsSorter($this->ComponentName, "Sorter_listing_no", $FileName, $this);
        $this->Sorter_valid_from = new clsSorter($this->ComponentName, "Sorter_valid_from", $FileName, $this);
        $this->Sorter_valid_to = new clsSorter($this->ComponentName, "Sorter_valid_to", $FileName, $this);
        $this->Sorter_description = new clsSorter($this->ComponentName, "Sorter_description", $FileName, $this);
        $this->Sorter_creation_date = new clsSorter($this->ComponentName, "Sorter_creation_date", $FileName, $this);
        $this->Sorter_created_by = new clsSorter($this->ComponentName, "Sorter_created_by", $FileName, $this);
        $this->Sorter_updated_date = new clsSorter($this->ComponentName, "Sorter_updated_date", $FileName, $this);
        $this->Sorter_updated_by = new clsSorter($this->ComponentName, "Sorter_updated_by", $FileName, $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpSimple, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
    }
//End Class_Initialize Event

//Initialize Method @10-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @10-29A4D27A
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["urls_keyword"] = CCGetFromGet("s_keyword", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);


        $this->DataSource->Prepare();
        $this->DataSource->Open();
        $this->HasRecord = $this->DataSource->has_next_record();
        $this->IsEmpty = ! $this->HasRecord;
        $this->Attributes->Show();

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) return;

        $GridBlock = "Grid " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $GridBlock;


        if (!$this->IsEmpty) {
            $this->ControlsVisible["p_role_id"] = $this->p_role_id->Visible;
            $this->ControlsVisible["code"] = $this->code->Visible;
            $this->ControlsVisible["listing_no"] = $this->listing_no->Visible;
            $this->ControlsVisible["valid_from"] = $this->valid_from->Visible;
            $this->ControlsVisible["valid_to"] = $this->valid_to->Visible;
            $this->ControlsVisible["description"] = $this->description->Visible;
            $this->ControlsVisible["creation_date"] = $this->creation_date->Visible;
            $this->ControlsVisible["created_by"] = $this->created_by->Visible;
            $this->ControlsVisible["updated_date"] = $this->updated_date->Visible;
            $this->ControlsVisible["updated_by"] = $this->updated_by->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->p_role_id->SetValue($this->DataSource->p_role_id->GetValue());
                $this->p_role_id->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->p_role_id->Parameters = CCAddParam($this->p_role_id->Parameters, "p_role_id", $this->DataSource->f("p_role_id"));
                $this->code->SetValue($this->DataSource->code->GetValue());
                $this->listing_no->SetValue($this->DataSource->listing_no->GetValue());
                $this->valid_from->SetValue($this->DataSource->valid_from->GetValue());
                $this->valid_to->SetValue($this->DataSource->valid_to->GetValue());
                $this->description->SetValue($this->DataSource->description->GetValue());
                $this->creation_date->SetValue($this->DataSource->creation_date->GetValue());
                $this->created_by->SetValue($this->DataSource->created_by->GetValue());
                $this->updated_date->SetValue($this->DataSource->updated_date->GetValue());
                $this->updated_by->SetValue($this->DataSource->updated_by->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->p_role_id->Show();
                $this->code->Show();
                $this->listing_no->Show();
                $this->valid_from->Show();
                $this->valid_to->Show();
                $this->description->Show();
                $this->creation_date->Show();
                $this->created_by->Show();
                $this->updated_date->Show();
                $this->updated_by->Show();
                $Tpl->block_path = $ParentPath . "/" . $GridBlock;
                $Tpl->parse("Row", true);
            }
        }
        else { // Show NoRecords block if no records are found
            $this->Attributes->Show();
            $Tpl->parse("NoRecords", false);
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            return;
        }
        $this->Navigator->PageNumber = $this->DataSource->AbsolutePage;
        $this->Navigator->PageSize = $this->PageSize;
        if ($this->DataSource->RecordsCount == "CCS not counted")
            $this->Navigator->TotalPages = $this->DataSource->AbsolutePage + ($this->DataSource->next_record() ? 1 : 0);
        else
            $this->Navigator->TotalPages = $this->DataSource->PageCount();
        if (($this->Navigator->TotalPages <= 1 && $this->Navigator->PageNumber == 1) || $this->Navigator->PageSize == "") {
            $this->Navigator->Visible = false;
        }
        $this->p_role_Insert->Show();
        $this->Sorter_p_role_id->Show();
        $this->Sorter_code->Show();
        $this->Sorter_listing_no->Show();
        $this->Sorter_valid_from->Show();
        $this->Sorter_valid_to->Show();
        $this->Sorter_description->Show();
        $this->Sorter_creation_date->Show();
        $this->Sorter_created_by->Show();
        $this->Sorter_updated_date->Show();
        $this->Sorter_updated_by->Show();
        $this->Navigator->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @10-31A137AA
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->p_role_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->code->Errors->ToString());
        $errors = ComposeStrings($errors, $this->listing_no->Errors->ToString());
        $errors = ComposeStrings($errors, $this->valid_from->Errors->ToString());
        $errors = ComposeStrings($errors, $this->valid_to->Errors->ToString());
        $errors = ComposeStrings($errors, $this->description->Errors->ToString());
        $errors = ComposeStrings($errors, $this->creation_date->Errors->ToString());
        $errors = ComposeStrings($errors, $this->created_by->Errors->ToString());
        $errors = ComposeStrings($errors, $this->updated_date->Errors->ToString());
        $errors = ComposeStrings($errors, $this->updated_by->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End p_role Class @10-FCB6E20C

class clsp_roleDataSource extends clsDBhrcon {  //p_roleDataSource Class @10-4D7C1D2B

//DataSource Variables @10-8741720D
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $p_role_id;
    public $code;
    public $listing_no;
    public $valid_from;
    public $valid_to;
    public $description;
    public $creation_date;
    public $created_by;
    public $updated_date;
    public $updated_by;
//End DataSource Variables

//DataSourceClass_Initialize Event @10-247BD911
    function clsp_roleDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid p_role";
        $this->Initialize();
        $this->p_role_id = new clsField("p_role_id", ccsFloat, "");
        
        $this->code = new clsField("code", ccsText, "");
        
        $this->listing_no = new clsField("listing_no", ccsFloat, "");
        
        $this->valid_from = new clsField("valid_from", ccsDate, $this->DateFormat);
        
        $this->valid_to = new clsField("valid_to", ccsDate, $this->DateFormat);
        
        $this->description = new clsField("description", ccsText, "");
        
        $this->creation_date = new clsField("creation_date", ccsDate, $this->DateFormat);
        
        $this->created_by = new clsField("created_by", ccsText, "");
        
        $this->updated_date = new clsField("updated_date", ccsDate, $this->DateFormat);
        
        $this->updated_by = new clsField("updated_by", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @10-29ABA6BF
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            array("Sorter_p_role_id" => array("p_role_id", ""), 
            "Sorter_code" => array("code", ""), 
            "Sorter_listing_no" => array("listing_no", ""), 
            "Sorter_valid_from" => array("valid_from", ""), 
            "Sorter_valid_to" => array("valid_to", ""), 
            "Sorter_description" => array("description", ""), 
            "Sorter_creation_date" => array("creation_date", ""), 
            "Sorter_created_by" => array("created_by", ""), 
            "Sorter_updated_date" => array("updated_date", ""), 
            "Sorter_updated_by" => array("updated_by", "")));
    }
//End SetOrder Method

//Prepare Method @10-25AA94A2
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urls_keyword", ccsText, "", "", $this->Parameters["urls_keyword"], "", false);
    }
//End Prepare Method

//Open Method @10-E0A2553C
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select * from f_list_p_role (null,'" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "')) cnt";
        $this->SQL = "select * from f_list_p_role (null,'" . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . "')";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @10-DEC3B3CA
    function SetValues()
    {
        $this->p_role_id->SetDBValue(trim($this->f("p_role_id")));
        $this->code->SetDBValue($this->f("code"));
        $this->listing_no->SetDBValue(trim($this->f("listing_no")));
        $this->valid_from->SetDBValue(trim($this->f("valid_from")));
        $this->valid_to->SetDBValue(trim($this->f("valid_to")));
        $this->description->SetDBValue($this->f("description"));
        $this->creation_date->SetDBValue(trim($this->f("creation_date")));
        $this->created_by->SetDBValue($this->f("created_by"));
        $this->updated_date->SetDBValue(trim($this->f("updated_date")));
        $this->updated_by->SetDBValue($this->f("updated_by"));
    }
//End SetValues Method

} //End p_roleDataSource Class @10-FCB6E20C

class clsRecordp_roleSearch { //p_roleSearch Class @2-37EEFF0B

//Variables @2-9E315808

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

//Class_Initialize Event @2-A732A72C
    function clsRecordp_roleSearch($RelativePath, & $Parent)
    {

        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Record p_roleSearch/Error";
        $this->ReadAllowed = true;
        if($this->Visible)
        {
            $this->ComponentName = "p_roleSearch";
            $this->Attributes = new clsAttributes($this->ComponentName . ":");
            $CCSForm = explode(":", CCGetFromGet("ccsForm", ""), 2);
            if(sizeof($CCSForm) == 1)
                $CCSForm[1] = "";
            list($FormName, $FormMethod) = $CCSForm;
            $this->FormEnctype = "application/x-www-form-urlencoded";
            $this->FormSubmitted = ($FormName == $this->ComponentName);
            $Method = $this->FormSubmitted ? ccsPost : ccsGet;
            $this->Button_DoSearch = new clsButton("Button_DoSearch", $Method, $this);
            $this->s_keyword = new clsControl(ccsTextBox, "s_keyword", "Code", ccsText, "", CCGetRequestParam("s_keyword", $Method, NULL), $this);
        }
    }
//End Class_Initialize Event

//Validate Method @2-A144A629
    function Validate()
    {
        global $CCSLocales;
        $Validation = true;
        $Where = "";
        $Validation = ($this->s_keyword->Validate() && $Validation);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnValidate", $this);
        $Validation =  $Validation && ($this->s_keyword->Errors->Count() == 0);
        return (($this->Errors->Count() == 0) && $Validation);
    }
//End Validate Method

//CheckErrors Method @2-D6729123
    function CheckErrors()
    {
        $errors = false;
        $errors = ($errors || $this->s_keyword->Errors->Count());
        $errors = ($errors || $this->Errors->Count());
        return $errors;
    }
//End CheckErrors Method

//Operation Method @2-D1CA6756
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
        $Redirect = "p_role_list.php";
        if($this->Validate()) {
            if($this->PressedButton == "Button_DoSearch") {
                $Redirect = "p_role_list.php" . "?" . CCMergeQueryStrings(CCGetQueryString("Form", array("Button_DoSearch", "Button_DoSearch_x", "Button_DoSearch_y")));
                if(!CCGetEvent($this->Button_DoSearch->CCSEvents, "OnClick", $this->Button_DoSearch)) {
                    $Redirect = "";
                }
            }
        } else {
            $Redirect = "";
        }
    }
//End Operation Method

//Show Method @2-AB6C9DC4
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

        if($this->FormSubmitted || $this->CheckErrors()) {
            $Error = "";
            $Error = ComposeStrings($Error, $this->s_keyword->Errors->ToString());
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

        $this->Button_DoSearch->Show();
        $this->s_keyword->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
    }
//End Show Method

} //End p_roleSearch Class @2-FCB6E20C



//Initialize Page @1-3379BD9D
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
$TemplateFileName = "p_role_list.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|js/jquery/jquery.js|js/jquery/event-manager.js|js/jquery/selectors.js|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-CDC843EF
include_once("./p_role_list_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-ADF01500
$DBhrcon = new clsDBhrcon();
$MainPage->Connections["hrcon"] = & $DBhrcon;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$MasterPage = new clsMasterPage("/admin/../Designs/d01/", "MasterPage", $MainPage);
$MasterPage->Attributes = $Attributes;
$MasterPage->Initialize();
$Head = new clsPanel("Head", $MainPage);
$Head->PlaceholderName = "Head";
$Content = new clsPanel("Content", $MainPage);
$Content->PlaceholderName = "Content";
$p_role = new clsGridp_role("", $MainPage);
$p_roleSearch = new clsRecordp_roleSearch("", $MainPage);
$MainPage->Head = & $Head;
$MainPage->Content = & $Content;
$MainPage->p_role = & $p_role;
$MainPage->p_roleSearch = & $p_roleSearch;
$Content->AddComponent("p_role", $p_role);
$Content->AddComponent("p_roleSearch", $p_roleSearch);
$p_role->Initialize();
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

//Execute Components @1-AA34B4F7
$MasterPage->Operations();
$p_roleSearch->Operation();
//End Execute Components

//Go to destination page @1-9E3E3EA8
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBhrcon->close();
    header("Location: " . $Redirect);
    unset($p_role);
    unset($p_roleSearch);
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

//Unload Page @1-026155D0
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBhrcon->close();
unset($MasterPage);
unset($p_role);
unset($p_roleSearch);
unset($Tpl);
//End Unload Page


?>
