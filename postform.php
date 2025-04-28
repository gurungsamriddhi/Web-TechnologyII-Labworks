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
        }

        ?>
        
        <form method="post">
    Name: <input type="text" name="name">
    <br>
    <input type="submit" name="submit">
</form>
        
    </body>
</html>