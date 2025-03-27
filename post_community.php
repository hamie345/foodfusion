<?php
session_start();
include './db_connect.php';

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to post.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $user_id = $_SESSION['user_id'];

    // Insert post into database
    $stmt = $conn->prepare("INSERT INTO community_posts (user_id, title, content) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $title, $content);

    if ($stmt->execute()) {
        header("Location: community.php");
    } else {
        echo "Error posting.";
    }

    $stmt->close();
    $conn->close();
}
?>
