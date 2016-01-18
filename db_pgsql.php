<?php

//DB PostgreSQL Class @0-C881546C
/*
 * Database Management for PHP
 *
 * Copyright (c) 1998-2000 NetUSE AG
 *                    Boris Erdmann, Kristian Koehntopp
 *
 * Modified by Vitaliy Radchuk  <vitaliy.radchuk@yessoftware.com>
 *
 * db_pgsql.php
 *
 */ 

class DB_PostgreSQL {
  var $DBHost     = "";
  var $DBPort     = "";
  var $DBDatabase = "";
  var $DBUser     = "";
  var $DBPassword = "";
  var $Persistent = false;

  var $Link_ID  = 0;
  var $Query_ID = 0;
  var $Record   = array();
  var $Row      = 0;

  var $Seq_Table     = "db_sequence";

  var $Errno    = 0;
  var $Error    = "";

  var $Auto_Free = 1; # Set this to 1 for automatic pg_freeresult on 
                      # last record.
  var $Connected = false;

  var $Encoding = "";
  var $TotalRow = 0;
  var $Start = 0;
  var $Limit = -1;
  function getNusoap()
	{
		include_once 'nusoap.php';
		$wsdl = 'http://localhost:8081/hris_wsnya/server/wsdl.php?wsdl';
		//create instance
		$nusoap = new nusoap_client ( $wsdl, true );
		$user = "wsclient";
		$pass = "secret";
		
		//encrypt header value
		$user = base64_encode ( $user );
		$pass = base64_encode ( $pass );
		
		$header = '<AuthSoapHeader>
					<UserName>' . $user . '</UserName>
					<Password>' . $pass . '</Password>
					</AuthSoapHeader>';
		
		//set header
		$nusoap->setHeaders ( $header );
		return $nusoap;
	}
	function getResultData($ws_client,$params)
	{
		foreach($_COOKIE as $cookie_name => $cookie){
			$ws_client->setCookie($cookie_name,$cookie);
		}
		$ws_data = $ws_client->call('ws_proccess',$params);
		//print_r($ws_data);
		//exit;
		
		if ($ws_client->fault) {
			exit ( $ws_client->faultstring );
		} else {
			$err = $ws_client->getError ();
			if ($err) {
				exit ( $err );
			}
		}
		$ws_data = unserialize (base64_decode ($ws_data));
		return $ws_data;
	}
  
  
  function ifadd($add, $me) {
    if("" != $add) return " ".$me.$add;
  }
  
  /* public: constructor */
  function DB_Sql($query = "") {
      $this->query($query);
  }

  function try_connect() {
    /*$cstr = "dbname='". str_replace(array("\\", "'"), array("\\\\", "\\'"), $this->DBDatabase) . "'" .
    $this->ifadd($this->DBHost, "host=").
    $this->ifadd($this->DBPort, "port=").
    $this->ifadd($this->DBUser, "user=").
    $this->ifadd($this->DBPassword, "password=");
    $this->Query_ID  = 0;
    if ($this->Persistent)
      $this->Link_ID = @pg_pconnect($cstr);
    else
      $this->Link_ID = @pg_connect($cstr);
    $this->Connected = $this->Link_ID ? true : false;*/
    return true;
  }

  function connect() {
   /* if (!$this->Connected) {
      $this->Query_ID  = 0;
      $cstr = "dbname='". str_replace(array("\\", "'"), array("\\\\", "\\'"), $this->DBDatabase) . "'" .
      $this->ifadd($this->DBHost, "host=").
      $this->ifadd($this->DBPort, "port=").
      $this->ifadd($this->DBUser, "user=").
      $this->ifadd($this->DBPassword, "password=");

                  if ($this->Persistent)
                    $this->Link_ID=pg_pconnect($cstr);
                  else
                    $this->Link_ID=pg_connect($cstr);

      if (!$this->Link_ID) {
        $this->Halt("Cannot connect to database: " . pg_errormessage());
        return false;
      }
      if ($this->Encoding)
        @pg_set_client_encoding($this->Link_ID, $this->Encoding);
      $this->Connected = true;
    }*/
  }

  function query($Query_String) {
    /* No empty queries, please, since PHP4 chokes on them. */
    if ($Query_String == "")
      /* The empty query string is passed on from the constructor,
       * when calling the class without a query, e.g. in situations
       * like these: '$db = new DB_Sql_Subclass;'
       */
      return 0;

    //$this->connect();

#   printf("<br>Debug: query = %s<br>\n", $Query_String);

    //$this->Query_ID = pg_Exec($this->Link_ID, $Query_String);
	$ws_client = $this->getNusoap();
        
	$params = array('search' => '',
			'getParams' => json_encode(array('start' => $this->Start,'limit' => $this->Limit,'query' => rawurlencode($Query_String))),
			'controller' => json_encode(array('module' => 'bds','class' => 'abstract', 'method' => 'read', 'type' => 'json')),
			'postParams' => json_encode($_POST),
			'jsonItems' => '',
			'start' => 0,
			'limit' => 0);
	$ws_data = $this->getResultData($ws_client, $params);
	//print_r($params);
	//exit;
	$this->Query_ID = $ws_data['data'];
	$this->TotalRow = $ws_data['total'];
    $this->Row   = 0;
    //$this->Error = pg_ErrorMessage($this->Link_ID);
    $this->Errno = ($this->Error == "") ? 0 : 1;
    if (!$ws_data['success']) {
      $this->Errors->addError("Error: " . $ws_data['message']);
	  throw new Exception("Error: " . $ws_data['message']);
    }

    return $this->Query_ID;
  }
  
