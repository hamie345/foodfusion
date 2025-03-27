<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FoodFusion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>FoodFusion</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="recipes.php">Recipe Collection</a></li>
                <li><a href="community.php">Community Cookbook</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="culinary.php">Culinary Resources</a></li>
                <li><a href="education.php">Educational Resources</a></li>
                <?php if ($_SESSION['user_id']) : ?>
                <li><a href="logout.php">Logout</a></li>
                <?php else : ?>
                <li><a href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
