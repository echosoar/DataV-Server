<?php
date_default_timezone_set("PRC");
$dsn = "mysql:host=localhost;dbname=datav";
$SQL = new PDO($dsn, 'root', '11111111');
$SQL ->exec("set names utf8");
