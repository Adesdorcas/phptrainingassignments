<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Simple Form</title>
</head>
<body>
    <h1>Simple Form</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" required><br><br>
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" required><br><br>
        
        <label for="other_names">Other Names:</label>
        <input type="text" id="other_names" name="other_names"><br><br>
        
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required><br><br>
        
        <label for="gender">Gender:</label>
        <select id="gender" name="gender" required>
            <option value="">Select</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>
        
        <input type="submit" value="Submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $errors = [];
        
        $first_name = clean_input($_POST["first_name"]);
        $last_name = clean_input($_POST["last_name"]);
        $other_names = clean_input($_POST["other_names"]);
        $email = clean_input($_POST["email"]);
        $phone = clean_input($_POST["phone"]);
        $gender = clean_input($_POST["gender"]);
        
        if (empty($first_name) || empty($last_name)) {
            $errors[] = "First name and last name are required";
        }

        if (strlen($first_name) < 1) {
            $errors[] = "First name cannot be less than 1 character";
        }

        if (!empty($other_names) && !preg_match("/^[a-zA-Z ]*$/", $other_names)) {
            $errors[] = "Other names can only contain letters and spaces";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format";
        }

        if (!preg_match("/^[0-9]{10}$/", $phone)) {
            $errors[] = "Phone number must be 10 digits";
        }

        if (empty($gender)) {
            $errors[] = "Gender is required";
        }

        if (empty($errors)) {
            $data = [
                'first_name' => $first_name,
                'last_name' => $last_name,
                'other_names' => $other_names,
                'email' => $email,
                'phone' => $phone,
                'gender' => $gender
            ];

            $json_data = json_encode($data, JSON_PRETTY_PRINT);
            file_put_contents('database.json', $json_data);

            echo "<p>Data submitted successfully!</p>";
        } else {
            echo "<ul>";
            foreach ($errors as $errors) {
                echo "<li>$errors</li>";
            }
            echo "</ul>";
        }
    }

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>
</body>
</html>
