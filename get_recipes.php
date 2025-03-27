<?php
// Enable strict error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodfusion";

try {
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Construct the SQL query with filters
    $sql = "SELECT * FROM recipes WHERE 1=1";

    // Apply search filter
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = $conn->real_escape_string($_GET['search']);
        $sql .= " AND (title LIKE '%$search%' OR ingredients LIKE '%$search%' OR instructions LIKE '%$search%')";
    }

    // Apply cuisine filter
    if (isset($_GET['cuisine']) && !empty($_GET['cuisine'])) {
        $cuisine = $conn->real_escape_string($_GET['cuisine']);
        $sql .= " AND cuisine = '$cuisine'";
    }

    // Apply dietary filter
    if (isset($_GET['dietary']) && !empty($_GET['dietary'])) {
        $dietary = $conn->real_escape_string($_GET['dietary']);
        $sql .= " AND dietary LIKE '%$dietary%'";
    }

    // Apply difficulty filter
    if (isset($_GET['difficulty']) && !empty($_GET['difficulty'])) {
        $difficulty = $conn->real_escape_string($_GET['difficulty']);
        $sql .= " AND difficulty = '$difficulty'";
    }

    $result = $conn->query($sql);

    $recipes = array(); // Initialize an empty array

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $recipes[] = $row; // Append each row to the array
        }
    }

    // Set content type to JSON
    header('Content-Type: application/json');
    echo json_encode($recipes); // Convert the array to JSON and output it

} catch (Exception $e) {
    error_log("Error fetching recipes: " . $e->getMessage());
    header('Content-Type: application/json');
    echo json_encode(array('error' => 'Failed to fetch recipes. Please try again.'));
} finally {
    if ($conn) {
        $conn->close();
    }
}