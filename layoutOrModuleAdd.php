<?php
require('./data.php');
require('./base.php');

$table = '';
$name = '';
$description = '';
$json = '';



try {
  $req_table = $_GET['table'];
  
  
  switch($req_table) {
	  case 'layoutTemplate':
	  case 'baseModule':
	  case 'dataModule':
		$table = $req_table;
		break;
	  default:
		base_response(false,'', '接口配置错误：table设置错误');
		exit;
		break;
	}
  
  $postTrans = str_replace("#DataVSlashFormat#", '\\',stripslashes($_POST['data']));
  $req_data = json_decode($postTrans);
  $name = addslashes($req_data->name);
  $description = addslashes($req_data->introduction);
  
  if($table!='layoutTemplate') {
	$hashName = addslashes($req_data->hashName);
	$version = addslashes($req_data->version);
	$scriptAddr = addslashes($req_data->scriptAddr);
  }
  
  
  $json = addslashes(stripslashes($_POST['data']));
} catch (Exception $e) {
  base_response(false,'', 'JSON Data Error');
}





if($table!='layoutTemplate') {
	$SQL->query("insert into $table values(null, '$json', '$name', '$description', '".(microtime(true))."', '$hashName', '$version', '$scriptAddr')");
}else{
	$SQL->query("insert into $table values(null, '$json', '$name', '$description', '".(microtime(true))."')");
}

base_response(true,$name, "success");
