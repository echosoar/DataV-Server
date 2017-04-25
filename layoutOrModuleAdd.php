<?php
require('./data.php');
require('./base.php');

$table = '';
$name = '';
$description = '';
$json = '';



try {
  $req_table = $_GET['table'];
  $req_data = json_decode(stripslashes($_POST['data']));
  $name = addslashes($req_data->name);
  $description = addslashes($req_data->introduction);
  $json = addslashes(stripslashes($_POST['data']));
} catch (Exception $e) {
  base_response(false,'', 'JSON Data Error');
}


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

$SQL->query("insert into $table values(null, '$json', '$name', '$description', '".(microtime(true))."')");

base_response(true,$name, "success");
