<?php

$db['db_host']="localhost";
$db['db_user']="root";
$db['db_password']= "1234";
$db['db_name']="cms";

//convert it to constants
foreach ($db as $key => $value) {
    // making constants using define func 
    // when define we need to do this due to that reason we have array and we use foreach and strupupper function
    //define("DB_HOST",'localhost'); like this we get it

    define(strtoupper($key),$value);
}

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
if ($connection) {
   //echo "we are connected";
}

?>