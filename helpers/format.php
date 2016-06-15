<?php

 /**
  * format class
  */
 class format
 {

public function formatDate($date)
   {
    return date('F j ,Y,g:i a',strtotime($date));
   }

   public function textshort($text,$limit=300){

   $text=$text."";
   $text=substr($text,0,$limit);
   $text=substr($text,0,strrpos($text,' '));
   $text=$text.".....";
   return $text;

   }
  /* validation */
    public function Validation($data){
     $data = trim($data);
     $data = stripcslashes($data);
     $data = htmlspecialchars($data);
     return $data;
    }

   /* validation */


 }



 ?>
