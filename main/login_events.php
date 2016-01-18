<?php
//BindEvents Method @1-096E3C73
function BindEvents()
{
    global $Login;
    $Login->Button_DoLogin->CCSEvents["OnClick"] = "Login_Button_DoLogin_OnClick";
}
//End BindEvents Method

//Login_Button_DoLogin_OnClick @3-1454CF55
function Login_Button_DoLogin_OnClick(& $sender)
{
    $Login_Button_DoLogin_OnClick = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Login; //Compatibility
//End Login_Button_DoLogin_OnClick

//Login @4-DE10C29C
    global $CCSLocales;
    global $Redirect;
    CCLogoutUser();
    $db = new clsDBhrcon();
    
    $SQL = "select * from f_userlogin(null,".$db->ToSQL($Container->username->Value, ccsText).",".$db->ToSQL($Container->password->Value, ccsText).",'localhost')";// . " AND user_pwd=" . $db->ToSQL($password, ccsText);
    $db->query($SQL);
    $Result = $db->next_record();
    if ($Result) {
        CCSetSession("UserID", $db->f("p_user_id"));
        CCSetSession("UserName", $Container->username->Value);
        CCSetSession("GroupID", $db->f("p_user_id"));
        CCSetSession("UserAddr", $_SERVER["REMOTE_ADDR"]);
        CCSetSession("UserStatus", $db->f("o_is_new_user"));
    }
    //o_result_int integer,
    //o_result_msg character varying,
    //o_is_new_user character varying,
    //o_is_change_pwd character varying,
    //o_last_login_text character varying,
    //o_user_id integer)
	
    if ($db->f('o_result_int') != 1) {
        //$Container->Errors->addError($CCSLocales->GetText("CCS_LoginError"));
        $Container->Errors->addError(($db->f('o_result_msg')));
        $Container->password->SetValue("");
        $Login_Button_DoLogin_OnClick = 0;
    } else {
        global $Redirect;
		
		//Add CAS
		if($db->f('o_is_new_user')=="Y"){
			$seslmenu="" .
			"<div class='blockheader'><h3 class='t'>Profile</h3></div>".
			"<div class='blockcontent'>" .
			"<div style='position:relative; width:100%; height:100%'>" .
			"<img border='0' height='100' src='../images/users/" . CCGetUserLogin() . ".jpg' style='display: block; margin: 0 auto;'>" .
			"<p style='text-align:center'><strong>" . CCGetUserLogin() . "</strong></p></div>" .
			"<div id='cssmenu'>" .
			"<ul>" .
			"<li><a href='../main/home.php'><span>Task Box</span></a></li>" .
			"<li><a href='#'><span>User profile</span></a></li>" .
			"<li><a href='../admin.menu/p_user_pass_change.php'><span>Change Password</span></a></li>" .
			"</ul>" .
			"</div>".
			"</div>";
        
			CCSetSession("lmenu", $seslmenu);
			$Redirect = "../admin.menu/p_user_pass_change.php";			
		}else{
			if($db->f('o_is_change_pwd')=="Y"){
				$seslmenu="" .
				"<div class='blockheader'><h3 class='t'>Profile</h3></div>".
				"<div class='blockcontent'>" .
				"<div style='position:relative; width:100%; height:100%'>" .
				"<img border='0' height='100' src='../images/users/" . CCGetUserLogin() . ".jpg' style='display: block; margin: 0 auto;'>" .
				"<p style='text-align:center'><strong>" . CCGetUserLogin() . "</strong></p></div>" .
				"<div id='cssmenu'>" .
				"<ul>" .
				"<li><a href='../main/home.php'><span>Task Box</span></a></li>" .
				"<li><a href='#'><span>User profile</span></a></li>" .
				"<li><a href='../admin.menu/p_user_pass_change.php'><span>Change Password</span></a></li>" .
				"</ul>" .
				"</div>".
				"</div>";
			
				CCSetSession("lmenu", $seslmenu);
				$Redirect = "../admin.menu/p_user_pass_change.php";			
			}				
		}
		//End Add CAS
		
        $uid = $db->f('o_user_id');
        $seshmenu="";
        $DBhrcon_ = new clsDBhrcon();
        //$queryMD  = "select p_module_id, code, description from p_module " .
        //            "where is_active='Y' order by listing_no";
		$lsuser = CCGetUserLogin();		
        $queryMD  = "select * from f_display_app('".$lsuser."')";					
		$DBhrcon_->query($queryMD);
	while ($DBhrcon_->next_record()) {
	   $param = CCAddParam("","p_module_id", $DBhrcon_->f("p_module_id"));
	   $seshmenu=$seshmenu .
            "<li><a href='../main/modul.php?".$param . "'" .
            "title='". $DBhrcon_->f("code") . " - " . $DBhrcon_->f("description") . "' target=''>" .
            "<img border='0' src='../images/menu/" . $DBhrcon_->f("p_module_id") . ".gif'></a> </li>";
	}
	include_once('user_attribute.php');
	setUserAttrib($uid);
	$DBhrcon_->close();
        
        CCSetSession("hmenu", $seshmenu);
        $Redirect = CCGetParam("ret_link", $Redirect);
        $Login_Button_DoLogin_OnClick = 1;
        
    }
//End Login

//Close Login_Button_DoLogin_OnClick @3-0EB5DCFE
    return $Login_Button_DoLogin_OnClick;
}
//End Close Login_Button_DoLogin_OnClick


?>
