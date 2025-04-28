<!DOCTYPE html>
<html>
    <head>
        <title>form</title>
    </head>
    <body>
        <?php
        if(isset($_POST['submit'])){
            $name=$_POST['name'];
            
        if (empty($name)) {
            echo"Name is required";
        }
        else{
            echo $name;
        } 
        
        if (empty($phone)){
            echo"Phone number is required!<br>";

        }
        //else if(preg_match){

        //}
        }

        ?>
        
        <form method="post">
    Name: <input type="text" name="name">
    <br>
    <br>
    Phonenumber: <input type="tel" name="phone">
    <br>
    <br>
    Email: <input type="text" name="email">
    <br>
    <br>
    <input type="submit" name="submit">
</form>
        
    </body>
</html>