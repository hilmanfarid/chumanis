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
    if ( !CCLoginUser( $Container->username->Value, $Container->password->Value)) {
        $Container->Errors->addError($CCSLocales->GetText("CCS_LoginError"));
        $Container->password->SetValue("");
        $Login_Button_DoLogin_OnClick = 0;
    } else {
        global $Redirect;
        $seshmenu="";
        $glip=array("glyphicon-cog","glyphicon-cog","glyphicon-list","glyphicon-folder-close", "glyphicon-usd",
                    "glyphicon-gift", "glyphicon-time", "glyphicon-user", "glyphicon-log-in","glyphicon-align-justify" );
        
        $DBhrcon_ = new clsDBhrcon();
        $queryMD  = "select p_module_id, code, description from p_module " .
                    "where is_active='Y' order by listing_no";
	$DBhrcon_->query($queryMD);
	while ($DBhrcon_->next_record()) {
	   $seshmenu=$seshmenu .
            "<li><a href='../main/modul.php?p_module_id=" . $DBhrcon_->f("p_module_id") . "'" .
            "title='". $DBhrcon_->f("code") . "&#13;" . $DBhrcon_->f("description") . "' target=''>" .
            "<i class='glyphicon ". $glip [$DBhrcon_->f("p_module_id")]. "' style='font-size: 32px; border:2px solid #ffffff; padding:3px'></i>";
        }
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
