<?php
//Include Common Files @1-419D3F09
define("RelativePath", "..");
define("PathToCurrentPage", "/admin/");
define("FileName", "headerlabel.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

class clsPathPath_p_menu { //Path_p_menu class @2-403519D9

//Variables @2-8F51A715

    // Public variables
    public $ComponentType = "Path";
    public $ComponentName;
    public $Visible;
    public $Errors;
    public $ErrorBlock;
    public $ds;
    public $DataSource;
    public $IsEmpty;

    public $CCSEvents = "";
    public $CCSEventResult;

    public $RelativePath = "";
    public $Attributes = "";
//End Variables

//Class_Initialize Event @2-4BF8FF24
    function clsPathPath_p_menu($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "Path_p_menu";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Path Path_p_menu";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clsPath_p_menuDataSource($this);
        $this->ds = & $this->DataSource;

        $this->PathBeginLink = new clsControl(ccsLabel, "PathBeginLink", "PathBeginLink", ccsText, "", CCGetRequestParam("PathBeginLink", ccsGet, NULL), $this);
        $this->PathCategory = new clsControl(ccsLabel, "PathCategory", "PathCategory", ccsText, "", CCGetRequestParam("PathCategory", ccsGet, NULL), $this);
        $this->CurrentCategory = new clsControl(ccsLabel, "CurrentCategory", "CurrentCategory", ccsText, "", CCGetRequestParam("CurrentCategory", ccsGet, NULL), $this);
    }
//End Class_Initialize Event

//Initialize Method @2-5D060BAC
    function Initialize()
    {
        if(!$this->Visible) return;
    }
//End Initialize Method

//Show Method @2-E17F6767
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;


        $this->DataSource->Parameters["urlp_menu_id"] = CCGetFromGet("p_menu_id", NULL);

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeSelect", $this);

        $this->DataSource->Prepare();
        if ($this->DataSource->AllParametersSet) {
            $this->DataSource->Open();
        }

        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) {
            $this->DataSource->close();
            return;
        }

        $this->Attributes->Show();
        $PathBlock = "Path " . $this->ComponentName;
        $ParentPath = $Tpl->block_path;
        $Tpl->block_path = $ParentPath . "/" . $PathBlock;


        $is_next_record = ($this->DataSource->AllParametersSet && $this->DataSource->next_record());
        $this->IsEmpty = !$is_next_record;
        if($is_next_record)
        {
            $this->DataSource->SetValues();
            $this->CurrentCategory->SetValue($this->DataSource->CurrentCategory->GetValue());
            $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowCategory", $this);
            $this->Attributes->Show();
            $Tpl->block_path = $ParentPath . "/" . $PathBlock . "/CurrentCategory";
            $this->CurrentCategory->Show();
            $Tpl->block_path = $ParentPath . "/" . $PathBlock;
            $Tpl->parse("CurrentCategory", true);

            $category_parent_id = $this->DataSource->f("parent_id");
            $this->DataSource->Parameters["urlp_menu_id"] = $category_parent_id;
            $this->DataSource->Prepare();
            $this->DataSource->Open();
            while($this->DataSource->next_record() && $category_parent_id) {
                $this->DataSource->SetValues();
                $this->PathCategory->SetValue($this->DataSource->PathCategory->GetValue());
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowCategory", $this);
                $this->Attributes->Show();
                $Tpl->block_path = $ParentPath . "/" . $PathBlock . "/PathComponent";
                $this->PathCategory->Show();
                $Tpl->block_path = $ParentPath . "/" . $PathBlock;
                $Tpl->rparse("PathComponent", true);

                $category_parent_id = $this->DataSource->f("parent_id");
                $this->DataSource->Parameters["urlp_menu_id"] = $category_parent_id;
                $this->DataSource->Prepare();
                $this->DataSource->Open();
            } 
        }
        else
        {
        }

        $errors = $this->GetErrors();
        if(strlen($errors))
        {
            $Tpl->replaceblock("", $errors);
            $Tpl->block_path = $ParentPath;
            $this->DataSource->close();
            return;
        }
        $this->PathBeginLink->SetValue($this->DataSource->PathBeginLink->GetValue());
        $this->PathBeginLink->Show();
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-232FFA40
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->PathBeginLink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->PathCategory->Errors->ToString());
        $errors = ComposeStrings($errors, $this->CurrentCategory->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End Path_p_menu Class @2-FCB6E20C

class clsPath_p_menuDataSource extends clsDBhrcon {  //Path_p_menuDataSource Class @2-3D1899AD

//DataSource Variables @2-AF2FFA77
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;
    public $AllParametersSet;


    // Datasource fields
    public $PathBeginLink;
    public $PathCategory;
    public $CurrentCategory;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-BB0FD2D3
    function clsPath_p_menuDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Path Path_p_menu";
        $this->Initialize();
        $this->PathBeginLink = new clsField("PathBeginLink", ccsText, "");
        
        $this->PathCategory = new clsField("PathCategory", ccsText, "");
        
        $this->CurrentCategory = new clsField("CurrentCategory", ccsText, "");
        

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

//Prepare Method @2-F79EAA5E
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlp_menu_id", ccsInteger, "", "", $this->Parameters["urlp_menu_id"], "", true);
        $this->AllParametersSet = $this->wp->AllParamsSet();
        $this->wp->Criterion[1] = $this->wp->Operation(opEqual, "p_menu_id", $this->wp->GetDBValue("1"), $this->ToSQL($this->wp->GetDBValue("1"), ccsInteger),true);
        $this->Where = 
             $this->wp->Criterion[1];
    }
//End Prepare Method

//Open Method @2-8562F6FE
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM p_menu";
        $this->SQL = "SELECT * \n\n" .
        "FROM p_menu {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query(CCBuildSQL($this->SQL, $this->Where, $this->Order));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
        $this->MoveToPage($this->AbsolutePage);
    }
//End Open Method

//SetValues Method @2-4BE887E3
    function SetValues()
    {
        $this->PathBeginLink->SetDBValue($this->f("code"));
        $this->PathCategory->SetDBValue($this->f("code"));
        $this->CurrentCategory->SetDBValue($this->f("code"));
    }
//End SetValues Method

} //End Path_p_menuDataSource Class @2-FCB6E20C



//Initialize Page @1-5F9CC1DA
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
$TemplateFileName = "headerlabel.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|";
$Charset = $Charset ? $Charset : "windows-1252";
//End Initialize Page

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-293DD80A
$DBhrcon = new clsDBhrcon();
$MainPage->Connections["hrcon"] = & $DBhrcon;
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$Path_p_menu = new clsPathPath_p_menu("", $MainPage);
$MainPage->Path_p_menu = & $Path_p_menu;
$Path_p_menu->Initialize();
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

//Go to destination page @1-67D04D1C
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    $DBhrcon->close();
    header("Location: " . $Redirect);
    unset($Path_p_menu);
    unset($Tpl);
    exit;
}
//End Go to destination page

//Show Page @1-3EC75964
$Path_p_menu->Show();
$Tpl->block_path = "";
$Tpl->Parse($BlockToParse, false);
if (!isset($main_block)) $main_block = $Tpl->GetVar($BlockToParse);
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-319A16B3
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
$DBhrcon->close();
unset($Path_p_menu);
unset($Tpl);
//End Unload Page


?>
