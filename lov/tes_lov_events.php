<?php
//BindEvents Method @1-31B9244D
function BindEvents()
{
    global $LovAjaxPanel;
    global $CCSEvents;
    $LovAjaxPanel->CCSEvents["BeforeShow"] = "LovAjaxPanel_BeforeShow";
    $CCSEvents["AfterInitialize"] = "Page_AfterInitialize";
    $CCSEvents["BeforeShow"] = "Page_BeforeShow";
    $CCSEvents["BeforeOutput"] = "Page_BeforeOutput";
    $CCSEvents["BeforeUnload"] = "Page_BeforeUnload";
}
//End BindEvents Method

//LovAjaxPanel_BeforeShow @12-46E48D11
function LovAjaxPanel_BeforeShow(& $sender)
{
    $LovAjaxPanel_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $LovAjaxPanel; //Compatibility
//End LovAjaxPanel_BeforeShow

//ContentLovContainerLovAjaxPanelJUpdatePanel2 Page BeforeShow @13-D1707364
    global $CCSFormFilter;
    if ($CCSFormFilter == "ContentLovContainerLovAjaxPanel") {
        $Component->BlockPrefix = "";
        $Component->BlockSuffix = "";
    } else {
        $Component->BlockPrefix = "<div id=\"ContentLovContainerLovAjaxPanel\">";
        $Component->BlockSuffix = "</div>";
    }
//End ContentLovContainerLovAjaxPanelJUpdatePanel2 Page BeforeShow

//Close LovAjaxPanel_BeforeShow @12-4C0A5B40
    return $LovAjaxPanel_BeforeShow;
}
//End Close LovAjaxPanel_BeforeShow

//Page_BeforeInitialize @1-8ACA084F
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $tes_lov; //Compatibility
//End Page_BeforeInitialize

//ContentLovContainerLovAjaxPanelJUpdatePanel2 PageBeforeInitialize @13-B8D3110F
    if (CCGetFromGet("FormFilter") == "ContentLovContainerLovAjaxPanel" && CCGetFromGet("IsParamsEncoded") != "true") {
        global $TemplateEncoding, $CCSIsParamsEncoded;
        CCConvertDataArrays("UTF-8", $TemplateEncoding);
        $CCSIsParamsEncoded = true;
    }
//End ContentLovContainerLovAjaxPanelJUpdatePanel2 PageBeforeInitialize

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize

//Page_AfterInitialize @1-9367A899
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $tes_lov; //Compatibility
//End Page_AfterInitialize

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize

//Page_BeforeShow @1-F0709BEA
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $tes_lov; //Compatibility
//End Page_BeforeShow

//ContentLovContainerLovAjaxPanelJUpdatePanel2 Page BeforeShow @13-D5BCCA6F
    global $CCSFormFilter;
    if (CCGetFromGet("FormFilter") == "ContentLovContainerLovAjaxPanel") {
        $CCSFormFilter = CCGetFromGet("FormFilter");
        unset($_GET["FormFilter"]);
        if (isset($_GET["IsParamsEncoded"])) unset($_GET["IsParamsEncoded"]);
    }
//End ContentLovContainerLovAjaxPanelJUpdatePanel2 Page BeforeShow

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeOutput @1-670B815D
function Page_BeforeOutput(& $sender)
{
    $Page_BeforeOutput = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $tes_lov; //Compatibility
//End Page_BeforeOutput

//ContentLovContainerLovAjaxPanelJUpdatePanel2 PageBeforeOutput @13-AA78699E
    global $CCSFormFilter, $Tpl, $main_block;
    if ($CCSFormFilter == "ContentLovContainerLovAjaxPanel") {
        $main_block = $_SERVER["REQUEST_URI"] . "|" . $Tpl->getvar("/Panel Content/Panel LovContainer/Panel LovAjaxPanel");
    }
//End ContentLovContainerLovAjaxPanelJUpdatePanel2 PageBeforeOutput

//Close Page_BeforeOutput @1-8964C188
    return $Page_BeforeOutput;
}
//End Close Page_BeforeOutput

//Page_BeforeUnload @1-7E63662F
function Page_BeforeUnload(& $sender)
{
    $Page_BeforeUnload = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $tes_lov; //Compatibility
//End Page_BeforeUnload

//ContentLovContainerLovAjaxPanelJUpdatePanel2 PageBeforeUnload @13-FBC3A417
    global $Redirect, $CCSFormFilter, $CCSIsParamsEncoded;
    if ($Redirect && $CCSFormFilter == "ContentLovContainerLovAjaxPanel") {
        if ($CCSIsParamsEncoded) $Redirect = CCAddParam($Redirect, "IsParamsEncoded", "true");
        $Redirect = CCAddParam($Redirect, "FormFilter", $CCSFormFilter);
    }
//End ContentLovContainerLovAjaxPanelJUpdatePanel2 PageBeforeUnload

//Close Page_BeforeUnload @1-CFAEC742
    return $Page_BeforeUnload;
}
//End Close Page_BeforeUnload


?>
