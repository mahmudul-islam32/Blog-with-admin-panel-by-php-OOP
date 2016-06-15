<?php

/**
 * Session class
 */
class Session
{
/* for start Session */
public static function  init(){

session_start();

}
/* for start Session */


/* for set value */
public static function set($key ,$val){

$_SESSION[$key]=$val;

}
/* for set value */

/* for get value */
public static function get($key){

if (isset($_SESSION[$key])) {
   return $_SESSION[$key];
}else {
  return false;
}

}

/* for get value */


public static function CheckSession(){


  self::init();
  if (self::get("login")== false) {
       self::destroy();
        header("Location:login.php");
  }
}

public static function destroy(){

  session_destroy();
  header("Location:login.php");
}


}


 ?>
