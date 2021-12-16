<?php
//Any page that  works with session data MUST include session_start()
session_start();

//Redirects a user to a login page if there is no active session
if(!function_exists('checkSession')) {
function checkSession(){

  $goto='/';
  $hasSession=false;
  if(!empty($_SESSION['user']['id'])){
    $hasSession=true;
    $admin = $_SESSION['admin']['id'];
    header('Location: /index.php?admin='.$admin);
    return;
  }

  if($hasSession===false){
    //Pass the end point the user is trying to access to the login page
    //This will allow the user to be properly redirected on login
    $goto = $_SERVER['PHP_SELF'];
    $qs = !empty($_SERVER['QUERY_STRING'])?"?{$_SERVER['QUERY_STRING']}":false;
// v originalsingle line which uses correct syntax for passing stuff (post)
    header('Location: /login.php?goto='.$goto.$qs);
    return;
    }    
  }
}
