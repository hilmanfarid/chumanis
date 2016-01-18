<?php
//Include Common Files @1-510FF8AC
define("RelativePath", "..");
define("PathToCurrentPage", "/main/");
define("FileName", "home.php");
include_once(RelativePath . "/Common.php");
include_once(RelativePath . "/Template.php");
include_once(RelativePath . "/Sorter.php");
include_once(RelativePath . "/Navigator.php");
//End Include Common Files

//Master Page implementation @1-357D2559
include_once(RelativePath . "/main/../Designs/d01/MasterPage.php");
//End Master Page implementation

//Initialize Page @1-8519BE2F
// Variables
$FileName = "";
$Redirect = "";
$Tpl = "";
$TemplateFileName = "";
$BlockToParse = "";
$ComponentName = "";
$Attributes = "";
$PathToCurrentMasterPage = "";
$TemplatePathValue = "";

// Events;
$CCSEvents = "";
$CCSEventResult = "";
$MasterPage = null;
$TemplateSource = "";

$FileName = FileName;
$Redirect = "";
$TemplateFileName = "home.html";
$BlockToParse = "main";
$TemplateEncoding = "CP1252";
$ContentType = "text/html";
$PathToRoot = "../";
$PathToRootOpt = "../";
$Scripts = "|";
//End Initialize Page

//Include events file @1-03C24257
include_once("./home_events.php");
//End Include events file

//Before Initialize @1-E870CEBC
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeInitialize", $MainPage);
//End Before Initialize

//Initialize Objects @1-66DDB2F9
$Attributes = new clsAttributes("page:");
$Attributes->SetValue("pathToRoot", $PathToRoot);
$MainPage->Attributes = & $Attributes;

// Controls
$MasterPage = new clsMasterPage("/Designs/d01/", "MasterPage", $MainPage);
$MasterPage->Attributes = $Attributes;
$MasterPage->Initialize();
$Head = new clsPanel("Head", $MainPage);
$Head->PlaceholderName = "Head";
$Content = new clsPanel("Content", $MainPage);
$Content->PlaceholderName = "Content";
$Menu = new clsPanel("Menu", $MainPage);
$Menu->PlaceholderName = "Menu";
$Sidebar1 = new clsPanel("Sidebar1", $MainPage);
$Sidebar1->PlaceholderName = "Sidebar1";
$TemplatePanel1 = new clsPanel("TemplatePanel1", $MainPage);
global $CCProjectDesign;
$TemplatePanel1->MasterPageInitialize("BlockTemplate", "/Designs/d01/", "BlockTemplate.html");
$Title1 = new clsPanel("Title1", $MainPage);
$Title1->PlaceholderName = "Title";
$Content1 = new clsPanel("Content1", $MainPage);
$Content1->PlaceholderName = "Content";
$TemplatePanel2 = new clsPanel("TemplatePanel2", $MainPage);
global $CCProjectDesign;
$TemplatePanel2->MasterPageInitialize("VerticalMenu", "/Designs/d01/", "VerticalMenu.html");
$Title2 = new clsPanel("Title2", $MainPage);
$Title2->PlaceholderName = "Title";
$MenuItems2 = new clsPanel("MenuItems2", $MainPage);
$MenuItems2->PlaceholderName = "MenuItems";
$TemplatePanel3 = new clsPanel("TemplatePanel3", $MainPage);
global $CCProjectDesign;
$TemplatePanel3->MasterPageInitialize("BlockTemplate", "/Designs/d01/", "BlockTemplate.html");
$Title3 = new clsPanel("Title3", $MainPage);
$Title3->PlaceholderName = "Title";
$Content3 = new clsPanel("Content3", $MainPage);
$Content3->PlaceholderName = "Content";
$TemplatePanel4 = new clsPanel("TemplatePanel4", $MainPage);
global $CCProjectDesign;
$TemplatePanel4->MasterPageInitialize("BlockTemplate", "/Designs/d01/", "BlockTemplate.html");
$Title4 = new clsPanel("Title4", $MainPage);
$Title4->PlaceholderName = "Title";
$Content4 = new clsPanel("Content4", $MainPage);
$Content4->PlaceholderName = "Content";
$TemplatePanel5 = new clsPanel("TemplatePanel5", $MainPage);
global $CCProjectDesign;
$TemplatePanel5->MasterPageInitialize("BlockTemplate", "/Designs/d01/", "BlockTemplate.html");
$Title5 = new clsPanel("Title5", $MainPage);
$Title5->PlaceholderName = "Title";
$Content5 = new clsPanel("Content5", $MainPage);
$Content5->PlaceholderName = "Content";
$HeaderSidebar = new clsPanel("HeaderSidebar", $MainPage);
$HeaderSidebar->PlaceholderName = "HeaderSidebar";
$MainPage->Head = & $Head;
$MainPage->Content = & $Content;
$MainPage->Menu = & $Menu;
$MainPage->Sidebar1 = & $Sidebar1;
$MainPage->TemplatePanel1 = & $TemplatePanel1;
$MainPage->Title1 = & $Title1;
$MainPage->Content1 = & $Content1;
$MainPage->TemplatePanel2 = & $TemplatePanel2;
$MainPage->Title2 = & $Title2;
$MainPage->MenuItems2 = & $MenuItems2;
$MainPage->TemplatePanel3 = & $TemplatePanel3;
$MainPage->Title3 = & $Title3;
$MainPage->Content3 = & $Content3;
$MainPage->TemplatePanel4 = & $TemplatePanel4;
$MainPage->Title4 = & $Title4;
$MainPage->Content4 = & $Content4;
$MainPage->TemplatePanel5 = & $TemplatePanel5;
$MainPage->Title5 = & $Title5;
$MainPage->Content5 = & $Content5;
$MainPage->HeaderSidebar = & $HeaderSidebar;
$Sidebar1->AddComponent("TemplatePanel1", $TemplatePanel1);
$Sidebar1->AddComponent("TemplatePanel2", $TemplatePanel2);
$Sidebar1->AddComponent("TemplatePanel3", $TemplatePanel3);
$Sidebar1->AddComponent("TemplatePanel4", $TemplatePanel4);
$Sidebar1->AddComponent("TemplatePanel5", $TemplatePanel5);
$TemplatePanel1->AddComponent("Title1", $Title1);
$TemplatePanel1->AddComponent("Content1", $Content1);
$TemplatePanel2->AddComponent("Title2", $Title2);
$TemplatePanel2->AddComponent("MenuItems2", $MenuItems2);
$TemplatePanel3->AddComponent("Title3", $Title3);
$TemplatePanel3->AddComponent("Content3", $Content3);
$TemplatePanel4->AddComponent("Title4", $Title4);
$TemplatePanel4->AddComponent("Content4", $Content4);
$TemplatePanel5->AddComponent("Title5", $Title5);
$TemplatePanel5->AddComponent("Content5", $Content5);
$ScriptIncludes = "";
$SList = explode("|", $Scripts);
foreach ($SList as $Script) {
    if ($Script != "") $ScriptIncludes = $ScriptIncludes . "<script src=\"" . $PathToRoot . $Script . "\" type=\"text/javascript\"></script>\n";
}
$Attributes->SetValue("scriptIncludes", $ScriptIncludes);

