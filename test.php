<?php
// Initialize variables and errors
$errors = [];
$id = $password = $firstname = $address = $country = $zipcode = $email = $sex = $about = "";
$language = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    if (empty($_POST["id"])) {
        $errors['id'] = "User ID is required.";
    } else {
        $id = clean_input($_POST["id"]);
        if (strlen($id) < 5 || strlen($id) > 12) {
            $errors['id'] = "User ID must be between 5 and 12 characters.";
        }
    }

    if (empty($_POST["password"])) {
        $errors['password'] = "Password is required.";
    } else {
        $password = clean_input($_POST["password"]);
    }

    if (empty($_POST["firstname"])) {
        $errors['firstname'] = "First name is required.";
    } else {
        $firstname = clean_input($_POST["firstname"]);
    }

    if (empty($_POST["address"])) {
        $errors['address'] = "Address is required.";
    } else {
        $address = clean_input($_POST["address"]);
    }

    if (empty($_POST["country"])) {
        $errors['country'] = "Country is required.";
    } else {
        $country = clean_input($_POST["country"]);
    }

    if (empty($_POST["zipcode"])) {
        $errors['zipcode'] = "ZIP code is required.";
    } else {
        $zipcode = clean_input($_POST["zipcode"]);
    }

    if (empty($_POST["email"])) {
        $errors['email'] = "Email is required.";
    } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    } else {
        $email = clean_input($_POST["email"]);
    }

    if (empty($_POST["sex"])) {
        $errors['sex'] = "Please select a gender.";
    } else {
        $sex = clean_input($_POST["sex"]);
    }

    if (!empty($_POST["language"])) {
        $language = $_POST["language"];
    }

    if (!empty($_POST["about"])) {
        $about = clean_input($_POST["about"]);
    }

    if (empty($errors)) {
        echo "<div style='color: green; text-align: center;'>Form submitted successfully!</div>";
        // Here you could save to database
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
            margin-right: 10px;
        }

        .form-row input[type="text"],
        .form-row input[type="email"],
        .form-row select,
        .form-row textarea {
            flex: 1;
            padding: 6px;
        }

        .error {
            color: red;
            margin-left: 10px;
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
            padding: 10px 20px;
            cursor: pointer;
        }
    </style>
</head>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="registrationform">
    <h2>Registration Form</h2>
    <p>Use tab keys to move from one input field to the next.</p>

    <div class="form-row">
        <label>User ID:</label>
        <input type="text" name="id" value="<?php echo $id; ?>" required>
        <span class="error"><?php echo $errors['id'] ?? ''; ?></span>
    </div>

    <div class="form-row">
        <label>Password:</label>
        <input type="text" name="password" value="<?php echo $password; ?>" required>
        <span class="error"><?php echo $errors['password'] ?? ''; ?></span>
    </div>

    <div class="form-row">
        <label>First Name:</label>
        <input type="text" name="firstname" value="<?php echo $firstname; ?>" required>
        <span class="error"><?php echo $errors['firstname'] ?? ''; ?></span>
    </div>

    <div class="form-row">
        <label>Address:</label>
        <input type="text" name="address" value="<?php echo $address; ?>" required>
        <span class="error"><?php echo $errors['address'] ?? ''; ?></span>
    </div>

    <div class="form-row">
        <label>Country:</label>
        <select name="country" required>
            <option value="">-- Select Country --</option>
            <option value="Afghanistan" <?php if ($country == "Afghanistan") echo "selected"; ?>>Afghanistan</option>
            <option value="India" <?php if ($country == "India") echo "selected"; ?>>India</option>
            <option value="Nepal" <?php if ($country == "Nepal") echo "selected"; ?>>Nepal</option>
            <option value="China" <?php if ($country == "China") echo "selected"; ?>>China</option>
        </select>
        <span class="error"><?php echo $errors['country'] ?? ''; ?></span>
    </div>

    <div class="form-row">
        <label>ZIP Code:</label>
        <input type="text" name="zipcode" value="<?php echo $zipcode; ?>" required>
        <span class="error"><?php echo $errors['zipcode'] ?? ''; ?></span>
    </div>

    <div class="form-row">
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $email; ?>" required>
        <span class="error"><?php echo $errors['email'] ?? ''; ?></span>
    </div>

    <div class="form-row">
        <label>Sex:</label>
        <div class="radio-group">
            <label><input type="radio" name="sex" value="Male" <?php if ($sex == "Male") echo "checked"; ?>> Male</label>
            <label><input type="radio" name="sex" value="Female" <?php if ($sex == "Female") echo "checked"; ?>> Female</label>
            <label><input type="radio" name="sex" value="Other" <?php if ($sex == "Other") echo "checked"; ?>> Other</label>
            <label><input type="radio" name="sex" value="Prefer not to say" <?php if ($sex == "Prefer not to say") echo "checked"; ?>> Prefer not to say</label>
        </div>
        <span class="error"><?php echo $errors['sex'] ?? ''; ?></span>
    </div>

    <div class="form-row">
        <label>Language:</label>
        <div class="checkbox-group">
            <label><input type="checkbox" name="language[]" value="English" <?php if (in_array("English", $language)) echo "checked"; ?>> English</label>
            <label><input type="checkbox" name="language[]" value="Hindi" <?php if (in_array("Hindi", $language)) echo "checked"; ?>> Hindi</label>
            <label><input type="checkbox" name="language[]" value="Nepali" <?php if (in_array("Nepali", $language)) echo "checked"; ?>> Nepali</label>
            <label><input type="checkbox" name="language[]" value="French" <?php if (in_array("French", $language)) echo "checked"; ?>> French</label>
        </div>
        <span class="error"><?php echo $errors['language'] ?? ''; ?></span>
    </div>

    <div class="form-row">
        <label>About:</label>
        <textarea name="about"><?php echo $about; ?></textarea>
        <span class="error"><?php echo $errors['about'] ?? ''; ?></span>
    </div>

    <div class="form-row">
        <label></label>
        <input type="submit" value="Submit">
    </div>
</form>

</body>
</html>

