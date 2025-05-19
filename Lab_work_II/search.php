<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
        rel="stylesheet">
    <title>Search by Email</title>
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <input type="text" placeholder="Search User by Email-Id" name="search">
            <button class="btn btn-primary" name="submit">Search</button>
        </form>
        <div class="container my-5">
            <div class="container justify-content-center mt-5">
                <div class="table-responsive" style="max-width: 1300px;">
                    <table class="table mt-4 mb-4">
                        <?php
                        if (isset($_POST['submit'])) {
                            $search = $_POST['search'];
                            $sql = "SELECT *from crud where emailid='$search'";
                            $result = mysqli_query($con, $sql);
                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                    echo '<thead>
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
                                    ';
                                    $row = mysqli_fetch_assoc($result);
                                    $id = $row['id'];
                                    echo '<tbody>
                                    <tr>
                                    <td>' . $id . '</td>
                                    <td>' . $row['firstname'] . '</td>
                                    <td>' . $row['designation'] . '</td>
                                    <td>' . $row['address1'] . '</td>
                                    <td>' . $row['address2'] . '</td>
                                    <td>' . $row['city'] . '</td>
                                    <td>' . $row['state'] . '</td>
                                    <td>' . $row['emailid'] . '</td>
                                     <td>
                                 <button class="btn btn-primary"><a href="update.php?updateid=' . $id . '" 
                                 class="text-light" style="text-decoration:none">Update</a></button>
                                 <button class="btn btn-danger"><a href="delete.php?deleteid=' . $id . '"  
                                 class="text-light"  style="text-decoration:none">Delete</a></button>
                                </td> 
                                    </tr>
                                    </tbody>
                                    ';
                                }
                                else{
                                    echo'<h2 class="text-danger">Data not Found</h2>';
                                }
                            }
                        }

                        ?>





                    </table>
                </div>
            </div>

</body>

</html>