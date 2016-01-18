<?php
//BindEvents Method @1-0AB4DE4C
function BindEvents()
{
    global $p_role;
    $p_role->creation_date->CCSEvents["BeforeShow"] = "p_role_creation_date_BeforeShow";
    $p_role->updated_date->CCSEvents["BeforeShow"] = "p_role_updated_date_BeforeShow";
}
//End BindEvents Method

//p_role_creation_date_BeforeShow @15-C5415F4E
function p_role_creation_date_BeforeShow(& $sender)
{
    $p_role_creation_date_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_role; //Compatibility
//End p_role_creation_date_BeforeShow

//Close p_role_creation_date_BeforeShow @15-41FC04EF
    return $p_role_creation_date_BeforeShow;
}
//End Close p_role_creation_date_BeforeShow

//p_role_updated_date_BeforeShow @18-BBD6EBA4
function p_role_updated_date_BeforeShow(& $sender)
{
    $p_role_updated_date_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_role; //Compatibility
//End p_role_updated_date_BeforeShow

//Close p_role_updated_date_BeforeShow @18-53B9CDEF
    return $p_role_updated_date_BeforeShow;
}
//End Close p_role_updated_date_BeforeShow


?>
