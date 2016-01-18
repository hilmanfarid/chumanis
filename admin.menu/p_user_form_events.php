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

//ContentLovContainerLovAjaxPanelJUpdatePanel1 Page BeforeShow @85-D1707364
    global $CCSFormFilter;
    if ($CCSFormFilter == "ContentLovContainerLovAjaxPanel") {
        $Component->BlockPrefix = "";
        $Component->BlockSuffix = "";
    } else {
        $Component->BlockPrefix = "<div id=\"ContentLovContainerLovAjaxPanel\">";
        $Component->BlockSuffix = "</div>";
    }
//End ContentLovContainerLovAjaxPanelJUpdatePanel1 Page BeforeShow

//Close LovAjaxPanel_BeforeShow @12-4C0A5B40
    return $LovAjaxPanel_BeforeShow;
}
//End Close LovAjaxPanel_BeforeShow

//Page_BeforeInitialize @1-F6BC87DE
function Page_BeforeInitialize(& $sender)
{
    $Page_BeforeInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_user_form; //Compatibility
//End Page_BeforeInitialize

//ContentLovContainerLovAjaxPanelJUpdatePanel1 PageBeforeInitialize @85-B8D3110F
    if (CCGetFromGet("FormFilter") == "ContentLovContainerLovAjaxPanel" && CCGetFromGet("IsParamsEncoded") != "true") {
        global $TemplateEncoding, $CCSIsParamsEncoded;
        CCConvertDataArrays("UTF-8", $TemplateEncoding);
        $CCSIsParamsEncoded = true;
    }
//End ContentLovContainerLovAjaxPanelJUpdatePanel1 PageBeforeInitialize

//Close Page_BeforeInitialize @1-23E6A029
    return $Page_BeforeInitialize;
}
//End Close Page_BeforeInitialize

//Page_AfterInitialize @1-5339569F
function Page_AfterInitialize(& $sender)
{
    $Page_AfterInitialize = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_user_form; //Compatibility
//End Page_AfterInitialize

//Close Page_AfterInitialize @1-379D319D
    return $Page_AfterInitialize;
}
//End Close Page_AfterInitialize

//Page_BeforeShow @1-DDA6B650
function Page_BeforeShow(& $sender)
{
    $Page_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_user_form; //Compatibility
//End Page_BeforeShow

//ContentLovContainerLovAjaxPanelJUpdatePanel1 Page BeforeShow @85-D5BCCA6F
    global $CCSFormFilter;
    if (CCGetFromGet("FormFilter") == "ContentLovContainerLovAjaxPanel") {
        $CCSFormFilter = CCGetFromGet("FormFilter");
        unset($_GET["FormFilter"]);
        if (isset($_GET["IsParamsEncoded"])) unset($_GET["IsParamsEncoded"]);
    }
//End ContentLovContainerLovAjaxPanelJUpdatePanel1 Page BeforeShow

//Close Page_BeforeShow @1-4BC230CD
    return $Page_BeforeShow;
}
//End Close Page_BeforeShow

//Page_BeforeOutput @1-EE12400F
function Page_BeforeOutput(& $sender)
{
    $Page_BeforeOutput = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_user_form; //Compatibility
//End Page_BeforeOutput

//ContentLovContainerLovAjaxPanelJUpdatePanel1 PageBeforeOutput @85-AA78699E
    global $CCSFormFilter, $Tpl, $main_block;
    if ($CCSFormFilter == "ContentLovContainerLovAjaxPanel") {
        $main_block = $_SERVER["REQUEST_URI"] . "|" . $Tpl->getvar("/Panel Content/Panel LovContainer/Panel LovAjaxPanel");
    }
//End ContentLovContainerLovAjaxPanelJUpdatePanel1 PageBeforeOutput

//Close Page_BeforeOutput @1-8964C188
    return $Page_BeforeOutput;
}
//End Close Page_BeforeOutput

//Page_BeforeUnload @1-4AC6A752
function Page_BeforeUnload(& $sender)
{
    $Page_BeforeUnload = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_user_form; //Compatibility
//End Page_BeforeUnload

//ContentLovContainerLovAjaxPanelJUpdatePanel1 PageBeforeUnload @85-FBC3A417
    global $Redirect, $CCSFormFilter, $CCSIsParamsEncoded;
    if ($Redirect && $CCSFormFilter == "ContentLovContainerLovAjaxPanel") {
        if ($CCSIsParamsEncoded) $Redirect = CCAddParam($Redirect, "IsParamsEncoded", "true");
        $Redirect = CCAddParam($Redirect, "FormFilter", $CCSFormFilter);
    }
//End ContentLovContainerLovAjaxPanelJUpdatePanel1 PageBeforeUnload

//Close Page_BeforeUnload @1-CFAEC742
    return $Page_BeforeUnload;
}
//End Close Page_BeforeUnload


?>
