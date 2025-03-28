<?php
session_start();
?>
<nav class="navbar">
    <div class="logo">FoodFusion</div>
    <div class="toggle-menu">
        <i class="fas fa-bars"></i>
    </div>
    <ul class="nav-links">
        <li><a href="home.php">Home</a></li>
        <li><a href="about.php">About Us</a></li>
        <li><a href="recipes.php">Recipe Collection</a></li>
        <li><a href="#resources">Resources</a></li>
        <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <?php if (isset($_SESSION['user_id'])): ?>
        <form action="logout.php" method="POST" style="display: inline;">
            <button type="submit" class="logout-btn">Logout</button>
        </form>
    <?php else: ?>
        <button class="join-us-btn">Join Us</button>
    <?php endif; ?>
</nav>