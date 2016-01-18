<?php
//BindEvents Method @1-076F198A
function BindEvents()
{
    global $roleGrid;
    global $Panel1;
    $roleGrid->Navigator->CCSEvents["BeforeShow"] = "roleGrid_Navigator_BeforeShow";
    $roleGrid->CCSEvents["BeforeShowRow"] = "roleGrid_BeforeShowRow";
    $Panel1->CCSEvents["BeforeShow"] = "Panel1_BeforeShow";
}
//End BindEvents Method

//roleGrid_Navigator_BeforeShow @14-B2A8FE9D
function roleGrid_Navigator_BeforeShow(& $sender)
{
    $roleGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $roleGrid; //Compatibility
//End roleGrid_Navigator_BeforeShow

//Custom Code @15-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close roleGrid_Navigator_BeforeShow @14-96323893
    return $roleGrid_Navigator_BeforeShow;
}
//End Close roleGrid_Navigator_BeforeShow

//roleGrid_BeforeShowRow @6-BC02A3A3
function roleGrid_BeforeShowRow(& $sender)
{
    $roleGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $roleGrid; //Compatibility
//End roleGrid_BeforeShowRow

//Set Row Style @20-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close roleGrid_BeforeShowRow @6-EEF862BE
    return $roleGrid_BeforeShowRow;
}
//End Close roleGrid_BeforeShowRow

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL      $Component->Visible=true;
//DEL  // -------------------------

//Panel1_BeforeShow @4-AAD8AF72
function Panel1_BeforeShow(& $sender)
{
    $Panel1_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $Panel1; //Compatibility
//End Panel1_BeforeShow

//Close Panel1_BeforeShow @4-D21EBA68
    return $Panel1_BeforeShow;
}
//End Close Panel1_BeforeShow

//Custom Code @15//End Custom Code


?>
