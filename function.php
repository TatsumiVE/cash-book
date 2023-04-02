<?php
function base_path($file){
  // var_dump(BASE_PATH);
  return BASE_PATH . $file;
}

function login($user){
$_SESSION['user']=$user;

}