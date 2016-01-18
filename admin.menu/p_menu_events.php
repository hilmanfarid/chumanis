<?php
//BindEvents Method @1-0FCBD85A
function BindEvents()
{
    global $menuGrid;
    global $UpdatePanel;
    global $Menu1;
    global $CCSEvents;
    $menuGrid->Navigator->CCSEvents["BeforeShow"] = "menuGrid_Navigator_BeforeShow";
    $menuGrid->CCSEvents["BeforeShowRow"] = "menuGrid_BeforeShowRow";
    $UpdatePanel->CCSEvents["BeforeShow"] = "UpdatePanel_BeforeShow";
    $Menu1->CCSEvents["BeforeShowRow"] = "Menu1_BeforeShowRow";
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["BeforeOutput"] = "Page_BeforeOutput";
    $CCSEvents["BeforeUnload"] = "Page_BeforeUnload";
}
//End BindEvents Method

//menuGrid_Navigator_BeforeShow @12-389D9FBE
function menuGrid_Navigator_BeforeShow(& $sender)
{
    $menuGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $menuGrid; //Compatibility
//End menuGrid_Navigator_BeforeShow

//Custom Code @13-2A29BDB7
// -------------------------
    // Write your own code here.
    $Component->Visible=true;
// -------------------------
//End Custom Code

//Close menuGrid_Navigator_BeforeShow @12-BA23D2B5
    return $menuGrid_Navigator_BeforeShow;
}
//End Close menuGrid_Navigator_BeforeShow

//menuGrid_BeforeShowRow @9-5C705A14
function menuGrid_BeforeShowRow(& $sender)
{
    $menuGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $menuGrid; //Compatibility
//End menuGrid_BeforeShowRow

//Set Row Style @21-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close menuGrid_BeforeShowRow @9-FA1D5DE9
    return $menuGrid_BeforeShowRow;
}
//End Close menuGrid_BeforeShowRow

//UpdatePanel_BeforeShow @7-D5D07553
function UpdatePanel_BeforeShow(& $sender)
{
    $UpdatePanel_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $UpdatePanel; //Compatibility
//End UpdatePanel_BeforeShow

//ContentUpdatePanelUpdatePanel1 Page BeforeShow @8-AE53816E
    global $CCSFormFilter;
    if ($CCSFormFilter == "ContentUpdatePanel") {
        $Component->BlockPrefix = "";
        $Component->BlockSuffix = "";
    } else {
        $Component->BlockPrefix = "<div id=\"ContentUpdatePanel\">";
        $Component->BlockSuffix = "</div>";
    }
//End ContentUpdatePanelUpdatePanel1 Page BeforeShow

//Close UpdatePanel_BeforeShow @7-F0912960
    return $UpdatePanel_BeforeShow;
}
//End Close UpdatePanel_BeforeShow

//Menu1_BeforeShowRow @2-337CFB14
function Menu1_BeforeShowRow(& $sender)
{
    $Menu1_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Menu1; //Compatibility
//End Menu1_BeforeShowRow

//Custom Code @26-2A29BDB7
// -------------------------
    // Write your own code here.
    global $FileName;
    $queryString = CCGetQueryString("QueryString", array("p_menu_id"));
    $linkEnc= CCAddParam($queryString, "parent_id", $Component->DataSource->f("p_menu_id"));
    $Component->ItemLink->Page=$FileName;
    $Component->ItemLink->Parameters = $linkEnc;
    /*$_GET['parent_id']=$Component->DataSource->f("parent_id");
    ->ItemLink->Parameters
    echo 'nu mana heula';*/
// -------------------------
//End Custom Code

//Close Menu1_BeforeShowRow @2-689F1929
    return $Menu1_BeforeShowRow;
}
//End Close Menu1_BeforeShowRow

//Page_BeforeInitialize @1-BE069BE7
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_menu; //Compatibility
//End Page_BeforeInitialize

//ContentUpdatePanelUpdatePanel1 PageBeforeInitialize @8-46D3A8CC
    if (CCGetFromGet("FormFilter") == "ContentUpdatePanel" && CCGetFromGet("IsParamsEncoded") != "true") {
        global $TemplateEncoding, $CCSIsParamsEncoded;
        CCConvertDataArrays("UTF-8", $TemplateEncoding);
        $CCSIsParamsEncoded = true;
    }
//End ContentUpdatePanelUpdatePanel1 PageBeforeInitialize

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize

//Page_AfterInitialize @1-7F903C71
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_menu; //Compatibility
//End Page_AfterInitialize

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize

//Page_BeforeShow @1-6ECF966C
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_menu; //Compatibility
//End Page_BeforeShow

//ContentUpdatePanelUpdatePanel1 Page BeforeShow @8-C63B42C6
    global $CCSFormFilter;
    if (CCGetFromGet("FormFilter") == "ContentUpdatePanel") {
        $CCSFormFilter = CCGetFromGet("FormFilter");
        unset($_GET["FormFilter"]);
        if (isset($_GET["IsParamsEncoded"])) unset($_GET["IsParamsEncoded"]);
    }
//End ContentUpdatePanelUpdatePanel1 Page BeforeShow

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeOutput @1-C70CA967
function Page_BeforeOutput(& $sender)
{
    $Page_BeforeOutput = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_menu; //Compatibility
//End Page_BeforeOutput

//ContentUpdatePanelUpdatePanel1 PageBeforeOutput @8-33506E66
    global $CCSFormFilter, $Tpl, $main_block;
    if ($CCSFormFilter == "ContentUpdatePanel") {
        $main_block = $_SERVER["REQUEST_URI"] . "|" . $Tpl->getvar("/Panel Content/Panel UpdatePanel");
    }
//End ContentUpdatePanelUpdatePanel1 PageBeforeOutput

//Close Page_BeforeOutput @1-8964C188
    return $Page_BeforeOutput;
}
//End Close Page_BeforeOutput

//Page_BeforeUnload @1-C3DDAAF1
function Page_BeforeUnload(& $sender)
{
    $Page_BeforeUnload = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_menu; //Compatibility
//End Page_BeforeUnload

//ContentUpdatePanelUpdatePanel1 PageBeforeUnload @8-41310067
    global $Redirect, $CCSFormFilter, $CCSIsParamsEncoded;
    if ($Redirect && $CCSFormFilter == "ContentUpdatePanel") {
        if ($CCSIsParamsEncoded) $Redirect = CCAddParam($Redirect, "IsParamsEncoded", "true");
        $Redirect = CCAddParam($Redirect, "FormFilter", $CCSFormFilter);
    }
//End ContentUpdatePanelUpdatePanel1 PageBeforeUnload

//Close Page_BeforeUnload @1-CFAEC742
    return $Page_BeforeUnload;
}
//End Close Page_BeforeUnload


?>
