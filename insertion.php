<!-- Save this as something like insert_student.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Insert Student</title>
</head>
<body>
    <h2>Student Registration Form</h2>
    <form method="POST" action="">
        <label for="id">ID:</label><br>
        <input type="text" name="id" required><br><br>

        <label for="username">Username:</label><br>
        <input type="text" name="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label for="rollno">Roll No:</label><br>
        <input type="text" name="rollno" required><br><br>

        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
include("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $rollno = $_POST["rollno"];

    $sql = "INSERT INTO studenttbl(id, username, password, rollno) VALUES ('$id','$username','$password','$rollno')";

    try {
        mysqli_query($conn, $sql);
        echo "Data insertion successful";
    } catch (mysqli_sql_exception $e) {
        echo "Exception caught: " . $e->getMessage();
    }

    mysqli_close($conn);
}
?>
