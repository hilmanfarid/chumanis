<?php
	function setUserAttrib($uid){
		$attr_db = new clsDBhrcon();
		
		$attr_sql = "SELECT
					p_user_attribute.user_attribute_value,p_user_attribute_list.code as list_code,p_user_attribute_list.name as list_name,p_user_attribute_type.code as type_code
					FROM
						p_user_attribute
					LEFT JOIN p_user_attribute_list ON p_user_attribute.p_user_attribute_list_id = p_user_attribute_list.p_user_attribute_list_id
					LEFT JOIN p_user_attribute_type ON p_user_attribute.p_user_attribute_type_id = p_user_attribute_type.p_user_attribute_type_id
					WHERE p_user_attribute.p_user_id =".$uid; 
					
		$attr_db->query($attr_sql); 
		$attr_db->next_record();
		$items_attr = array();
		foreach($attr_db->Provider->Query_ID as $key => $val){
			if(isset($items_attr[$val['type_code']])){
				if(!is_array($items_attr[$val['type_code']])){
					$items_attr_temp = $items_attr[$val['type_code']];
					$items_attr[$val['type_code']] =array();
					$items_attr[$val['type_code']][]=$items_attr_temp;
					$items_attr[$val['type_code']][]=$val['list_code'];
				}else{
					$items_attr[$val['type_code']][]=$val['list_code'];
				}
			}else{
				$items_attr[$val['type_code']]=$val['list_code'];
			}
		}
		CCSetSession("USER_ATTR",json_encode($items_attr));
	}
?>