<?php

class clsGridlov_p_roleroleGrid { //roleGrid class @2-48E02EBB

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

//Class_Initialize Event @2-3E7A4645
    function clsGridlov_p_roleroleGrid($RelativePath, & $Parent)
    {
        global $FileName;
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = "roleGrid";
        $this->Visible = True;
        $this->Parent = & $Parent;
        $this->RelativePath = $RelativePath;
        $this->Errors = new clsErrors();
        $this->ErrorBlock = "Grid roleGrid";
        $this->Attributes = new clsAttributes($this->ComponentName . ":");
        $this->DataSource = new clslov_p_roleroleGridDataSource($this);
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

        $this->code = new clsControl(ccsLabel, "code", "code", ccsText, "", CCGetRequestParam("code", ccsGet, NULL), $this);
        $this->is_active = new clsControl(ccsLabel, "is_active", "is_active", ccsText, "", CCGetRequestParam("is_active", ccsGet, NULL), $this);
        $this->description = new clsControl(ccsLabel, "description", "description", ccsText, "", CCGetRequestParam("description", ccsGet, NULL), $this);
        $this->creation_date = new clsControl(ccsLabel, "creation_date", "creation_date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("creation_date", ccsGet, NULL), $this);
        $this->created_by = new clsControl(ccsLabel, "created_by", "created_by", ccsText, "", CCGetRequestParam("created_by", ccsGet, NULL), $this);
        $this->updated_date = new clsControl(ccsLabel, "updated_date", "updated_date", ccsDate, array("dd", "-", "mmm", "-", "yyyy"), CCGetRequestParam("updated_date", ccsGet, NULL), $this);
        $this->updated_by = new clsControl(ccsLabel, "updated_by", "updated_by", ccsText, "", CCGetRequestParam("updated_by", ccsGet, NULL), $this);
        $this->editlink = new clsControl(ccsImageLink, "editlink", "editlink", ccsText, "", CCGetRequestParam("editlink", ccsGet, NULL), $this);
        $this->editlink->Page = $this->RelativePath . "role_form.php";
        $this->p_role_id = new clsControl(ccsLabel, "p_role_id", "p_role_id", ccsText, "", CCGetRequestParam("p_role_id", ccsGet, NULL), $this);
        $this->Navigator = new clsNavigator($this->ComponentName, "Navigator", $FileName, 10, tpMoving, $this);
        $this->Navigator->PageSizes = array("1", "5", "10", "25", "50");
        $this->addlink = new clsControl(ccsImageLink, "addlink", "addlink", ccsText, "", CCGetRequestParam("addlink", ccsGet, NULL), $this);
        $this->addlink->Parameters = CCGetQueryString("QueryString", array("p_role_id", "ccsForm"));
        $this->addlink->Page = $this->RelativePath . "role_form.php";
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

//Show Method @2-E4FE778B
    function Show()
    {
        $Tpl = CCGetTemplate($this);
        global $CCSLocales;
        if(!$this->Visible) return;

        $this->RowNumber = 0;


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
            $this->ControlsVisible["code"] = $this->code->Visible;
            $this->ControlsVisible["is_active"] = $this->is_active->Visible;
            $this->ControlsVisible["description"] = $this->description->Visible;
            $this->ControlsVisible["creation_date"] = $this->creation_date->Visible;
            $this->ControlsVisible["created_by"] = $this->created_by->Visible;
            $this->ControlsVisible["updated_date"] = $this->updated_date->Visible;
            $this->ControlsVisible["updated_by"] = $this->updated_by->Visible;
            $this->ControlsVisible["editlink"] = $this->editlink->Visible;
            $this->ControlsVisible["p_role_id"] = $this->p_role_id->Visible;
            while ($this->ForceIteration || (($this->RowNumber < $this->PageSize) &&  ($this->HasRecord = $this->DataSource->has_next_record()))) {
                $this->RowNumber++;
                if ($this->HasRecord) {
                    $this->DataSource->next_record();
                    $this->DataSource->SetValues();
                }
                $Tpl->block_path = $ParentPath . "/" . $GridBlock . "/Row";
                $this->code->SetValue($this->DataSource->code->GetValue());
                $this->is_active->SetValue($this->DataSource->is_active->GetValue());
                $this->description->SetValue($this->DataSource->description->GetValue());
                $this->creation_date->SetValue($this->DataSource->creation_date->GetValue());
                $this->created_by->SetValue($this->DataSource->created_by->GetValue());
                $this->updated_date->SetValue($this->DataSource->updated_date->GetValue());
                $this->updated_by->SetValue($this->DataSource->updated_by->GetValue());
                $this->editlink->Parameters = CCGetQueryString("QueryString", array("ccsForm"));
                $this->editlink->Parameters = CCAddParam($this->editlink->Parameters, "p_role_id", $this->DataSource->f("p_role_id"));
                $this->p_role_id->SetValue($this->DataSource->p_role_id->GetValue());
                $this->Attributes->SetValue("rowNumber", $this->RowNumber);
                $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShowRow", $this);
                $this->Attributes->Show();
                $this->code->Show();
                $this->is_active->Show();
                $this->description->Show();
                $this->creation_date->Show();
                $this->created_by->Show();
                $this->updated_date->Show();
                $this->updated_by->Show();
                $this->editlink->Show();
                $this->p_role_id->Show();
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
        $Tpl->parse();
        $Tpl->block_path = $ParentPath;
        $this->DataSource->close();
    }
//End Show Method

//GetErrors Method @2-45C95090
    function GetErrors()
    {
        $errors = "";
        $errors = ComposeStrings($errors, $this->code->Errors->ToString());
        $errors = ComposeStrings($errors, $this->is_active->Errors->ToString());
        $errors = ComposeStrings($errors, $this->description->Errors->ToString());
        $errors = ComposeStrings($errors, $this->creation_date->Errors->ToString());
        $errors = ComposeStrings($errors, $this->created_by->Errors->ToString());
        $errors = ComposeStrings($errors, $this->updated_date->Errors->ToString());
        $errors = ComposeStrings($errors, $this->updated_by->Errors->ToString());
        $errors = ComposeStrings($errors, $this->editlink->Errors->ToString());
        $errors = ComposeStrings($errors, $this->p_role_id->Errors->ToString());
        $errors = ComposeStrings($errors, $this->Errors->ToString());
        $errors = ComposeStrings($errors, $this->DataSource->Errors->ToString());
        return $errors;
    }
//End GetErrors Method

} //End roleGrid Class @2-FCB6E20C

class clslov_p_roleroleGridDataSource extends clsDBhrcon {  //roleGridDataSource Class @2-CE7B2089

//DataSource Variables @2-4DF43632
    public $Parent = "";
    public $CCSEvents = "";
    public $CCSEventResult;
    public $ErrorBlock;
    public $CmdExecution;

    public $CountSQL;
    public $wp;


    // Datasource fields
    public $code;
    public $is_active;
    public $description;
    public $creation_date;
    public $created_by;
    public $updated_date;
    public $updated_by;
    public $p_role_id;
//End DataSource Variables

//DataSourceClass_Initialize Event @2-B766371C
    function clslov_p_roleroleGridDataSource(& $Parent)
    {
        $this->Parent = & $Parent;
        $this->ErrorBlock = "Grid roleGrid";
        $this->Initialize();
        $this->code = new clsField("code", ccsText, "");
        
        $this->is_active = new clsField("is_active", ccsText, "");
        
        $this->description = new clsField("description", ccsText, "");
        
        $this->creation_date = new clsField("creation_date", ccsDate, $this->DateFormat);
        
        $this->created_by = new clsField("created_by", ccsText, "");
        
        $this->updated_date = new clsField("updated_date", ccsDate, $this->DateFormat);
        
        $this->updated_by = new clsField("updated_by", ccsText, "");
        
        $this->p_role_id = new clsField("p_role_id", ccsText, "");
        

    }
//End DataSourceClass_Initialize Event

//SetOrder Method @2-2A484797
    function SetOrder($SorterName, $SorterDirection)
    {
        $this->Order = "p_role_id";
        $this->Order = CCGetOrder($this->Order, $SorterName, $SorterDirection, 
            "");
    }
//End SetOrder Method

//Prepare Method @2-14D6CD9D
    function Prepare()
    {
        global $CCSLocales;
        global $DefaultDateFormat;
    }
//End Prepare Method

//Open Method @2-4C34462F
    function Open()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeBuildSelect", $this->Parent);
        $this->CountSQL = "SELECT COUNT(*)\n\n" .
        "FROM p_role";
        $this->SQL = "SELECT * \n\n" .
        "FROM p_role {SQL_Where} {SQL_OrderBy}";
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeExecuteSelect", $this->Parent);
        if ($this->CountSQL) 
            $this->RecordsCount = CCGetDBValue(CCBuildSQL($this->CountSQL, $this->Where, ""), $this);
        else
            $this->RecordsCount = "CCS not counted";
        $this->query($this->OptimizeSQL(CCBuildSQL($this->SQL, $this->Where, $this->Order)));
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "AfterExecuteSelect", $this->Parent);
    }
//End Open Method

//SetValues Method @2-ADB5F1EB
    function SetValues()
    {
        $this->code->SetDBValue($this->f("code"));
        $this->is_active->SetDBValue($this->f("is_active"));
        $this->description->SetDBValue($this->f("description"));
        $this->creation_date->SetDBValue(trim($this->f("creation_date")));
        $this->created_by->SetDBValue($this->f("created_by"));
        $this->updated_date->SetDBValue(trim($this->f("updated_date")));
        $this->updated_by->SetDBValue($this->f("updated_by"));
        $this->p_role_id->SetDBValue($this->f("p_role_id"));
    }
//End SetValues Method

} //End roleGridDataSource Class @2-FCB6E20C

class clslov_p_role { //lov_p_role class @1-D1E7EE56

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

//Class_Initialize Event @1-69C62F0C
    function clslov_p_role($RelativePath, $ComponentName, & $Parent)
    {
        global $CCSLocales;
        global $DefaultDateFormat;
        $this->ComponentName = $ComponentName;
        $this->RelativePath = $RelativePath;
        $this->Visible = true;
        $this->Parent = & $Parent;
        $this->FileName = "lov_p_role.php";
        $this->Redirect = "";
        $this->TemplateFileName = "lov_p_role.html";
        $this->BlockToParse = "main";
        $this->TemplateEncoding = "CP1252";
        $this->ContentType = "text/html";
    }
//End Class_Initialize Event

//Class_Terminate Event @1-36E54535
    function Class_Terminate()
    {
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeUnload", $this);
        unset($this->roleGrid);
    }
//End Class_Terminate Event

//BindEvents Method @1-C17D7147
    function BindEvents()
    {
        $this->roleGrid->Navigator->CCSEvents["BeforeShow"] = "lov_p_role_roleGrid_Navigator_BeforeShow";
        $this->roleGrid->CCSEvents["BeforeShowRow"] = "lov_p_role_roleGrid_BeforeShowRow";
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

//Initialize Method @1-97BEEDF7
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
        $this->roleGrid = new clsGridlov_p_roleroleGrid($this->RelativePath, $this);
        $this->roleGrid->Initialize();
        $this->BindEvents();
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "OnInitializeView", $this);
    }
//End Initialize Method

//Show Method @1-A9FED0C7
    function Show()
    {
        global $Tpl;
        global $CCSLocales;
        $block_path = $Tpl->block_path;
        if ($this->TemplateSource) {
            $Tpl->LoadTemplateFromStr($this->TemplateSource, $this->ComponentName, $this->TemplateEncoding);
        } else {
            $Tpl->LoadTemplate("/lov/" . $this->TemplateFileName, $this->ComponentName, $this->TemplateEncoding, "remove");
        }
        $Tpl->block_path = $Tpl->block_path . "/" . $this->ComponentName;
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeShow", $this);
        if(!$this->Visible) {
            $Tpl->block_path = $block_path;
            $Tpl->SetVar($this->ComponentName, "");
            return "";
        }
        $this->Attributes->Show();
        $this->roleGrid->Show();
        $Tpl->Parse();
        $Tpl->block_path = $block_path;
        $TplData = $Tpl->GetVar($this->ComponentName);
        $Tpl->SetVar($this->ComponentName, $TplData);
        $this->CCSEventResult = CCGetEvent($this->CCSEvents, "BeforeOutput", $this);
    }
//End Show Method

} //End lov_p_role Class @1-FCB6E20C

//Include Event File @1-1D6846EB
include_once(RelativePath . "/lov/lov_p_role_events.php");
//End Include Event File
?>
