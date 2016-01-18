<?php

// //Events @1-F81417CB

//lov_p_role_roleGrid_Navigator_BeforeShow @10-13BCD92E
function lov_p_role_roleGrid_Navigator_BeforeShow(& $sender)
{
    $lov_p_role_roleGrid_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $lov_p_role; //Compatibility
//End lov_p_role_roleGrid_Navigator_BeforeShow

//Custom Code @11-2A29BDB7
// -------------------------
    // Write your own code here.
    $Component->Visible=true;
// -------------------------
//End Custom Code

//Close lov_p_role_roleGrid_Navigator_BeforeShow @10-8B90D9B6
    return $lov_p_role_roleGrid_Navigator_BeforeShow;
}
//End Close lov_p_role_roleGrid_Navigator_BeforeShow

//lov_p_role_roleGrid_BeforeShowRow @2-354C242C
function lov_p_role_roleGrid_BeforeShowRow(& $sender)
{
    $lov_p_role_roleGrid_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $lov_p_role; //Compatibility
//End lov_p_role_roleGrid_BeforeShowRow

//Set Row Style @16-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Close lov_p_role_roleGrid_BeforeShowRow @2-1A36C644
    return $lov_p_role_roleGrid_BeforeShowRow;
}
//End Close lov_p_role_roleGrid_BeforeShowRow
?>
