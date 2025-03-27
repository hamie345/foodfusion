<?php
// Enable strict error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start(); // Start the session

// Function to sanitize form data
function sanitize($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];

    // Validate input (basic validation)
    if (empty($email) || empty($password)) {
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Email and password are required'));
        exit;
    }

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $dbpassword = ""; // Database password
    $dbname = "foodfusion";

    try {
        $conn = new mysqli($servername, $username, $dbpassword, $dbname);

        // Check connection
        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        // Prepare and execute the query to fetch user data
        $stmt = $conn->prepare("SELECT id, password, failed_attempt, last_attempt FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Check for account lockout
            $failed_attempt = $user['failed_attempt'];
            $last_attempt = strtotime($user['last_attempt']);
            $lockout_duration = 60; // 1 minute lockout

            if ($failed_attempt >= 3 && (time() - $last_attempt) < $lockout_duration) {
                $remaining_time = $lockout_duration - (time() - $last_attempt);
                header('Content-Type: application/json');
                echo json_encode(array('success' => false, 'message' => 'Account locked. Please try again after ' . $remaining_time . ' seconds.'));
                exit;
            }

            // Verify password
            if (password_verify($password, $user['password'])) {
                // Password is correct, reset failed attempts
                $stmt = $conn->prepare("UPDATE users SET failed_attempt = 0 WHERE id = ?");
                $stmt->bind_param("i", $user['id']);
                $stmt->execute();

                // Set session variables (example)
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['email'] = $email;

                header('Content-Type: application/json');
                echo json_encode(array('success' => true, 'message' => 'Login successful'));
                exit;
            } else {
                // Invalid password, increment failed attempts
                $new_failed_attempt = $failed_attempt + 1;
                $stmt = $conn->prepare("UPDATE users SET failed_attempt = ?, last_attempt = NOW() WHERE id = ?");
                $stmt->bind_param("ii", $new_failed_attempt, $user['id']);
                $stmt->execute();

                header('Content-Type: application/json');
                echo json_encode(array('success' => false, 'message' => 'Invalid email or password. ' . (3 - $new_failed_attempt) . ' attempts remaining.'));
                exit;
            }
        } else {
            // No user found
            header('Content-Type: application/json');
            echo json_encode(array('success' => false, 'message' => 'Invalid email or password.'));
            exit;
        }
    } catch (Exception $e) {
        error_log("Login error: " . $e->getMessage());
        header('Content-Type: application/json');
        echo json_encode(array('success' => false, 'message' => 'Login failed. Please try again.'));
        exit;
    } finally {
        if ($conn) {
            $conn->close();
        }
    }
} else {
    // If the form is not submitted correctly, return an error
    header('Content-Type: application/json');
    echo json_encode(array('success' => false, 'message' => 'Invalid request'));
    exit;
}
