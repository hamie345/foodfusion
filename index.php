<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodfusion";

// Create a connection to the MySQL server
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the database exists
$db_check_query = "SHOW DATABASES LIKE '$dbname'";
$db_check_result = $conn->query($db_check_query);

if ($db_check_result->num_rows == 0) {
    // Create the database
    $create_db_query = "CREATE DATABASE $dbname";
    if ($conn->query($create_db_query) === TRUE) {
        echo "Database '$dbname' created successfully.<br>";
    } else {
        die("Error creating database: " . $conn->error);
    }
} else {
    echo "Database '$dbname' already exists.<br>";
}

// Select the database
$conn->select_db($dbname);

// Function to check if a table exists
function tableExists($conn, $tableName)
{
    $query = "SHOW TABLES LIKE '$tableName'";
    $result = $conn->query($query);
    return $result->num_rows > 0;
}

// Create `users` table
if (!tableExists($conn, "users")) {
    $create_users_table = "
        CREATE TABLE `users` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `first_name` varchar(50) NOT NULL,
            `last_name` varchar(50) NOT NULL,
            `email` varchar(100) NOT NULL,
            `password` varchar(255) NOT NULL,
            `failed_attempt` varchar(255) NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
            `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";
    if ($conn->query($create_users_table) === TRUE) {
        echo "Table 'users' created successfully.<br>";
    } else {
        die("Error creating table 'users': " . $conn->error);
    }
} else {
    echo "Table 'users' already exists.<br>";
}

// Create `contacts` table
if (!tableExists($conn, "contacts")) {
    $create_contacts_table = "
        CREATE TABLE `contacts` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(50) NOT NULL,
            `email` varchar(50) NOT NULL,
            `message` text NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
            `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";
    if ($conn->query($create_contacts_table) === TRUE) {
        echo "Table 'contacts' created successfully.<br>";
    } else {
        die("Error creating table 'contacts': " . $conn->error);
    }
} else {
    echo "Table 'contacts' already exists.<br>";
}

// Create `rating` table
if (!tableExists($conn, "rating")) {
    $create_rating_table = "
        CREATE TABLE `rating` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `user_id` int(11) NOT NULL,
            `name` varchar(50) NOT NULL,
            `rate` varchar(100) NOT NULL,
            `comment` text NOT NULL,
            `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
            `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
            PRIMARY KEY (`id`),
            FOREIGN KEY (`user_id`) REFERENCES users(`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";
    if ($conn->query($create_rating_table) === TRUE) {
        echo "Table 'rating' created successfully.<br>";
    } else {
        die("Error creating table 'rating': " . $conn->error);
    }
} else {
    echo "Table 'rating' already exists.<br>";
}

// Create `recipes` table and populate it
if (!tableExists($conn, "recipes")) {
    $create_recipes_table = "
        CREATE TABLE `recipes` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `title` varchar(255) NOT NULL,
            `cuisine` varchar(50) NOT NULL,
            `dietary` varchar(50) DEFAULT NULL,
            `difficulty` varchar(50) NOT NULL,
            `ingredients` text NOT NULL,
            `instructions` text NOT NULL,
            `image_url` varchar(255) DEFAULT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
    ";
    if ($conn->query($create_recipes_table) === TRUE) {
        echo "Table 'recipes' created successfully.<br>";

        // Populate the `recipes` table
        $populate_recipes_table = "
            INSERT INTO `recipes` (`id`, `title`, `cuisine`, `dietary`, `difficulty`, `ingredients`, `instructions`, `image_url`) VALUES
            (1, 'Classic Margherita Pizza', 'Italian', 'Vegetarian', 'Easy', 'Pizza dough, Tomato sauce, Mozzarella cheese, Basil leaves, Olive oil', '1. Preheat oven. 2. Spread sauce on dough. 3. Add cheese and basil. 4. Bake until golden.', './assets/images/bg-1.jpg'),
            (2, 'Spicy Chicken Tacos', 'Mexican', NULL, 'Medium', 'Chicken breast, Taco shells, Salsa, Avocado, Cheddar cheese', '1. Cook chicken and shred. 2. Fill taco shells with chicken and toppings. 3. Serve.', './assets/images/bg2.jpg'),
            (3, 'Vegetable Curry', 'Indian', 'Vegan, Gluten-Free', 'Medium', 'Mixed vegetables, Coconut milk, Curry powder, Rice', '1. Sauté vegetables. 2. Add curry powder and coconut milk. 3. Simmer and serve with rice.', './assets/images/bg-3.jpg'),
            (4, 'Kung Pao Chicken', 'Chinese', NULL, 'Medium', 'Chicken, Peanuts, Chili peppers, Soy sauce, Rice vinegar', '1. Marinate chicken. 2. Stir-fry with peppers and peanuts. 3. Add sauce and serve with rice.', './assets/images/bg-1.jpg'),
            (5, 'French Onion Soup', 'French', 'Vegetarian', 'Hard', 'Onions, Beef broth, Bread, Gruyere cheese', '1. Caramelize onions. 2. Add broth and simmer. 3. Top with bread and cheese and broil.', './assets/images/bg2.jpg');
        ";
        if ($conn->query($populate_recipes_table) === TRUE) {
            echo "Table 'recipes' populated successfully.<br>";
        } else {
            die("Error populating table 'recipes': " . $conn->error);
        }
    } else {
        die("Error creating table 'recipes': " . $conn->error);
    }
} else {
    echo "Table 'recipes' already exists.<br>";
}

// Close the connection
$conn->close();

// Wait for 3 seconds before redirecting
echo "<script>
    setTimeout(function() {
        window.location.href = 'home.php';
    }, 3000);
</script>";
exit();