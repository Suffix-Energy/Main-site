<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "sm.php";



function test_input($data){
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

//check for errors in the email from form on forgot.php


    if(empty($_POST["email"])) {
     echo  "Email is required";
    } else {
      $email =  test_input($_POST["email"]);
    }

    if(empty($_POST["name"])) {
        echo "Email is required";
        
      } else {
        $name =  test_input($_POST["name"]);
      }

      if(empty($_POST["subject"])) {
             echo   "Email is required";
       
      } else {
        $subject =  test_input($_POST["subject"]);
      }

      if(empty($_POST["message"])) {
        echo "Email is required";
       
      } else {
        $message =  test_input($_POST["message"]);
      }

sendEmail($email,$message,$name,$subject);


