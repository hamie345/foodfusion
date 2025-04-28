<?php
// Database connection
$host = 'localhost';
$dbname = 'foodfusion';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize and validate input data
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_SPECIAL_CHARS);

    $errors = [];

    if (empty($name)) {
        $errors[] = "Name is required.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }

    if (empty($message)) {
        $errors[] = "Message is required.";
    }

    if (empty($errors)) {
        // Insert data into the database
        $sql = "INSERT INTO contacts (`name`, `email`, `message`) VALUES (:name, :email, :message)";
        $stmt = $pdo->prepare($sql);

        try {
            $stmt->execute([
                ':name' => $name,
                ':email' => $email,
                ':message' => $message
            ]);

            echo '<script>window.location.href = "success.php"</script>';

            // echo "Thank you for your message! We will get back to you soon. <br> <p>Go back home</p> <br> <a href='http://localhost/foodfusion/home.php'>Home</a>";
        } catch (PDOException $e) {
            echo "Failed to submit your message. Please try again later.";
        }
    } else {
        // Display validation errors
        foreach ($errors as $error) {
            echo "<p style='color: red;'>$error</p>";
        }
    }
}
