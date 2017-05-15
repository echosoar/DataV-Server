<?php 
date_default_timezone_set('PRC');
echo $_GET['name'].md5(microtime(true).rand(100000, 999999));