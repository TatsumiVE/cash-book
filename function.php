<?php
function base_path($file)
{
  // var_dump(BASE_PATH);
  return BASE_PATH . $file;
}

<<<<<<< HEAD
function login($user){
$_SESSION['user']=$user;

}

function checkValidate($type,$field){
  if(empty($field)){
    echo  "$type  is required";
  }
}
=======
function login($user)
{
  $_SESSION['user'] = $user;
}
>>>>>>> c1167bf693b2525e74c3d2ef70382011873b14a2
