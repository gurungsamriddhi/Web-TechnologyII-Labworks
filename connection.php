<?php
$db_server="localhost";
$db_user="root";
$db_password="";
$db_name="studentdb";

try{
$conn=mysqli_connect($db_server,$db_user,$db_password,$db_name);
}
catch(mysqli_sql_exception){
    echo"Could not connect";
}
if ($conn){
    echo"Connection Established<br>";
}
    else{
        echo "no connection";
    }

?>