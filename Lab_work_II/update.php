<?php
include 'connect.php';
$id = $_GET['updateid'];
$sql = "SELECT * FROM crud WHERE id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$name = $row['firstname'];
$designation = $row['designation'];
$address1 = $row['address1'];
$address2 = $row['address2'];
$city = $row['city'];
$state = $row['state'];
$emailid = $row['emailid'];
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $address1 = $_POST['address1'];
    $address2 = $_POST['address2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $emailid = $_POST['emailid'];

    $sql = "UPDATE crud set id=$id,firstname='$name',designation='$designation',
    address1='$address1',address2='$address2',city='$city',state='$state',emailid='$emailid'
    WHERE id=$id";
    $result = mysqli_query($con, $sql);
    if ($result) {
        header ('location:display.php');
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
        <form method="post" class="p-4 border rounded bg-light">
            <div class="form-group mb-3">
                <label>Firstname</label>
                <input type="text" class="form-control" placeholder="Enter Your name" name="name"
                    value="<?php echo $name; ?>" autocomplete="none">
            </div>
            <div class="form-group mb-3">
                <label>Designation</label>
                <input type="text" class="form-control" placeholder="Your job title" name="designation"
                    value="<?php echo $designation; ?>" autocomplete="none">
            </div>
            <div class="form-group mb-3">
                <label>Primary Address</label>
                <input type="text" class="form-control" placeholder="Your Primary address" name="address1"
                    value="<?php echo $address1; ?>" autocomplete="none">
            </div>
            <div class="form-group mb-3">
                <label>Secondary Address</label>
                <input type="text" class="form-control" placeholder="Your Secondary address" name="address2"
                    value="<?php echo $address2; ?>" autocomplete="none">
            </div>
            <div class="form-group mb-3">
                <div class="form-group">
                    <label>City</label>
                    <select class="form-select mb-3" name="city">
                        <option value="">-- Select City --</option>
                        <option value="Pokhara" <?php if ($city == "Pokhara") echo "selected"; ?>>Pokhara</option>
                        <option value="Kathmandu" <?php if ($city == "Kathmandu") echo "selected"; ?>>Kathmandu</option>
                        <option value="Chitwan" <?php if ($city == "Chitwan") echo "selected"; ?>>Chitwan</option>
                        <option value="Butwal" <?php if ($city == "Butwal") echo "selected"; ?>>Butwal</option>
                        <option value="Palpa" <?php if ($city == "Palpa") echo "selected"; ?>>Palpa</option>
                        <option value="Other" <?php if ($city == "Other") echo "selected"; ?>>Other</option>
                    </select>
                </div>

            </div>
            <div class="form-group mb-3">
                <label>State</label>
                <select class="form-select" name="state">
                    <option value="">-- Select State --</option>
                    <option value="Koshi" <?php if ($state == "Koshi") echo "selected"; ?>>Koshi</option>
                    <option value="Madhesh" <?php if ($state == "Madhesh") echo "selected"; ?>>Madhesh</option>
                    <option value="Bagmati" <?php if ($state == "Bagmati") echo "selected"; ?>>Bagmati</option>
                    <option value="Gandaki" <?php if ($state == "Gandaki") echo "selected"; ?>>Gandaki</option>
                    <option value="Lumbini" <?php if ($state == "Lumbini") echo "selected"; ?>>Lumbini</option>
                    <option value="Karnali" <?php if ($state == "Karnali") echo "selected"; ?>>Karnali</option>
                    <option value="Sudurpaschim" <?php if ($state == "Sudurpaschim") echo "selected"; ?>>Sudurpaschim</option>
                </select>
            </div>
            <div class="form-group mb-3">
                <label>Email</label>
                <input type="email" class="form-control" placeholder="Enter Your email" name="emailid"
                    value="<?php echo $emailid;?>"autocomplete="none">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Update</button>
        </form>
    </div>
</body>

</html>