<?php
//BindEvents Method @1-34E2D6EB
function BindEvents()
{
    global $p_client1;
    global $p_company_client;
    global $p_client2;
    $p_client1->Hide_Panel->CCSEvents["BeforeShow"] = "p_client1_Hide_Panel_BeforeShow";
    $p_client1->ds->CCSEvents["BeforeExecuteInsert"] = "p_client1_ds_BeforeExecuteInsert";
    $p_client1->ds->CCSEvents["AfterExecuteUpdate"] = "p_client1_ds_AfterExecuteUpdate";
    $p_client1->ds->CCSEvents["BeforeExecuteDelete"] = "p_client1_ds_BeforeExecuteDelete";
    $p_company_client->p_company_client_TotalRecords->CCSEvents["BeforeShow"] = "p_company_client_p_company_client_TotalRecords_BeforeShow";
    $p_company_client->CCSEvents["BeforeShow"] = "p_company_client_BeforeShow";
    $p_client2->p_client2_TotalRecords->CCSEvents["BeforeShow"] = "p_client2_p_client2_TotalRecords_BeforeShow";
    $p_client2->ds->CCSEvents["BeforeBuildSelect"] = "p_client2_ds_BeforeBuildSelect";
}
//End BindEvents Method

//p_client1_Hide_Panel_BeforeShow @9-339E78C3
function p_client1_Hide_Panel_BeforeShow(& $sender)
{
    $p_client1_Hide_Panel_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_client1; //Compatibility
//End p_client1_Hide_Panel_BeforeShow

//Hide-Show Component @10-BE2455A5
    $Parameter1 = 1;
    $Parameter2 = 1;
    //if (0 == CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        //$Component->Visible = false;
    $Component->Visible = True;
//End Hide-Show Component

//Close p_client1_Hide_Panel_BeforeShow @9-2B602C86
    return $p_client1_Hide_Panel_BeforeShow;
}
//End Close p_client1_Hide_Panel_BeforeShow

//p_client1_ds_BeforeExecuteInsert @7-F69872EE
function p_client1_ds_BeforeExecuteInsert(& $sender)
{
    $p_client1_ds_BeforeExecuteInsert = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_client1; //Compatibility
//End p_client1_ds_BeforeExecuteInsert

//Master Detail Validate @63-3D948EE2
    global $p_company_client, $CCSLocales;
    if (!CCInitializeDetails($p_company_client, "EditableGrid")) {
        $Component->DataSource->Errors->addError($CCSLocales->GetText("CCS_MasterDetailError_DetailsValidateFail"));
    }
//End Master Detail Validate

//Close p_client1_ds_BeforeExecuteInsert @7-69C98F20
    return $p_client1_ds_BeforeExecuteInsert;
}
//End Close p_client1_ds_BeforeExecuteInsert

//p_client1_ds_AfterExecuteUpdate @7-D77A8EEB
function p_client1_ds_AfterExecuteUpdate(& $sender)
{
    $p_client1_ds_AfterExecuteUpdate = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_client1; //Compatibility
//End p_client1_ds_AfterExecuteUpdate

//Master Detail Update @65-18C44DE1
    global $p_company_client;
    CCInitializeDetails($p_company_client, "EditableGrid");
//End Master Detail Update

//Close p_client1_ds_AfterExecuteUpdate @7-5559B1C0
    return $p_client1_ds_AfterExecuteUpdate;
}
//End Close p_client1_ds_AfterExecuteUpdate

//p_client1_ds_BeforeExecuteDelete @7-01D4AC64
function p_client1_ds_BeforeExecuteDelete(& $sender)
{
    $p_client1_ds_BeforeExecuteDelete = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_client1; //Compatibility
//End p_client1_ds_BeforeExecuteDelete

//Master Detail Delete @66-8489A743
    $p_client1->DataSource->query("DELETE FROM p_company_client WHERE p_client_id=" . $p_client1->DataSource->ToSQL(CCGetFromGet("p_client_id", 0), ccsInteger));
//End Master Detail Delete

//Close p_client1_ds_BeforeExecuteDelete @7-3AC4E8DE
    return $p_client1_ds_BeforeExecuteDelete;
}
//End Close p_client1_ds_BeforeExecuteDelete

//p_company_client_p_company_client_TotalRecords_BeforeShow @29-F3D3A938
function p_company_client_p_company_client_TotalRecords_BeforeShow(& $sender)
{
    $p_company_client_p_company_client_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_company_client; //Compatibility
//End p_company_client_p_company_client_TotalRecords_BeforeShow

//Retrieve number of records @30-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close p_company_client_p_company_client_TotalRecords_BeforeShow @29-2DA97BA6
    return $p_company_client_p_company_client_TotalRecords_BeforeShow;
}
//End Close p_company_client_p_company_client_TotalRecords_BeforeShow

//p_company_client_BeforeShow @26-04FF3C2E
function p_company_client_BeforeShow(& $sender)
{
    $p_company_client_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_company_client; //Compatibility
//End p_company_client_BeforeShow

//Hide-Show Component @45-16FE48D1
    $Parameter1 = 1;
    $Parameter2 = 1;
    if (0 == CCCompareValues($Parameter1, $Parameter2, ccsInteger))
        $Component->Button_Submit->Visible = false;
//End Hide-Show Component

//Close p_company_client_BeforeShow @26-EC50B8C9
    return $p_company_client_BeforeShow;
}
//End Close p_company_client_BeforeShow

//p_client2_p_client2_TotalRecords_BeforeShow @70-C4758092
function p_client2_p_client2_TotalRecords_BeforeShow(& $sender)
{
    $p_client2_p_client2_TotalRecords_BeforeShow = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_client2; //Compatibility
//End p_client2_p_client2_TotalRecords_BeforeShow

//Retrieve number of records @71-ABE656B4
    $Component->SetValue($Container->DataSource->RecordsCount);
//End Retrieve number of records

//Close p_client2_p_client2_TotalRecords_BeforeShow @70-70C7A87B
    return $p_client2_p_client2_TotalRecords_BeforeShow;
}
//End Close p_client2_p_client2_TotalRecords_BeforeShow

//p_client2_ds_BeforeBuildSelect @68-C0667691
function p_client2_ds_BeforeBuildSelect(& $sender)
{
    $p_client2_ds_BeforeBuildSelect = true;
    $Component = & $sender;
    $Container = & CCGetParentContainer($sender);
    global $p_client2; //Compatibility
//End p_client2_ds_BeforeBuildSelect

//Advanced Search @81-79A34A92
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

//Close p_client2_ds_BeforeBuildSelect @68-AF58386F
    return $p_client2_ds_BeforeBuildSelect;
}
//End Close p_client2_ds_BeforeBuildSelect


?>
