<?php
require('./data.php');
require('./base.php');

$table = 'pages';
$name = '';
$description = '';
$json = '';
$id = -1;


try {
  $name = addslashes(stripslashes($_POST['name']));
  $id = $_POST['id'] - 0;
  $description = addslashes(stripslashes($_POST['description']));
   $json = addslashes(stripslashes($_POST['data']));
} catch (Exception $e) {
  base_response(false,'', 'JSON Data Error');
}


$SQL->query("update $table set json='$json',name='$name',description='$description' where id=".$id);


base_response(true, $id, "success");
