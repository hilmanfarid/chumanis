<?php

//BindEvents Method @1-17D3019E
function BindEvents()
{
    global $lovDynamic;
    $lovDynamic->Navigator->CCSEvents["BeforeShow"] = "lovDynamic_Navigator_BeforeShow";
    $lovDynamic->label_lov->CCSEvents["BeforeShow"] = "lovDynamic_label_lov_BeforeShow";
    $lovDynamic->CCSEvents["BeforeShowRow"] = "lovDynamic_BeforeShowRow";
    $lovDynamic->ds->CCSEvents["AfterExecuteSelect"] = "lovDynamic_ds_AfterExecuteSelect";
}
//End BindEvents Method

//lovDynamic_Navigator_BeforeShow @10-B00E8A89
function lovDynamic_Navigator_BeforeShow(& $sender)
{
    $lovDynamic_Navigator_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $lovDynamic; //Compatibility
//End lovDynamic_Navigator_BeforeShow

//Custom Code @11-2A29BDB7
// -------------------------
    // Write your own code here.
    $Component->Visible=true;
// -------------------------
//End Custom Code

//Close lovDynamic_Navigator_BeforeShow @10-AE6A3B2B
    return $lovDynamic_Navigator_BeforeShow;
}
//End Close lovDynamic_Navigator_BeforeShow

//lovDynamic_label_lov_BeforeShow @19-9FE7C808
function lovDynamic_label_lov_BeforeShow(& $sender)
{
    $lovDynamic_label_lov_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $lovDynamic; //Compatibility
//End lovDynamic_label_lov_BeforeShow

//Custom Code @30-2A29BDB7
// -------------------------
    // Write your own code here.
    $labels = CCGetFromGet('label');
    $labels_html='';
    foreach($labels as $label){
    	$labels_html.= '<th scope="col">'.$label.'</th>';
    }
    $lovDynamic->label_lov->SetValue($labels_html);
// -------------------------
//End Custom Code

//Close lovDynamic_label_lov_BeforeShow @19-4FDE3EC6
    return $lovDynamic_label_lov_BeforeShow;
}
//End Close lovDynamic_label_lov_BeforeShow

//lovDynamic_BeforeShowRow @2-090CFB11
function lovDynamic_BeforeShowRow(& $sender)
{
    $lovDynamic_BeforeShowRow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $lovDynamic; //Compatibility
//End lovDynamic_BeforeShowRow

//Set Row Style @16-982C9472
    $styles = array("Row", "AltRow");
    if (count($styles)) {
        $Style = $styles[($Component->RowNumber - 1) % count($styles)];
        if (strlen($Style) && !strpos($Style, "="))
            $Style = (strpos($Style, ":") ? 'style="' : 'class="'). $Style . '"';
        $Component->Attributes->SetValue("rowStyle", $Style);
    }
//End Set Row Style

//Custom Code @25-2A29BDB7
// -------------------------
    // Write your own code here.
     $rowHtml='';
     foreach($Component->DataSource->Record as $item){
     	$rowHtml.="<td>".$item."</td>";
     }
     $Component->items_lov->setValue($rowHtml);
// -------------------------
//End Custom Code

//Close lovDynamic_BeforeShowRow @2-544C6640
    return $lovDynamic_BeforeShowRow;
}
//End Close lovDynamic_BeforeShowRow

//lovDynamic_ds_AfterExecuteSelect @2-C1FFDE8B
function lovDynamic_ds_AfterExecuteSelect(& $sender)
{
    $lovDynamic_ds_AfterExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $lovDynamic; //Compatibility
//End lovDynamic_ds_AfterExecuteSelect

//Custom Code @24-2A29BDB7
// -------------------------
    // Write your own code here.
// -------------------------
//End Custom Code

//Close lovDynamic_ds_AfterExecuteSelect @2-5545C556
    return $lovDynamic_ds_AfterExecuteSelect;
}
//End Close lovDynamic_ds_AfterExecuteSelect

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL      $items = CCGetFromGet('items');
//DEL  	if(empty($items)){
//DEL  		$lov_dynamic->Visible = false;
//DEL  	}
//DEL  // -------------------------

?>
