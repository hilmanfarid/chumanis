<?php
//BindEvents Method @1-17EAF0AA
function BindEvents()
{
    global $roleGrid;
    $roleGrid->Navigator->CCSEvents["BeforeShow"] = "roleGrid_Navigator_BeforeShow";
    $roleGrid->CCSEvents["BeforeShowRow"] = "roleGrid_BeforeShowRow";
}
//End BindEvents Method

//roleGrid_Navigator_BeforeShow @15-B2A8FE9D
function roleGrid_Navigator_BeforeShow(& $sender)
{
    $roleGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $roleGrid; //Compatibility
//End roleGrid_Navigator_BeforeShow

//Custom Code @19-2A29BDB7
// -------------------------
    // Write your own code here.
    $Component->Visible=true;
// -------------------------
//End Custom Code

//Close roleGrid_Navigator_BeforeShow @15-96323893
    return $roleGrid_Navigator_BeforeShow;
}
//End Close roleGrid_Navigator_BeforeShow

//roleGrid_BeforeShowRow @4-BC02A3A3
function roleGrid_BeforeShowRow(& $sender)
{
    $roleGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $roleGrid; //Compatibility
//End roleGrid_BeforeShowRow

//Set Row Style @6-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL      $Component->Visible=true;
//DEL  // -------------------------

//Close roleGrid_BeforeShowRow @4-EEF862BE
    return $roleGrid_BeforeShowRow;
}
//End Close roleGrid_BeforeShowRow
?>
