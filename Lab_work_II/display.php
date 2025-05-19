<?php
include 'connect.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <title>Crud Operation</title>
</head>

<body>
    <div class="container">
        <button class="btn btn-primary mt-5">

            <a href="user.php" class="text-light" style="text-decoration: none">Add user</a></button>

    </div>
    
</div>
        <div class="container justify-content-center mt-5">
            <div class="table-responsive" style="max-width: 1300px;">
                <table class="table mt-4 mb-4">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Firstname</th>
                            <th scope="col">Designation</th>
                            <th scope="col">Address1</th>
                            <th scope="col">Address2</th>
                            <th scope="col">City</th>
                            <th scope="col">State</th>
                            <th scope="col">Email-Id</th>
                            <th scope="col">Operations</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $sql = "Select *from crud";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $id = $row['id'];
                                $name = $row['firstname'];
                                $designation = $row['designation'];
                                $address1 = $row['address1'];
                                $address2 = $row['address2'];
                                $city = $row['city'];
                                $state = $row['state'];
                                $emailid = $row['emailid'];
                                echo '<tr>
                                  <th scope="row">' . $id . '</th>
                                  <td>' . $name . '</td>
                                  <td>' . $designation . '</td>
                                  <td>' . $address1 . '</td>
                                  <td>' . $address2 . '</td>
                                  <td>' . $city . '</td>
                                  <td>' . $state . '</td>
                                  <td>' . $emailid . '</td> 
                                  <td>
                                 <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" 
                                 class="text-light" style="text-decoration:none">Update</a></button>
                                 <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '"  
                                 class="text-light"  style="text-decoration:none">Delete</a></button>
                                </td> 
                                 </tr>';
                            }
                        }
                        ?>



                    </tbody>
                </table>
            </div>
        </div>

</body>

</html>