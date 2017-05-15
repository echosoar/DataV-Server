<?php
require('./data.php');
require('./base.php');

$table = '';
$name = '';
$description = '';
$json = '';
$id = -1;


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
  
  $id = $_POST['id'] - 0;
  $req_data = json_decode(stripslashes($_POST['data']));
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
	$SQL->query("update $table set json='$json',name='$name',description='$description',version='$version',scriptAddr='$scriptAddr',hashName='$hashName' where id=".$id);
}else {
	$SQL->query("update $table set json='$json',name='$name',description='$description' where id=".$id);
}

base_response(true,$name, "success");
