<?php
//BindEvents Method @1-B0FF2A17
function BindEvents()
{
    global $roleForm;
    $roleForm->Button_Insert->CCSEvents["OnClick"] = "roleForm_Button_Insert_OnClick";
    $roleForm->Button_Update->CCSEvents["OnClick"] = "roleForm_Button_Update_OnClick";
    $roleForm->user_name->CCSEvents["BeforeShow"] = "roleForm_user_name_BeforeShow";
}
//End BindEvents Method

//roleForm_Button_Insert_OnClick @5-B9570B8F
function roleForm_Button_Insert_OnClick(& $sender)
{
    $roleForm_Button_Insert_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $roleForm; //Compatibility
//End roleForm_Button_Insert_OnClick

//Custom Code @73-2A29BDB7
// -------------------------
    global $CCSLocales;
    global $Redirect;
    //CCLogoutUser();
    $db = new clsDBhrcon();
    
    $SQL = "select * from f_changeuserpwd(".$db->ToSQL($Container->user_name->Value, ccsText).","
    		.$db->ToSQL(CCGetSession("is_new_user"), ccsText).","
    		.$db->ToSQL($Container->old_password->Value, ccsText).","
    		.$db->ToSQL($Container->new_password->Value, ccsText).","
    		.$db->ToSQL($Container->new_password2->Value, ccsText).")";
    		
    $db->query($SQL);
    $Result = $db->next_record();
    if (!$Result) {
        return;
    }
	
	//
	
    if ($db->f('o_result_int') != 1) {
		//print_r("test");exit;
        $Container->Errors->addError($db->f('o_result_msg'));
		$db->close();
    } else {
		CCLogoutUser();
		$db->close();
        print_r("<script language='JavaScript'>alert('Sukses');top.location.href='../';</script>");	
    }
	
	//header('location:'.ServerURL . "main/login.php");
	//exit;
    
     
// -------------------------
//End Custom Code

//Close roleForm_Button_Insert_OnClick @5-CEA01FFE
    return; //$roleForm_Button_Insert_OnClick;
}
//End Close roleForm_Button_Insert_OnClick

//roleForm_Button_Update_OnClick @6-391F3EC3
function roleForm_Button_Update_OnClick(& $sender)
{
    $roleForm_Button_Update_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $roleForm; //Compatibility
//End roleForm_Button_Update_OnClick

//Custom Code @91-2A29BDB7
// -------------------------
    global $CCSLocales;
    global $Redirect;
    CCLogoutUser();
    $db = new clsDBhrcon();
    
    $SQL = "select * from f_changeuserpwd(".$db->ToSQL($Container->user_name->Value, ccsText).","
    		.$db->ToSQL($Container->CCGetSession("is_new_user")->Value, ccsText).","
    		.$db->ToSQL($Container->old_password->Value, ccsText).","
    		.$db->ToSQL($Container->new_password->Value, ccsText).","
    		.$db->ToSQL($Container->new_password2->Value, ccsText).","
    		."".","
    		."".")";
    		
    $db->query($SQL);
    $Result = $db->next_record();
    if (!$Result) {
        return;
    }
	
    if ($db->f('o_result_int') != 1) {
        $Container->Errors->addError($db->f('o_result_msg'));
        $roleForm_Button_Update_OnClick = false;
    } else {
        global $Redirect;
        print_r("<script language='JavaScript'>alert('Sukses');</script>");
    }
	$DBhrcon_->close();
    $Redirect = CCGetParam("ret_link", $Redirect);
    $roleForm_Button_Update_OnClick = true;
    
// -------------------------
//End Custom Code

//Close roleForm_Button_Update_OnClick @6-65373743
    return $roleForm_Button_Update_OnClick;
}
//End Close roleForm_Button_Update_OnClick

//roleForm_user_name_BeforeShow @65-E92AFD46
function roleForm_user_name_BeforeShow(& $sender)
{
    $roleForm_user_name_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $roleForm; //Compatibility
//End roleForm_user_name_BeforeShow

//Custom Code @92-2A29BDB7
// -------------------------
    //$this->user_name->Value = CCSetSession("UserName");
// -------------------------
//End Custom Code

//Close roleForm_user_name_BeforeShow @65-B58D8592
    return $roleForm_user_name_BeforeShow;
}
//End Close roleForm_user_name_BeforeShow


?>
