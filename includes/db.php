<?php
$connection = mysqli_connect('localhost','root','','cms');

if(!($connection))
{
  echo "Database connectivity error";  
}
//else
//{
//    echo "Database connectivity error";
//}



//Alternative methods to connect
//Method 1
//$db['db_host']="localhost";
//$db['db_user']="root";
//$db['db_pass']="";
//$db['db_name']="cms";
//
//foreach($db as $key=>$value)
//{
//    define(strtoupper($key),$value);
//    
//}
//$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
//if($connection)
//{
//  echo "Connected";  
//}
//else
//{
//    echo "Database connectivity error";
//}

?>