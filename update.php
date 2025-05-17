


<?php
include("connection.php");
$new_username="Prabhu";
$new_password="ashwin123";



    $sql = "UPDATE studenttbl
    SET username='$new_username', 
    password='$new_password'
     where id='2'";

    try {
        mysqli_query($conn, $sql);
        echo "Data updated successfully";
    } catch (mysqli_sql_exception $e) {
        echo "Exception caught: " . $e->getMessage();
    }

    mysqli_close($conn);

?>