$CCSEventResult = CCGetEvent($CCSEvents, "AfterInitialize", $MainPage);

if ($Charset) {
    header("Content-Type: " . $ContentType . "; charset=" . $Charset);
} else {
    header("Content-Type: " . $ContentType);
}
//End Initialize Objects

//Initialize HTML Template @1-A7427295
$CCSEventResult = CCGetEvent($CCSEvents, "OnInitializeView", $MainPage);
$Tpl = new clsTemplate($FileEncoding, $TemplateEncoding);
if (strlen($TemplateSource)) {
    $Tpl->LoadTemplateFromStr($TemplateSource, $BlockToParse, "CP1252");
} else {
    $Tpl->LoadTemplate(PathToCurrentPage . $TemplateFileName, $BlockToParse, "CP1252");
}
$Tpl->SetVar("CCS_PathToRoot", $PathToRoot);
$Tpl->SetVar("CCS_PathToMasterPage", RelativePath . $PathToCurrentMasterPage);
$Tpl->block_path = "/$BlockToParse";
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeShow", $MainPage);
$Attributes->SetValue("pathToRoot", "../");
$Attributes->Show();
//End Initialize HTML Template

//Execute Components @1-910C1783
$MasterPage->Operations();
//End Execute Components

//Go to destination page @1-FBA93089
if($Redirect)
{
    $CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
    header("Location: " . $Redirect);
    unset($Tpl);
    exit;
}
//End Go to destination page

//        "<div class='blockheader'><h3 class='t'>Menu</h3></div>".
        $seslmenu="".
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

//Show Page @1-6E46253E
$Head->Show();
$Content->Show();
$MasterPage->Tpl->SetVar("Head", $Tpl->GetVar("Panel Head"));
$MasterPage->Tpl->SetVar("Content", $Tpl->GetVar("Panel Content"));
$MasterPage->Show();
if (!isset($main_block)) $main_block = $MasterPage->HTML;
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeOutput", $MainPage);
if ($CCSEventResult) echo $main_block;
//End Show Page

//Unload Page @1-88C40CD3
$CCSEventResult = CCGetEvent($CCSEvents, "BeforeUnload", $MainPage);
unset($MasterPage);
unset($Tpl);
//End Unload Page


?>
