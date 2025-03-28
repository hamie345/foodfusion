<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodfusion";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if database exists
$db_check_query = "SHOW DATABASES LIKE '$dbname'";
$db_check_result = $conn->query($db_check_query);

if ($db_check_result->num_rows == 0) {
    // Database does not exist, create it
    $create_db_query = "CREATE DATABASE $dbname";
    if ($conn->query($create_db_query) === TRUE) {
        echo "Database created successfully\n";
    } else {
        die("Error creating database: " . $conn->error . "\n");
    }
} else {
    echo "Database already exists\n";
}

// Select the database
$conn->select_db($dbname);

// Check if recipes table exists
$table_check_query = "SHOW TABLES LIKE 'recipes'";
$table_check_result = $conn->query($table_check_query);

if ($table_check_result->num_rows == 0) {
    // Create recipes table
    $create_table_sql = "CREATE TABLE `recipes` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `title` varchar(255) NOT NULL,
        `cuisine` varchar(50) NOT NULL,
        `dietary` varchar(50) DEFAULT NULL,
        `difficulty` varchar(50) NOT NULL,
        `ingredients` text NOT NULL,
        `instructions` text NOT NULL,
        `image_url` varchar(255) DEFAULT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci";

    if ($conn->query($create_table_sql) === TRUE) {
        echo "Table 'recipes' created successfully\n";
    } else {
        die("Error creating table: " . $conn->error . "\n");
    }

    // Populate recipes table
    $populate_table_sql = "INSERT INTO `recipes` (`id`, `title`, `cuisine`, `dietary`, `difficulty`, `ingredients`, `instructions`, `image_url`) VALUES
    (1, 'Classic Margherita Pizza', 'Italian', 'Vegetarian', 'Easy', 'Pizza dough, Tomato sauce, Mozzarella cheese, Basil leaves, Olive oil', '1. Preheat oven. 2. Spread sauce on dough. 3. Add cheese and basil. 4. Bake until golden.', './assets/images/bg-1.jpg'),
    (2, 'Spicy Chicken Tacos', 'Mexican', NULL, 'Medium', 'Chicken breast, Taco shells, Salsa, Avocado, Cheddar cheese', '1. Cook chicken and shred. 2. Fill taco shells with chicken and toppings. 3. Serve.', './assets/images/bg2.jpg'),
    (3, 'Vegetable Curry', 'Indian', 'Vegan, Gluten-Free', 'Medium', 'Mixed vegetables, Coconut milk, Curry powder, Rice', '1. Sauté vegetables. 2. Add curry powder and coconut milk. 3. Simmer and serve with rice.', './assets/images/bg-3.jpg'),
    (4, 'Kung Pao Chicken', 'Chinese', NULL, 'Medium', 'Chicken, Peanuts, Chili peppers, Soy sauce, Rice vinegar', '1. Marinate chicken. 2. Stir-fry with peppers and peanuts. 3. Add sauce and serve with rice.', './assets/images/bg-1.jpg'),
    (5, 'French Onion Soup', 'French', 'Vegetarian', 'Hard', 'Onions, Beef broth, Bread, Gruyere cheese', '1. Caramelize onions. 2. Add broth and simmer. 3. Top with bread and cheese and broil.', './assets/images/bg2.jpg')";

    if ($conn->query($populate_table_sql) === TRUE) {
        echo "Table 'recipes' populated successfully\n";
    } else {
        die("Error populating table: " . $conn->error . "\n");
    }
} else {
    echo "Table 'recipes' already exists\n";
}

$conn->close();

echo '<script>setTimeout(function() {
    location.href = "home.php";
}, 2000);</script>';