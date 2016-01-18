<?php

class clsPathNewPage1Path_p_menu { //Path_p_menu class @2-01AF1EAC

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

//Class_Initialize Event @2-F73A59D0
    function clsPathNewPage1Path_p_menu($RelativePath, & $Parent)
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
        $this->DataSource = new clsNewPage1Path_p_menuDataSource($this);
        $this->ds = & $this->DataSource;

        $this->PathBeginLink = new clsControl(ccsLink, "PathBeginLink", "PathBeginLink", ccsText, "", CCGetRequestParam("PathBeginLink", ccsGet, NULL), $this);
        $this->PathBeginLink->Parameters = CCGetQueryString("QueryString", array("p_menu_id", "ccsForm"));
        $this->PathBeginLink->Page = $this->RelativePath . "NewPage1.php";
        $this->PathCategory = new clsControl(ccsLink, "PathCategory", "PathCategory", ccsText, "", CCGetRequestParam("PathCategory", ccsGet, NULL), $this);
        $this->PathCategory->Page = $this->RelativePath . "NewPage1.php";
        $this->CurrentCategory = new clsControl(ccsLabel, "CurrentCategory", "CurrentCategory", ccsText, "", CCGetRequestParam("CurrentCategory", ccsGet, NULL), $this);
    }
//End Class_Initialize Event

//Initialize Method @2-5D060BAC
    function Initialize()
    {
        if(!$this->Visible) return;
    }
//End Initialize Method

//Show Method @2-B95EF064
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        if(!$this->Visible) return;


        $this->DataSource->Parameters["urlidmenulabel"] = CCGetFromGet("idmenulabel", NULL);

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
			
			print(CCGetSession("p_module_id"));
			
            $category_parent_id = $this->DataSource->f("parent_id");
            $this->DataSource->Parameters["urlidmenulabel"] = $category_parent_id;
            $this->DataSource->Prepare();
            $this->DataSource->Open();			
            while($this->DataSource->next_record() && $category_parent_id) {
                $this->DataSource->SetValues();
                $this->PathCategory->SetValue($this->DataSource->PathCategory->GetValue());
                $this->PathCategory->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->PathCategory->Parameters = CCAddParam($this->PathCategory->Parameters, "p_menu_id", $this->DataSource->f("p_menu_id"));
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowCategory", $this);
                $this->Attributes->Show();
                $Tpl->block_path = $ParentPath . "/" . $PathBlock . "/PathComponent";
                $this->PathCategory->Show();
                $Tpl->block_path = $ParentPath . "/" . $PathBlock;
                $Tpl->rparse("PathComponent", true);

                $category_parent_id = $this->DataSource->f("parent_id");
                $this->DataSource->Parameters["urlidmenulabel"] = $category_parent_id;
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

class clsNewPage1Path_p_menuDataSource extends clsDBhrcon {  //Path_p_menuDataSource Class @2-F69CDA2D

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
    public $Label1;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-0E04B384
    function clsNewPage1Path_p_menuDataSource(& $Parent)
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

//Prepare Method @2-F3BF7C54
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->wp = new clsSQLParameters($this->ErrorBlock);
        $this->wp->AddParameter("1", "urlidmenulabel", ccsInteger, "", "", $this->Parameters["urlidmenulabel"], "", true);
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

class clsNewPage1 { //NewPage1 class @1-E35598A9

//Variables @1-EEEBE252
    public $ComponentType = "IncludablePage";
    public $Connections = array();
    public $FileName = "";
    public $Redirect = "";
    public $Tpl = "";
    public $TemplateFileName = "";
    public $BlockToParse = "";
    public $ComponentName = "";
    public $Attributes = "";

    // Events;
    public $CCSEvents = "";
    public $CCSEventResult = "";
    public $RelativePath;
    public $Visible;
    public $Parent;
    public $TemplateSource;
//End Variables

//Class_Initialize Event @1-16BBF5FA
    function clsNewPage1($RelativePath, $ComponentName, & $Parent)
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = $ComponentName;
        $this->RelativePath = $RelativePath;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->FileName = "NewPage1.php";
        $this->Redirect = "";
        $this->TemplateFileName = "NewPage1.html";
        $this->BlockToParse = "main";
        $this->TemplateEncoding = "CP1252";
        $this->ContentType = "text/html";
    }
//End Class_Initialize Event

//Class_Terminate Event @1-3311FE0E
    function Class_Terminate()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUnload", $this);
        unset($this->Path_p_menu);
    }
//End Class_Terminate Event

//BindEvents Method @1-0DAD0D56
    function BindEvents()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterInitialize", $this);
    }
//End BindEvents Method

//Operations Method @1-7E2A14CF
    function Operations()
    {
        global $Redirect;
        if(!$this->Visible)
            return "";
    }
//End Operations Method

//Initialize Method @1-AF509FC4
    function Initialize($Path = "")
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
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
        $this->DBhrcon = new clsDBhrcon();
        $this->Connections["hrcon"] = & $this->DBhrcon;

        // Create Components
        $this->Path_p_menu = new clsPathNewPage1Path_p_menu($this->RelativePath, $this);
        $this->Path_p_menu->Initialize();
        $this->Label1 = new clsControl(ccsLabel, "Label1", "Label1", ccsText, "", CCGetRequestParam("Label1", ccsGet, NULL), $this);
        if(!is_array($this->Label1->Value) && !strlen($this->Label1->Value) && $this->Label1->Value !== false)
            $this->Label1->SetText(CCGetSession("namamodullabel"));
        $this->BindEvents();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnInitializeView", $this);		
    }
//End Initialize Method

//Show Method @1-55D68D70
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        $block_path = $Tpl->block_path;
        if ($this->TemplateSource) {			
            $Tpl->LoadTemplateFromStr($this->TemplateSource, $this->ComponentName, $this->TemplateEncoding);
        } else {
            $Tpl->LoadTemplate("/admin/" . $this->TemplateFileName, $this->ComponentName, $this->TemplateEncoding, "remove");
        }						
        $Tpl->block_path = $Tpl->block_path . "/" . $this->ComponentName;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) {
            $Tpl->block_path = $block_path;
            $Tpl->SetVar($this->ComponentName, "");
            return "";
        }
		$this->Label1->SetText(CCGetSession("namamodullabel"));
        $this->Attributes->Show();
        $this->Path_p_menu->Show();		
		$this->Label1->Show();
        $Tpl->Parse();
        $Tpl->block_path = $block_path;		
        $TplData = $Tpl->GetVar($this->ComponentName);		
        $Tpl->SetVar($this->ComponentName, $TplData);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeOutput", $this);
    }
//End Show Method

} //End NewPage1 Class @1-FCB6E20C
?>