  function next_record() {
    if (!$this->Query_ID) 
      return 0;
	if (!isset($this->Query_ID[$this->Row])) 
      return 0;
    $this->Record = $this->Query_ID[$this->Row];
    $this->Row++;
    //$this->Error = pg_ErrorMessage($this->Link_ID);
    //$this->Errno = ($this->Error == "")?0:1;

    $stat = is_array($this->Record);
    if (!$stat && $this->Auto_Free) {
      //pg_freeresult($this->Query_ID);
      $this->Query_ID = 0;
    }
    return $stat;
  }
  function has_next_row(){
	return isset($this->Query_ID[$this->Row]);
  }
  function seek($pos) {
    $this->Row = $pos;
    return true;
  }

  function lock($table, $mode = "write") {
    if ($mode == "write") {
      $result = pg_Exec($this->Link_ID, "lock table $table");
    } else {
      $result = 1;
    }
    return $result;
  }
  
  function unlock() {
    return pg_Exec($this->Link_ID, "commit");
  }


  /* public: sequence numbers */
  function nextid($seq_name) {
    $this->connect();

    if ($this->lock($this->Seq_Table)) {
      /* get sequence number (locked) and increment */
      $q  = sprintf("select nextid from %s where seq_name = '%s' LIMIT 1",
                $this->Seq_Table,
                $seq_name);
      $id  = @pg_Exec($this->Link_ID, $q);
      $res = @pg_Fetch_Array($id, 0);
      
      /* No current value, make one */
      if (!is_array($res)) {
        $currentid = 0;
        $q = sprintf("insert into %s values('%s', %s)",
                 $this->Seq_Table,
                 $seq_name,
                 $currentid);
        $id = @pg_Exec($this->Link_ID, $q);
      } else {
        $currentid = $res["nextid"];
      }
      $nextid = $currentid + 1;
      $q = sprintf("update %s set nextid = '%s' where seq_name = '%s'",
               $this->Seq_Table,
               $nextid,
               $seq_name);
      $id = @pg_Exec($this->Link_ID, $q);
      $this->unlock();
    } else {
      $this->Errors->addError("Database error: Cannot lock ".$this->Seq_Table." - has it been created?");
      return 0;
    }
    return $nextid;
  }



  function metadata($table) {
    $count = 0;
    $id    = 0;
    $res   = array();

    $this->connect();
    $id = pg_exec($this->Link_ID, "select * from $table LIMIT 1");
    if ($id < 0) {
      $this->Error = pg_ErrorMessage($id);
      $this->Errno = 1;
      $this->Errors->addError("Metadata query failed: " . $this->Error);
      return 0;
    }
    $count = pg_NumFields($id);
    
    for ($i=0; $i<$count; $i++) {
      $res[$i]["table"] = $table;
      $res[$i]["name"]  = pg_FieldName  ($id, $i); 
      $res[$i]["type"]  = pg_FieldType  ($id, $i);
      $res[$i]["len"]   = pg_FieldSize  ($id, $i);
      $res[$i]["flags"] = "";
    }
    
    pg_FreeResult($id);
    return $res;
  }

  function affected_rows() {
    return pg_cmdtuples($this->Query_ID);
  }

  function num_rows() {
    return pg_numrows($this->Query_ID);
  }

  function num_fields() {
    return pg_numfields($this->Query_ID);
  }

  function nf() {
    return $this->num_rows();
  }

  function np() {
    print $this->num_rows();
  }

  function f($Name) {
    return $this->Record && array_key_exists($Name, $this->Record) ? $this->Record[$Name] : "";
  }

  function p($Name) {
    print $this->Record[$Name];
  }

  function free_result() {
    @pg_freeresult($this->Query_ID);
    $this->Query_ID = 0;
  }

  function close()
  {
    if ($this->Query_ID) {
      $this->free_result();
    }
    /*
    For better perfomance, now php(by docs) must close connection when script finished
    if ($this->Connected && !$this->Persistent) {
      pg_close($this->Link_ID);
      $this->Connected = true;
    }
    */
  }  

  
  function halt($msg) {
    printf("</td></tr></table><b>Database error:</b> %s<br>\n", $msg);
    printf("<b>PostgreSQL Error</b><br>\n");
    die("Session halted.");
  }

  function table_names() {
    $this->query("select relname from pg_class where relkind = 'r' and not relname like 'pg_%'");
    $i=0;
    while ($this->next_record())
     {
      $return[$i]["table_name"]= $this->f(0);
      $return[$i]["tablespace_name"]=$this->DBDatabase;
      $return[$i]["database"]=$this->DBDatabase;
      $i++;
     }
    return $return;
  }
  
  function esc($value) {
    return pg_escape_string($value);
  }
}

//End DB PostgreSQL Class


?>
