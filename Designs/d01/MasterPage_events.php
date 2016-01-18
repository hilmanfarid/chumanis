<?php
// //Events @1-F81417CB

//MasterPage_lhMenu_BeforeShow @9-659C7462
function MasterPage_lhMenu_BeforeShow(& $sender)
{
    $MasterPage_lhMenu_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $lhMenu; //Compatibility
//End MasterPage_lhMenu_BeforeShow

//Custom Code @11-2A29BDB7
// -------------------------
    // Write your own code here.
    $Component->Text=CCGetSession("hmenu");
// -------------------------
//End Custom Code
//Begin by NTR
//$idmenulabel=CCGetFromGet("idmenulabel");
//print($idmenulabel);
//exit;
//End by NTR

//Close MasterPage_lhMenu_BeforeShow @9-09CFDF6B
    return $MasterPage_lhMenu_BeforeShow;
}
//End Close MasterPage_lhMenu_BeforeShow

//MasterPage_llMenu_BeforeShow @10-5DE0B3D1
function MasterPage_llMenu_BeforeShow(& $sender)
{
    $MasterPage_llMenu_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $llMenu; //Compatibility
//End MasterPage_llMenu_BeforeShow

//Custom Code @12-2A29BDB7
// -------------------------
    // Write your own code here.
    $Component->Text=CCGetSession("lmenu");
// -------------------------
//End Custom Code

//Close MasterPage_llMenu_BeforeShow @10-0267086D
    return $MasterPage_llMenu_BeforeShow;
}
//End Close MasterPage_llMenu_BeforeShow

//MasterPage_OnInitializeView @1-0B753D51
function MasterPage_OnInitializeView(& $sender)
{
    $MasterPage_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $MasterPage; //Compatibility
//End MasterPage_OnInitializeView

//Custom Code @8-2A29BDB7
// -------------------------
    // Write your own code here.
if (CCGetUserLogin()=="") // || $_SESSION["AppName"]!="TRB") 
{
    header("Location: login.php");
    exit;
}

    
// -------------------------
//End Custom Code

//Close MasterPage_OnInitializeView @1-CF24638A
    return $MasterPage_OnInitializeView;
}
//End Close MasterPage_OnInitializeView


?>
