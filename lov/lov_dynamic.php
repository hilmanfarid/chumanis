<?php

//Include Common Files @1-10821E8D
define("RelativePath", "..");
define("PathToCurrentPage", "/lov/");
define("FileName", "lov_dynamic.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsGridlovDynamic { //lovDynamic class @2-BAD3B803

//Variables @2-6E51DF5A

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
//End Variables

//Class_Initialize Event @2-9E30884F
    function clsGridlovDynamic($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "lovDynamic";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid lovDynamic";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clslovDynamicDataSource($this);
        $this->ds = & $this->DataSource;
        $this->PageSize = CCGetParam($this->ComponentName . "PageSize", "");
        if(!is_numeric($this->PageSize) || !strlen($this->PageSize))
            $this->PageSize = 10;
        else
            $this->PageSize = intval($this->PageSize);
        if ($this->PageSize > 100)
            $this->PageSize = 100;
        if($this->PageSize == 0)
            $this->Errors->addError("<p>Form: Grid " . $this->ComponentName . "<BR>Error: (CCS06) Invalid page size.</p>");
        $this->PageNumber = intval(CCGetParam($this->ComponentName . "Page", 1));
        if ($this->PageNumber <= 0) $this->PageNumber = 1;

        $this->editlink = new clsControl(ccsImageLink, "editlink", "editlink", ccsText, "", CCGetRequestParam("editlink", ccsGet, NULL), $this);
        $this->editlink->Page = "role_form.php";
        $this->items_lov = new clsControl(ccsLabel, "items_lov", "items_lov", ccsText, "", CCGetRequestParam("items_lov", ccsGet, NULL), $this);
        $this->items_lov->HTML = true;
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->addlink = new clsControl(ccsImageLink, "addlink", "addlink", ccsText, "", CCGetRequestParam("addlink", ccsGet, NULL), $this);
        $this->addlink->Parameters = CCGetQueryString("QueryString", array("p_role_id", "ccsForm"));
        $this->addlink->Page = "role_form.php";
        $this->label_lov = new clsControl(ccsLabel, "label_lov", "label_lov", ccsText, "", CCGetRequestParam("label_lov", ccsGet, NULL), $this);
    }
//End Class_Initialize Event

//Initialize Method @2-90E704C5
    function Initialize()
    {
        if(!$this->Visible) return;

        $this->DataSource->PageSize = & $this->PageSize;
        $this->DataSource->AbsolutePage = & $this->PageNumber;
        $this->DataSource->SetOrder($this->SorterName, $this->SorterDirection);
    }
//End Initialize Method

//Show Method @2-359EAFD7
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;

        $this->DataSource->Parameters["expr26"] = implode(",", CCGetFromGet('items'));
        $this->DataSource->Parameters["expr27"] = CCGetFromGet('table');
        $this->DataSource->Parameters["expr28"] = CCGetFromGet('order_param');
        $this->DataSource->Parameters["expr29"] = CCGetFromGet('whereClause');

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
            $this->ControlsVisible["editlink"] = $this->editlink->Visible;
            $this->ControlsVisible["items_lov"] = $this->items_lov->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->editlink->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->editlink->Parameters = CCAddParam($this->editlink->Parameters, "p_role_id", $this->DataSource->f("p_role_id"));
                $this->items_lov->SetValue($this->DataSource->items_lov->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->editlink->Show();
                $this->items_lov->Show();
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
        $this->Navigator->Show();
        $this->addlink->Show();
        $this->label_lov->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-4DFF651B
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->editlink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->items_lov->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End lovDynamic Class @2-FCB6E20C

class clslovDynamicDataSource extends clsDBhrcon {  //lovDynamicDataSource Class @2-4EAECF8C

//DataSource Variables @2-9CD078E7
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $items_lov;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-094D7CD4
    function clslovDynamicDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid lovDynamic";
        $this->Initialize();
        $this->items_lov = new clsField("items_lov", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-9E1383D1
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-A3BFB50A
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "expr26", ccsText, "", "", $this->Parameters["expr26"], "", false);
        $this->wp->AddParameter("2", "expr27", ccsText, "", "", $this->Parameters["expr27"], "", false);
        $this->wp->AddParameter("3", "expr28", ccsText, "", "", $this->Parameters["expr28"], "", false);
        $this->wp->AddParameter("4", "expr29", ccsText, "", "", $this->Parameters["expr29"], "", false);
    }
//End Prepare Method

//Open Method @2-ECF6E3AB
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*) FROM (select " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " from " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " " . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . ") cnt";
        $this->SQL = "select " . $this->SQLValue($this->wp->GetDBValue("1"), ccsText) . " from " . $this->SQLValue($this->wp->GetDBValue("2"), ccsText) . " " . $this->SQLValue($this->wp->GetDBValue("4"), ccsText) . "";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-25FCFE8F
    function SetValues()
    {
        $this->items_lov->SetDBValue($this->f("items_lov"));
    }
//End SetValues Method

} //End lovDynamicDataSource Class @2-FCB6E20C

//Initialize Page @1-B28D2FE8
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";
$TemplateSource = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "lov_dynamic.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Include events file @1-5B92EBA6
include_once("./lov_dynamic_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-E878CD45
$DBhrcon = new clsDBhrcon();
$MainPage->Connections["hrcon"] = & $DBhrcon;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$lovDynamic = new clsGridlovDynamic("", $MainPage);
$MainPage->lovDynamic = & $lovDynamic;
$lovDynamic->Initialize();
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

//Initialize HTML Template @1-7D7DF5BA
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
if (strlen($TemplateSource)) {
    $Tpl->LoadTemplateFromStr($TemplateSource, $BlockToParse, "CP1252");
} else {
    $Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1252");
}
$Tpl->SetVar("CCS_PathToRoot", $PathToRoot);
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "../");
$Attributes->Show();
//End Initialize HTML Template

//Go to destination page @1-25785290
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBhrcon->close();
    header("Location: " . $Redirect);
    unset($lovDynamic);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-7915D27F
$lovDynamic->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$LTIBNEB4A6E9M = "<center><font face=\"Arial\"><small>&#71;en&#101;r&#97;&#116;&#101;d <!-- SCC -->&#119;&#105;t&#104; <!-- SCC -->&#67;o&#100;eC&#104;arg&#101; <!-- CCS -->&#83;t&#117;&#100;&#105;&#111;.</small></font></center>";
if(preg_match("/<\/body>/i", $main_block)) {
    $main_block = preg_replace("/<\/body>/i", $LTIBNEB4A6E9M . "</body>", $main_block);
} else if(preg_match("/<\/html>/i", $main_block) && !preg_match("/<\/frameset>/i", $main_block)) {
    $main_block = preg_replace("/<\/html>/i", $LTIBNEB4A6E9M . "</html>", $main_block);
} else if(!preg_match("/<\/frameset>/i", $main_block)) {
    $main_block .= $LTIBNEB4A6E9M;
}
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-94A50DAF
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBhrcon->close();
unset($lovDynamic);
unset($Tpl);
//End Unload Page
?>
