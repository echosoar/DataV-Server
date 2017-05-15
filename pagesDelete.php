<?php
require('./data.php');
require('./base.php');

$table = 'pages';
$id = -1;

try {
  $id = $_GET['id'] - 0;
} catch (Exception $e) {
  base_response(false,'', 'JSON Data Error');
}

$SQL->query("delete from $table where id=".$id);

base_response(true, $id, "success");
