<?php
require('./data.php');
require('./base.php');

$table = '';
$name = '';
$page = 1;
$size = 10;
$start = 0;
$selName = '';

try {
  $req_table = $_GET['table'];
  $name = addslashes(stripslashes($_GET['name']));
  $page = $_GET['page'] - 0;
  $size = $_GET['size'] - 0;
  $start = ($page - 1) * $size;
} catch (Exception $e) {
  base_response(false,'', '参数错误');
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

if($name!='') {
  $selName = " where name like '%".$name."%'";
}

$queryCountSql = "select count(*) as count from ".$table.$selName;
$queryCountRes = $SQL->query($queryCountSql)->fetch();
$data['tolCount'] = $queryCountRes['count'];

$querySql = "select * from ".$table.$selName." order by id desc limit $start,$size";

$queryRes = $SQL->query($querySql);


$data['data'] = array();

try {
  foreach($queryRes as $row ) {
    $data['data'][] = $row['json'];
  }
}catch(PDOException $e) {
  base_response(false,'', '数据库读取错误');
  exit;
}


base_response(true, $data, '');
