<?php
require('./data.php');
require('./base.php');

$table = 'pages';
$name = '';
$description = '';
$json = '';



try {
  $name = addslashes(stripslashes($_POST['name']));
  $description = addslashes(stripslashes($_POST['description']));
  $json = addslashes(stripslashes($_POST['data']));
} catch (Exception $e) {
  base_response(false,'', 'JSON Data Error');
}


$SQL->query("insert into $table values(null, '$json', '$name', '$description', '".(microtime(true))."')");

base_response(true, $SQL->lastInsertId(), "success");
