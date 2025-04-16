<style>
    /* Recipe Collection Styles */
    .recipe-collection {
        padding: 30px 20px;
    }

    /* Recipe Filter Styles */
    .recipe-filter {
        background-color: #f8f8f8;
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }

    .recipe-filter h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #512da8;
        text-align: center;
    }

    .filter-form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .filter-form .form-group {
        display: flex;
        flex-direction: column;
    }

    .filter-form label {
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 5px;
    }

    .filter-form input[type="text"],
    .filter-form select {
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .filter-form input[type="text"]:focus,
    .filter-form select:focus {
        outline: none;
        border-color: #9575cd;
    }

    .apply-filters-btn {
        background-color: #512da8;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 12px 30px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .apply-filters-btn:hover {
        background-color: #311b92;
    }

    /* Recipe Listing Styles (Placeholder) */
    .recipe-listing {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .recipe-card img {
        width: 100%;
        max-height: 200px;
        height: 150px;
        object-fit: cover;
        border-radius: 5px;
    }


    /* Subscription Section */
    .subscription-section {
        background: rgba(103, 58, 183, 0.6);
        -webkit-backdrop-filter: blur(10px);
        backdrop-filter: blur(10px);
        padding: 50px 20px;
        text-align: center;
        color: white;
        margin-top: 50px;
    }

    .subscription-container {
        max-width: 700px;
        margin: 0 auto;
    }

    .subscription-section h2 {
        font-size: 2.5rem;
        margin-bottom: 20px;
    }

    .subscription-section p {
        font-size: 1.2rem;
        margin-bottom: 30px;
    }

    .subscription-form {
        display: flex;
        justify-content: center;
        gap: 10px;
    }

    .subscription-form input[type="email"] {
        padding: 12px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1.1rem;
        width: 300px;
        transition: border 0.3s ease;
    }

    .subscription-form input[type="email"]:focus {
        outline: none;
        border-radius: 5px;
        border: 2px solid;
        border-image: linear-gradient(to right, #673ab7, #9c27b0, #e91e63);
        border-image-slice: 1;
    }

    /* Subscribe Button */
    .subscribe-btn {
        background-color: #673ab7;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 12px 30px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .subscribe-btn:hover {
        background-color: #512da8;
    }
</style>

<section class="recipe-collection">
    <!-- Recipe Filtering Section -->
    <?php

    $get = $_GET['recipes'] ?? '';

    if (is_numeric($get)) {
        $headings = 'Recipe Rating';
        require './assets/partials/badge-2.php';
        require './assets/partials/rating-page.php';
    } else {
        require './assets/partials/badge.php';
    ?>
        <div class="recipe-filter">
            <h2>Filter Recipes</h2>
            <div class="filter-form">
                <!-- Search Input -->
                <div class="form-group">
                    <label for="search">Search</label>
                    <input type="text" id="search" name="search" placeholder="Search Recipes...">
                </div>

                <!-- Cuisine Type Filter -->
                <div class="form-group">
                    <label for="cuisine">Cuisine</label>
                    <select id="cuisine" name="cuisine">
                        <option value="">All</option>
                        <option value="italian">Italian</option>
                        <option value="mexican">Mexican</option>
                        <option value="indian">Indian</option>
                        <option value="chinese">Chinese</option>
                        <option value="french">French</option>
                    </select>
                </div>

                <!-- Dietary Preferences Filter -->
                <div class="form-group">
                    <label for="dietary">Dietary</label>
                    <select id="dietary" name="dietary">
                        <option value="">All</option>
                        <option value="vegetarian">Vegetarian</option>
                        <option value="vegan">Vegan</option>
                        <option value="gluten-free">Gluten-Free</option>
                        <option value="dairy-free">Dairy-Free</option>
                    </select>
                </div>

                <!-- Cooking Difficulty Filter -->
                <div class="form-group">
                    <label for="difficulty">Difficulty</label>
                    <select id="difficulty" name="difficulty">
                        <option value="">All</option>
                        <option value="easy">Easy</option>
                        <option value="medium">Medium</option>
                        <option value="hard">Hard</option>
                    </select>
                </div>

                <!-- Apply Filters Button -->
                <button class="apply-filters-btn">Apply Filters</button>
            </div>
        </div>

        <!-- Recipe Listing Section (Placeholder for Recipe Cards) -->
        <div class="recipe-listing">
        </div>

    <?php
    }
    ?>

</section>

<section class="subscription-section">
    <div class="subscription-container">
        <h2>Subscribe to Our Newsletter</h2>
        <p>Stay updated with the latest recipes, culinary tips, and cooking inspiration!</p>
        <div class="subscription-form">
            <input type="email" placeholder="Enter your email" id="subscribe-email">
            <button class="subscribe-btn">Subscribe</button>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const recipeListing = $('.recipe-listing');

        // Function to fetch and display recipes
        function loadRecipes(filters) {
            $.ajax({
                url: 'get_recipes.php',
                type: 'GET',
                data: filters,
                dataType: 'json',
                success: function(data) {
                    // Clear existing recipes
                    recipeListing.empty();

                    // Display recipes
                    if (data.length > 0) {
                        $.each(data, function(index, recipe) {
                            var recipeCard = `
                            <div class="recipe-card">
                                <img src="${recipe.image_url}" alt="${recipe.title}">
                                <h3>${recipe.title}</h3>
                                <p>Cuisine: ${recipe.cuisine}</p>
                                <p>Difficulty: ${recipe.difficulty}</p>
                                <p>Dietary: ${recipe.dietary ? recipe.dietary : 'None'}</p>
                                <button class="apply-filters-btn rate-btn" data-recipe-id="${recipe.id}" data-recipe-title="${recipe.title}">Rate</button>
                            </div>
                        `;
                            recipeListing.append(recipeCard);
                        });

                        // Attach click event listener to the dynamically added "Rate" buttons
                        $('.rate-btn').click(function() {
                            const recipeId = $(this).data('recipe-id');
                            const recipeTitle = encodeURIComponent($(this).data('recipe-title')); // Encode title for URL
                            const currentUrl = window.location.href.split('?')[0]; // Get the base URL
                            window.location.href = `${currentUrl}?recipes=${recipeId}&title=${recipeTitle}`;
                        });
                    } else {
                        recipeListing.html('<p>No recipes found matching your criteria.</p>');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error('Error fetching recipes:', textStatus, errorThrown);
                    recipeListing.html('<p>Error fetching recipes. Please try again.</p>');
                }
            });
        }

        // Load all recipes on page load
        loadRecipes({});

        // Filter form submission
        $('.apply-filters-btn').click(function(event) {
            event.preventDefault();

            var filters = {
                search: $('#search').val(),
                cuisine: $('#cuisine').val(),
                dietary: $('#dietary').val(),
                difficulty: $('#difficulty').val()
            };

            loadRecipes(filters);
        });
    });
</script>