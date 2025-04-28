<?php
// Enable strict error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the form is submitted and the action is 'register'
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['action']) && $_GET['action'] == 'register') {

    // Function to sanitize form data
    function sanitize($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Collect and sanitize form data
    $firstname = sanitize($_POST['firstname']);
    $lastname = sanitize($_POST['lastname']);
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];
    $passwordConfirmation = $_POST['passwordConfirmation'];

    // Array to store errors
    $errors = [];

    // Validate First Name
    if (empty($firstname)) {
        $errors['firstname'] = "First name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $firstname)) {
        $errors['firstname'] = "Only letters and white space allowed in first name";
    }

    // Validate Last Name
    if (empty($lastname)) {
        $errors['lastname'] = "Last name is required";
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $lastname)) {
        $errors['lastname'] = "Only letters and white space allowed in last name";
    }

    // Validate Email
    if (empty($email)) {
        $errors['email'] = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format";
    }

    // Validate Password
    if (empty($password)) {
        $errors['password'] = "Password is required";
    } elseif (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long";
    }

    // Validate Password Confirmation
    if (empty($passwordConfirmation)) {
        $errors['passwordConfirmation'] = "Password confirmation is required";
    } elseif ($password !== $passwordConfirmation) {
        $errors['passwordConfirmation'] = "Passwords do not match";
    }

    // If there are no errors, proceed with registration
    if (empty($errors)) {
        // Hash the password before storing it in the database
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Connect to the database (replace with your credentials)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "foodfusion";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Prepare and bind the SQL statement
        $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, failed_attempt) VALUES (?, ?, ?, ?, ?)");
        $failed_attempt = 0;  // Set the default value for failed_attempt
        $stmt->bind_param("ssssi", $firstname, $lastname, $email, $hashed_password, $failed_attempt);

        // Execute the statement
        if ($stmt->execute()) {
            $message = "Registration successful";

            // set content type to JSON
            header('Content-Type: application/json');

            echo json_encode(array('success' => true, 'message' =>   $message));
        } else {
            $success = false;
            $message =  'Caught exception: ' .  $e->getMessage() . "\n";

            // set content type to JSON
            header('Content-Type: application/json');

            echo json_encode(array('success' => $success, 'message' =>   $message));
        }

        // Close connection
        $stmt->close();
        $conn->close();
    } else {
        // If there are errors, return them as a JSON response
        header('Content-Type: application/json');
        echo json_encode($errors);
    }
} else {
    // If the form is not submitted correctly, return an error
    echo "Invalid request";
}
