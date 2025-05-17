


<?php
include("connection.php");
$ids="1";

    $sql = "DELETE from studenttbl where id='$ids'";

    try {
        mysqli_query($conn, $sql);
        echo "Data deleted successfully!!";
    } catch (mysqli_sql_exception $e) {
        echo "Exception caught: " . $e->getMessage();
    }

    mysqli_close($conn);

?>
