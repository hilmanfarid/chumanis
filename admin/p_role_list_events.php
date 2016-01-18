<?php
//BindEvents Method @1-937C7A9B
function BindEvents()
{
    global $p_role;
    $p_role->Navigator->CCSEvents["BeforeShow"] = "p_role_Navigator_BeforeShow";
}
//End BindEvents Method

//p_role_Navigator_BeforeShow @49-C90DFDC0
function p_role_Navigator_BeforeShow(& $sender)
{
    $p_role_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_role; //Compatibility
//End p_role_Navigator_BeforeShow

//Hide-Show Component @50-0DB41530
    $Parameter1 = $Container->DataSource->PageCount();
    $Parameter2 = 2;
    if (((is_array($Parameter1) || strlen($Parameter1)) && (is_array($Parameter2) || strlen($Parameter2))) && 0 >  CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Visible = false;
//End Hide-Show Component

//Close p_role_Navigator_BeforeShow @49-6BE28B6D
    return $p_role_Navigator_BeforeShow;
}
//End Close p_role_Navigator_BeforeShow


?>
