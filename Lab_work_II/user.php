<!--Create an address book web application that allows the user to store and retrieve several
mailing lists from mysql database.The address book contains firstname,designation,address1
,address2,City ,State,emailid. User can add,update and delete all address informations in
the database.Implement search operation with emailid,when emailid,is given it return and html
page with all the complete address information.-->
<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $designation=$_POST['designation'];
    $address1=$_POST['address1'];
    $address2=$_POST['address2'];
    $city=$_POST['city'];
    $state=$_POST['state'];
    $emailid=$_POST['emailid'];

    $sql="INSERT INTO crud (firstname,designation,address1,address2,city,state,emailid)
    values('$name','$designation','$address1','$address2','$city','$state','$emailid')";
    $result=mysqli_query($con,$sql);
    if($result){
       // echo"Data inserted successfully";
       header('location:display.php');

    }
    die(mysqli_error($con));

}
?>

<!doctype html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" 
    rel="stylesheet">
    <title>CRUD operation</title>
</head>

<body>
    <div class="container mt-5">
        <form method="post" class="p-4 border rounded bg-light" >
            <div class="form-group mb-3">
                <label>Firstname</label>
                <input type="text" class="form-control" placeholder="Enter Your name" name="name"
                autocomplete="none" >
            </div>
            <div class="form-group mb-3">
                <label>Designation</label>
                <input type="text" class="form-control" placeholder="Your job title" name="designation" 
                autocomplete="none">
            </div>
            <div class="form-group mb-3">
                <label>Primary Address</label>
                <input type="text" class="form-control" placeholder="Your Primary address" name="address1"
                autocomplete="none">
            </div>
            <div class="form-group mb-3">
                <label>Secondary Address</label>
                <input type="text" class="form-control" placeholder="Your Secondary address" name="address2"
                autocomplete="none">
            </div>
            <div class="form-group mb-3">
                <div class="form-group">
                    <label>City</label>
                    <select class="form-select mb-3" name="city">
                        <option value="">-- Select City --</option>
                        <option value="Pokhara">Pokhara</option>
                        <option value="Kathmandu">Kathmandu</option>
                        <option value="Chitwan">Chitwan</option>
                        <option value="Butwal">Butwal</option>
                        <option value="Palpa">Palpa</option>
                        <option value="Other">Other</option>
                    </select>
                </div>

            </div>
            <div class="form-group mb-3">
                <label>State</label>
                <select class="form-select" name="state">
                    <option value="">-- Select State --</option>
                    <option value="Koshi">Koshi</option>
                    <option value="Madhesh">Madhesh</option>
                    <option value="Bagmati">Bagmati</option>
                    <option value="Gandaki">Gandaki</option>
                    <option value="Lumbini">Lumbini</option>
                    <option value="Karnali">Karnali</option>
                    <option value="Sudurpaschim">Sudurpaschim</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter Your email" name="emailid"
                autocomplete="none">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</body>

</html>