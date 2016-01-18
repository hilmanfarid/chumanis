<?php
//BindEvents Method @1-9A0BAD24
function BindEvents()
{
    global $p_role;
    $p_role->valid_from->CCSEvents["BeforeShow"] = "p_role_valid_from_BeforeShow";
    $p_role->valid_to->CCSEvents["BeforeShow"] = "p_role_valid_to_BeforeShow";
    $p_role->creation_date->CCSEvents["BeforeShow"] = "p_role_creation_date_BeforeShow";
    $p_role->updated_date->CCSEvents["BeforeShow"] = "p_role_updated_date_BeforeShow";
}
//End BindEvents Method

//p_role_valid_from_BeforeShow @21-1E408CFD
function p_role_valid_from_BeforeShow(& $sender)
{
    $p_role_valid_from_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_role; //Compatibility
//End p_role_valid_from_BeforeShow

//Close p_role_valid_from_BeforeShow @21-DDCCDA15
    return $p_role_valid_from_BeforeShow;
}
//End Close p_role_valid_from_BeforeShow

//p_role_valid_to_BeforeShow @23-C4EB353B
function p_role_valid_to_BeforeShow(& $sender)
{
    $p_role_valid_to_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_role; //Compatibility
//End p_role_valid_to_BeforeShow

//Close p_role_valid_to_BeforeShow @23-106B8A2E
    return $p_role_valid_to_BeforeShow;
}
//End Close p_role_valid_to_BeforeShow

//p_role_creation_date_BeforeShow @26-C5415F4E
function p_role_creation_date_BeforeShow(& $sender)
{
    $p_role_creation_date_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_role; //Compatibility
//End p_role_creation_date_BeforeShow

//Close p_role_creation_date_BeforeShow @26-41FC04EF
    return $p_role_creation_date_BeforeShow;
}
//End Close p_role_creation_date_BeforeShow

//p_role_updated_date_BeforeShow @29-BBD6EBA4
function p_role_updated_date_BeforeShow(& $sender)
{
    $p_role_updated_date_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_role; //Compatibility
//End p_role_updated_date_BeforeShow

//Close p_role_updated_date_BeforeShow @29-53B9CDEF
    return $p_role_updated_date_BeforeShow;
}
//End Close p_role_updated_date_BeforeShow


?>
