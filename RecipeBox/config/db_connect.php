<?php 

    //connect to db
   $conn = mysqli_connect('localhost' , 'manjureceipe' , 'test123!@#' , 'receipebox_db');

   //check db connection
   if(!$conn){
     echo 'Connection error - ' . mysqli_connect_error(); 
   }

?>