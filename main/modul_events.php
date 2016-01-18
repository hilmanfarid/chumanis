<?php
//BindEvents Method @1-430D04CB
function BindEvents()
{
    global $lModul;
    global $CCSEvents;
    $lModul->CCSEvents["BeforeShow"] = "lModul_BeforeShow";
    $CCSEvents["OnInitializeView"] = "Page_OnInitializeView";
}
//End BindEvents Method

//lModul_BeforeShow @9-E839CEB0
function lModul_BeforeShow(& $sender)
{
    $lModul_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $lModul; //Compatibility
//End lModul_BeforeShow

//Custom Code @10-2A29BDB7
// -------------------------
    // Write your own code here.
        global $namaMD;
        $lModul->Text=$namaMD;
// -------------------------
//End Custom Code

//Close lModul_BeforeShow @9-CD814F1F
    return $lModul_BeforeShow;
}
//End Close lModul_BeforeShow

//Page_OnInitializeView @1-2A21E8CE
function Page_OnInitializeView(& $sender)
{
    $Page_OnInitializeView = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $modul; //Compatibility
//End Page_OnInitializeView

//Custom Code @8-2A29BDB7
// -------------------------
    // Write your own code here.
        global $namaMD;
	$p_module_id = $_GET["p_module_id"];

        $DBhrcon_ = new clsDBhrcon();
        $queryMD  = "select code from p_module where p_module_id=". $p_module_id ;		
	$DBhrcon_->query($queryMD);
	if ($DBhrcon_->next_record()) {
	   $namaMD=$DBhrcon_->f("code");	
	    CCSetSession("namamodullabel",$DBhrcon_->f("code"));		   
        } else {
	   $namaMD="--";	
        }
	$DBhrcon_->close();

        $seslmenu="" .
        "<div class='blockheader'> " .
        "<h3 class='t'>" . $namaMD . "</h3> " .
        "</div>" .
        "<div class='blockcontent'>" .
        "<div id='cssmenu'>" .
        "<ul id='Accordion'>";
         
        $queryMN  = "select * from f_display_menu_tree(". $p_module_id . ")";

	$PLevel= array (0,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,-1,);
	$level = 0;
	$bdmnid = -1;
	$nplevel = 0;
	$parid = -1;

	$DBhrcon_->query($queryMN);
	$curdata="-";
	while ($DBhrcon_->next_record()) {
	   if ($parid!=-1) {	
	      if ($nplevel==$DBhrcon_->f("parent_id")) {
                $curdata="<li class='has-sub'><a href='". $file_name . "?idmenulabel=".$DBhrcon_->f("p_menu_id")."'><span>" . $mncode . "</span></a><ul>";
                $seslmenu=$seslmenu . $curdata;
		$level=$level+1;
		$PLevel[$level]=$nplevel;
	      } else {
                $curdata="<li><a href='". $file_name . "?idmenulabel=".$DBhrcon_->f("p_menu_id")."'><span>" . $mncode . "</span></a> </li> ";
                $seslmenu=$seslmenu . $curdata;
		while ($PLevel[$level]>$DBhrcon_->f("parent_id") && $level>0) {
		  $level=$level-1;
                  $seslmenu=$seslmenu . "</ul></li>";
		}
	      }
	   }
	  	
	  $bdmnid=$DBhrcon_->f("p_menu_id");
	  $nplevel=$DBhrcon_->f("p_menu_id");
          $parid=$DBhrcon_->f("parent_id");
	  $mncode=$DBhrcon_->f("code");
	  $file_name= $DBhrcon_->f("file_name");

        }
	   if ($parid!=-1) {	
                $curdata="<li><a href='". $file_name . "?idmenulabel=".$DBhrcon_->f("p_menu_id")."'><span>" . $mncode . "</span></a> </li> ";
                $seslmenu=$seslmenu . $curdata;
		while ($PLevel[$level]>$DBhrcon_->f("parent_id") && $level>0) {
		  $level=$level-1;
                  $seslmenu=$seslmenu . "</ul></li>";
		}
	   }


	$DBhrcon_->close();


	$seslmenu=$seslmenu . "</ul>" . "</div>" . "</div>" ;


        CCSetSession("lmenu", $seslmenu);


// -------------------------
//End Custom Code

//Close Page_OnInitializeView @1-81DF8332
    return $Page_OnInitializeView;
}
//End Close Page_OnInitializeView


?>
