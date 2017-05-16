<?php 
require('./data.php');
require('./base.php');



try {
	
	$module = $_POST['hashName'];
	$num = count($module);
	for($i=0;$i<$num;$i++) {
		$module[$i] = "hashName='".addslashes($module[$i])."'";
	}

	
	$hashNameStr = implode(' or ', $module);
	$sqlStr = "select * from baseModule where ".$hashNameStr." union select * from dataModule where ".$hashNameStr;
	
  
} catch (Exception $e) {
  base_response(false,'', 'Api Error');
}

$queryRes = $SQL->query($sqlStr);

try {
  foreach($queryRes as $row ) {
    $temData['hashName'] = $row['hashName'];
    $temData['version'] = $row['version'];
    $temData['scriptAddr'] = $row['scriptAddr'];
	$temData['json'] = stripslashes($row['json']);
    $data['data'][] = $temData;
  }
}catch(PDOException $e) {
  base_response(false,'', 'Êý¾Ý¿â¶ÁÈ¡´íÎó');
  exit;
}

base_response(true, $data, '');