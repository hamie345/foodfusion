<?php
session_start();
require './header.php';
?>

<main>
    <h2>Culinary Resources</h2>
    <p>Providing downloadable recipe cards, cooking tutorials, and instructional videos on various cooking techniques and kitchen hacks.</p>

    <!-- Recipe Cards Section -->
    <section class="resources">
        <h3>Downloadable Recipe Cards</h3>
        <ul>
            <li><a href="downloads/spaghetti_recipe.pdf" download>Spaghetti Recipe (PDF)</a></li>
            <li><a href="downloads/chicken_curry_recipe.pdf" download>Chicken Curry Recipe (PDF)</a></li>
            <li><a href="downloads/vegan_salad_recipe.pdf" download>Vegan Salad Recipe (PDF)</a></li>
        </ul>
    </section>

    <!-- Cooking Tutorials Section -->
    <section class="tutorials">
        <h3>Cooking Tutorials</h3>
        <p>Learn how to master different cooking techniques with our step-by-step tutorials.</p>
        <ul>
            <li><a href="tutorials/baking_basics.pdf" download>Baking Basics</a></li>
            <li><a href="tutorials/grilling_tips.pdf" download>Grilling Tips</a></li>
            <li><a href="tutorials/sauces_guide.pdf" download>Guide to Making Perfect Sauces</a></li>
        </ul>
    </section>

    <!-- Instructional Videos Section -->
    <section class="videos">
        <h3>Instructional Videos</h3>
        <p>Watch expert chefs demonstrate cooking techniques and kitchen hacks.</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/UB9JHJXWRRg" frameborder="0" allowfullscreen></iframe>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/4aUjBB4YR-k" frameborder="0" allowfullscreen></iframe>
    </section>
</main>

<?php require './footer.php'; ?>
