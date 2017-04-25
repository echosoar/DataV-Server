<?php

/*
响应
*/

function base_response($success, $data, $msg) {
  $res['success'] = $success;
  $res['msg'] = $msg;
  $res['model'] = $data;
  echo json_encode($res);
}
