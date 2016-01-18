<?php

//BindEvents Method @1-1DC201D4
function BindEvents()
{
    global $lovDynamic;
    global $p_menu;
    $lovDynamic->Navigator->CCSEvents["BeforeShow"] = "lovDynamic_Navigator_BeforeShow";
    $lovDynamic->label_lov->CCSEvents["BeforeShow"] = "lovDynamic_label_lov_BeforeShow";
    $lovDynamic->CCSEvents["BeforeShowRow"] = "lovDynamic_BeforeShowRow";
    $lovDynamic->ds->CCSEvents["AfterExecuteSelect"] = "lovDynamic_ds_AfterExecuteSelect";
    $lovDynamic->ds->CCSEvents["BeforeExecuteSelect"] = "lovDynamic_ds_BeforeExecuteSelect";
    $lovDynamic->CCSEvents["BeforeShow"] = "lovDynamic_BeforeShow";
    $p_menu->searchKey->CCSEvents["OnValidate"] = "p_menu_searchKey_OnValidate";
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
     //echo '<pre>';
     $Component->items_return->SetText(json_encode(array(
	     'item' => $Component->DataSource->Record,
	     'input' => CCGetFromGet('input')
	     )
     ));
     $rowHtml='';
     $items = CCGetFromGet('items');
     $labels = CCGetFromGet('label');
     foreach($items as $key => $item){
     	if(!empty($labels[$key]))
     	$rowHtml.="<td>".$Component->DataSource->Record[$item]."</td>";
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

//lovDynamic_ds_BeforeExecuteSelect @2-907E1A80
function lovDynamic_ds_BeforeExecuteSelect(& $sender)
{
    $lovDynamic_ds_BeforeExecuteSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $lovDynamic; //Compatibility
//End lovDynamic_ds_BeforeExecuteSelect

//Custom Code @44-2A29BDB7
// -------------------------
    // Write your own code here.
    $whereClause = CCGetFromGet('whereClause'); // p_attribut_id = 5
    $searchField = CCGetFromGet('searchParam');
    $search = CCGetFromPost('searchKey');
	if(!empty($whereClause)){
		//$whereClause;
	}else{
		$whereClause = '';
	}
	if(!empty($searchField)){
		foreach($searchField as &$field){
			$field = "upper(".$field.")"." LIKE upper('%".$search."%')";
		}
		if(!empty($whereClause)){
			$whereClause.=" AND (".implode(" OR ",$searchField).")";
		}else{
			$whereClause.=" (".implode(" OR ",$searchField).")";
		}
	}
	
	//print_r($whereClause);exit;
	$Component->DataSource->Where = $whereClause;
// -------------------------
//End Custom Code

//Close lovDynamic_ds_BeforeExecuteSelect @2-50A66D54
    return $lovDynamic_ds_BeforeExecuteSelect;
}
//End Close lovDynamic_ds_BeforeExecuteSelect

//lovDynamic_BeforeShow @2-E59AD38C
function lovDynamic_BeforeShow(& $sender)
{
    $lovDynamic_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $lovDynamic; //Compatibility
//End lovDynamic_BeforeShow

//Custom Code @50-2A29BDB7
// -------------------------
    // Write your own code here.
    $items =array();
    foreach(CCGetFromGet('input') as $key => $val){
    	$items[$val] ='';
    }
    $Component->items_null->SetText(json_encode(array(
	     'item' => $items,
	     'input' => CCGetFromGet('input')
	     )
     ));
// -------------------------
//End Custom Code

//Close lovDynamic_BeforeShow @2-9F4C9D27
    return $lovDynamic_BeforeShow;
}
//End Close lovDynamic_BeforeShow

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL      $items =array();
//DEL      foreach(CCGetFromGet('input') as $key => $val){
//DEL      	$items[$val] ='';
//DEL      }
//DEL      $Component->items_null->SetText(json_encode(array(
//DEL  	     'item' => $items,
//DEL  	     'input' => CCGetFromGet('input')
//DEL  	     )
//DEL       ));
//DEL  // -------------------------

//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL      $items =array();
//DEL      foreach(CCGetFromGet('input') as $key => $val){
//DEL      	$items[$val] ='';
//DEL      }
//DEL      $Component->items_null->SetText(json_encode(array(
//DEL  	     'item' => $items,
//DEL  	     'input' => CCGetFromGet('input')
//DEL  	     )
//DEL       ));
//DEL  // -------------------------

//p_menu_searchKey_OnValidate @37-DE7F7300
function p_menu_searchKey_OnValidate(& $sender)
{
    $p_menu_searchKey_OnValidate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_menu; //Compatibility
//End p_menu_searchKey_OnValidate

//Custom Code @38-2A29BDB7
// -------------------------
    // Write your own code here.
    //$Component->Errors->addError('sengaja error');
// -------------------------
//End Custom Code

//Close p_menu_searchKey_OnValidate @37-F1E37C9E
    return $p_menu_searchKey_OnValidate;
}
//End Close p_menu_searchKey_OnValidate
//DEL  // -------------------------
//DEL      // Write your own code here.
//DEL      $items = CCGetFromGet('items');
//DEL  	if(empty($items)){
//DEL  		$lov_dynamic->Visible = false;
//DEL  	}
//DEL  // -------------------------

?>
