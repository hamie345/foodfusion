<?php 
session_start();
include 'header.php';
include 'includes/db_connect.php';
?>

<main>
    <h2>Community Cookbook</h2>
    <p>A collaborative space where members can share their favorite recipes, cooking tips, and culinary experiences with the FoodFusion community.</p>

    <section>
        <h3>Share Your Recipe</h3>
        <form action="submit_post.php" method="POST">
            <label for="title">Recipe Title:</label>
            <input type="text" name="title" required>

            <label for="content">Recipe Details:</label>
            <textarea name="content" required></textarea>

            <button type="submit">Submit Recipe</button>
        </form>
    </section>

    <section>
        <h3>Latest Community Recipes</h3>
        
        <?php
        $query = "SELECT * FROM community_posts ORDER BY created_at DESC";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
                echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
                echo "<p><small>Posted on: " . $row['created_at'] . "</small></p>";
                echo "</div>";
            }
        } else {
            echo "<p>No community recipes shared yet. Be the first to post!</p>";
        }
        ?>
    </section>
</main>

<?php include 'footer.php'; ?>
