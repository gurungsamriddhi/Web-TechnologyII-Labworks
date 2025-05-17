<?php
//define error variables 
$idErr = $passwordErr = $firstnameErr = $addressErr = $countryErr = $zipcodeErr = $emailErr = $genderErr = $languageErr = "";
$id = $password = $firstname = $address = $country = $zipcode = $email = $gender = $about = "";
$language = [];
$servername = "localhost";
$username = "root"; // or your DB username
$password_db = "";  // or your DB password
$dbname = "userdb";

// Create connection
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$servername = "localhost";
$username = "root"; // or your DB username
$password_db = "";  // or your DB password
$dbname = "userdb";

// Create connection
$conn = new mysqli($servername, $username, $password_db, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function input_data($data)
{
    //remove spaces slashesspecial symbols 
    $data = trim($data);
    $data = stripslashes($data);
    $Data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate User ID
    if (empty($_POST["id"])) {
        $idErr = "User ID is required.";
    } else {
        $id = input_data($_POST["id"]);
        if (strlen($id) < 5 || strlen($id) > 12) {
            $idErr = "User ID must be between 5 and 12 characters.";
        }
    }

    // Validate Password
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required.";
    } else {
        $password = input_data($_POST["password"]);
        if (strlen($password) < 7 || strlen($password) > 12) {
            $passwordErr = "Password must be between 7 and 12 characters.";
        }
    }

    // Validate First Name
    if (empty($_POST["firstname"])) {
        $firstnameErr = "First name is required.";
    } else {
        $firstname = input_data($_POST["firstname"]);
        if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
            $firstnameErr = "Only Alphabets and white space are allowed.";
        }
    }

    // Validate Address
    if (empty($_POST["address"])) {
        $addressErr = "Address is required.";
    } else {
        $address = input_data($_POST["address"]);
        if (!preg_match("/^[a-zA-Z0-9\s]+$/", $address)) {
            $addressErr = "Only letters, numbers, and spaces are allowed.";
        }
    }


    // Validate Country
    if (empty($_POST["country"])) {
        $countryErr = "Country is required.";
    } else {
        $country = input_data($_POST["country"]);
    }

    // Validate ZIP Code
    if (empty($_POST["zipcode"])) {
        $zipcodeErr = "ZIP code is required.";
    } else {
        $zipcode = input_data($_POST["zipcode"]);
        if (!preg_match("/^[0-9]+$/", $zipcode)) {
            $zipcodeErr = "ZIP code must contain only numbers.";
        }
    }


    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required.";
    } else {
        $email = input_data($_POST["email"]);
        if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)) {
            $emailErr = "Invalid email format.";
        }
    }


    // Validate gender
    if (empty($_POST["gender"])) {
        $genderErr = "Please select a gender.";
    } else {
        $gender = input_data($_POST["gender"]);
    }

    // Validate Language
    if (isset($_POST["language"]) && is_array($_POST["language"]) && !empty($_POST["language"])) {
        // Sanitize the selected languages
        $language = array_map('htmlspecialchars', $_POST["language"]);
    } else {
        // If no languages are selected, set it to an empty array
        $language = [];
    }

    // Validation for language (Ensure at least one language is selected)
    if (empty($language)) {
        $languageErr = "Please select at least one language.";
    }


    // About (optional)
    if (!empty($_POST["about"])) {
        $about = input_data($_POST["about"]);
    } else {
        $about = "User's too lazy to write an about."; // You can handle a default value if it's empty
    }

    if (
        empty($idErr) && empty($passwordErr) && empty($firstnameErr) && empty($addressErr) &&
        empty($countryErr) && empty($zipcodeErr) && empty($emailErr) &&
        empty($genderErr) && empty($languageErr)
    ) {
        // Convert languages to comma-separated string
        $language_str = implode(", ", $language);
    
        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (user_id, password, firstname, address, country, zipcode, email, gender, language, about) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
        $stmt->bind_param("ssssssssss", $id, $password, $firstname, $address, $country, $zipcode, $email, $gender, $language_str, $about);
    
        if ($stmt->execute()) {
            echo "<script>alert('Form submitted successfully and saved to the database.');</script>";
        } else {
            echo "<script>alert('Database error: " . $stmt->error . "');</script>";
        }
    
        $stmt->close();
    }
    
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Registration Form</title>
    <style>
        .registrationform {
            max-width: 800px;
            margin: 40px auto;
            padding: 30px;
            border: 1px solid #ccc;
            font-family: Arial, sans-serif;
        }

        .form-row {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .form-row label {
            width: 150px;
            margin-right: 15px;
        }

        .form-row input[type="text"],
        .form-row input[type="email"],
        .form-row select,
        .form-row textarea {
            width: 200px;
            padding: 6px;
        }

        .error {
            color: red;
            margin-left: 15px;
            white-space: nowrap;
        }

        .radio-group,
        .checkbox-group {
            display: flex;
            flex-direction: column;
        }



        .form-row textarea {
            width: 100%;
            height: 100px;
        }

        input[type="submit"] {
            background-color: rgb(24, 119, 242);
            color: white;
            font-size: larger;
            padding: 10px 20px;
            cursor: pointer;
            border: none;
            border-radius: 10px;

        }

        .form-row:last-child {
            justify-content: center;
        }
    </style>
</head>

<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="registrationform"><!--action parameter used which means form validation will be handled on the same file  -->
        <h2>Registration Form</h2>
        <p>Use tab keys to move from one input field to the next.</p>

        <div class="form-row">
            <label>User ID:</label>
            <input type="text" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <label class="error"><?php echo $idErr; ?></label>
        </div>



        <div class="form-row">
            <label>Password:</label>
            <input type="text" name="password" value="<?php echo htmlspecialchars($password); ?>">
            <label class="error"><?php echo $passwordErr; ?></label>
        </div>

        <div class="form-row">
            <label>First Name:</label>
            <input type="text" name="firstname" value="<?php echo htmlspecialchars($firstname); ?>">
            <label class="error"><?php echo $firstnameErr; ?></label>
        </div>

        <div class="form-row">
            <label>Address:</label>
            <input type="text" name="address" value="<?php echo htmlspecialchars($address); ?>">
            <label class="error"><?php echo $addressErr; ?></label>
        </div>

        <div class="form-row">
            <label>Country:</label>
            <select name="country">
                <option value="">-- Select Country --</option>
                <option value="Afghanistan" <?php if ($country == 'Afghanistan') echo 'selected'; ?>>Afghanistan</option>
                <option value="India" <?php if ($country == 'India') echo 'selected'; ?>>India</option>
                <option value="Nepal" <?php if ($country == 'Nepal') echo 'selected'; ?>>Nepal</option>
                <option value="China" <?php if ($country == 'China') echo 'selected'; ?>>China</option>
            </select>
            <label class="error"><?php echo $countryErr; ?></label>
        </div>

        <div class="form-row">
            <label>ZIP Code:</label>
            <input type="text" name="zipcode" value="<?php echo htmlspecialchars($zipcode); ?>">
            <label class="error"><?php echo $zipcodeErr; ?></label>
        </div>

        <div class="form-row">
            <label>Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <label class="error"><?php echo $emailErr; ?></label>
        </div>

        <div class="form-row">
            <label>Gender:</label>
            <div class="radio-group">
                <label><input type="radio" name="gender" value="Male" <?php if ($gender == 'Male') echo 'checked'; ?>> Male</label>
                <label><input type="radio" name="gender" value="Female" <?php if ($gender == 'Female') echo 'checked'; ?>> Female</label>
                <label><input type="radio" name="gender" value="Other" <?php if ($gender == 'Other') echo 'checked'; ?>> Other</label>
                <label><input type="radio" name="gender" value="Prefernottosay" <?php if ($gender == 'Prefernottossay') echo 'checked'; ?>>Prefer not to say</label>
            </div>
            <label class="error"><?php echo $genderErr; ?></label>
        </div>

        <div class="form-row">
            <label>Language:</label>
            <div class="checkbox-group">
                <label><input type="checkbox" name="language[]" value="English" <?php if (in_array('English', $language)) echo 'checked'; ?>> English</label>
                <label><input type="checkbox" name="language[]" value="Hindi" <?php if (in_array('Hindi', $language)) echo 'checked'; ?>> Hindi</label>
                <label><input type="checkbox" name="language[]" value="Nepali" <?php if (in_array('Nepali', $language)) echo 'checked'; ?>> Nepali</label>
                <label><input type="checkbox" name="language[]" value="French" <?php if (in_array('French', $language)) echo 'checked'; ?>> French</label>

            </div>
            <label class="error"><?php echo $languageErr; ?></label>
        </div>

        <div class="form-row">
            <label>About:</label>
            <textarea name="about" placeholder="Write about yourself..." value="<?php echo htmlspecialchars($about); ?>"></textarea>


        </div>

        <div class="form-row">
            <input type="submit" name="submit" value="Submit">
        </div>
    </form>

</body>

</html>