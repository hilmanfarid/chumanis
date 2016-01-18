<?php
//BindEvents Method @1-B80AFA4D
function BindEvents()
{
    global $Panel1;
    $Panel1->CCSEvents["BeforeShow"] = "Panel1_BeforeShow";
}
//End BindEvents Method

//Panel1_BeforeShow @2-AAD8AF72
function Panel1_BeforeShow(& $sender)
{
    $Panel1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Panel1; //Compatibility
//End Panel1_BeforeShow

//Close Panel1_BeforeShow @2-D21EBA68
    return $Panel1_BeforeShow;
}
//End Close Panel1_BeforeShow


?>
