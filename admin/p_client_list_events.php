<?php
//BindEvents Method @1-984E3350
function BindEvents()
{
    global $p_client;
    $p_client->p_client_TotalRecords->CCSEvents["BeforeShow"] = "p_client_p_client_TotalRecords_BeforeShow";
    $p_client->ds->CCSEvents["BeforeBuildSelect"] = "p_client_ds_BeforeBuildSelect";
}
//End BindEvents Method

//p_client_p_client_TotalRecords_BeforeShow @11-880BEB7E
function p_client_p_client_TotalRecords_BeforeShow(& $sender)
{
    $p_client_p_client_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_client; //Compatibility
//End p_client_p_client_TotalRecords_BeforeShow

//Retrieve number of records @12-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close p_client_p_client_TotalRecords_BeforeShow @11-3AABADF8
    return $p_client_p_client_TotalRecords_BeforeShow;
}
//End Close p_client_p_client_TotalRecords_BeforeShow

//p_client_ds_BeforeBuildSelect @9-556651B0
function p_client_ds_BeforeBuildSelect(& $sender)
{
    $p_client_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_client; //Compatibility
//End p_client_ds_BeforeBuildSelect

//Advanced Search @26-79A34A92
    global $p_clientSearch;
    $s_keyword = CCGetParam("s_keyword", "");
    $searchConditions = CCGetParam("searchConditions", "");
    if (!in_array($searchConditions, array("1", "2", "3"))) $searchConditions = 1;
    $keywords = explode(" ", trim($s_keyword));
    if (strlen($s_keyword)) {
        $f_code = "";
        $f_client_name = "";
        $f_description = "";
        // Any of words
        if ($searchConditions == "1") {
            foreach ($keywords as $keyword) {
                $keyword = str_replace("'", "''", trim($keyword));
                if (strlen($f_code)) $f_code .= " OR ";
                if (strlen($f_client_name)) $f_client_name .= " OR ";
                if (strlen($f_description)) $f_description .= " OR ";
                $f_code .= "code LIKE '%" . $keyword . "%'";
                $f_client_name .= "client_name LIKE '%" . $keyword . "%'";
                $f_description .= "description LIKE '%" . $keyword . "%'";
            }
        // All words
        } else if ($searchConditions == "2") {
            foreach ($keywords as $keyword) {
                $keyword = str_replace("'", "''", trim($keyword));
                if (strlen($f_code)) $f_code .= " AND ";
                if (strlen($f_client_name)) $f_client_name .= " AND ";
                if (strlen($f_description)) $f_description .= " AND ";
                $f_code .= "code LIKE '%" . $keyword . "%'";
                $f_client_name .= "client_name LIKE '%" . $keyword . "%'";
                $f_description .= "description LIKE '%" . $keyword . "%'";
            }
        // Exact Phrase
        } else if ($searchConditions == "3") {
            $keyword = str_replace("'", "''", $s_keyword);
            $f_code = "code LIKE '%" . $keyword . "%'";
            $f_client_name = "client_name LIKE '%" . $keyword . "%'";
            $f_description = "description LIKE '%" . $keyword . "%'";
        }
        if (strlen($Container->DataSource->Where) > 0 ) $Container->DataSource->Where .= " AND ";
        $Container->DataSource->Where .= "((" . $f_code . ")";
        if (strlen($f_client_name))
            $Container->DataSource->Where .= " OR (". $f_client_name .")";
        if (strlen($f_description))
            $Container->DataSource->Where .= " OR (". $f_description .")";
        $Container->DataSource->Where .= " ) ";
    } else {
        $p_clientSearch->s_keyword->SetValue("");
    }
//End Advanced Search

//Close p_client_ds_BeforeBuildSelect @9-CBC0DAFC
    return $p_client_ds_BeforeBuildSelect;
}
//End Close p_client_ds_BeforeBuildSelect


?>
