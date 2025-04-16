<style>
    /* Rating Page Styles */
    .rating-page {
        padding: 50px 20px;
    }

    .rating-container {
        max-width: 900px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 30px;
    }

    /* Rating Form Styles */
    .rating-form {
        padding: 20px;
        background-color: #f8f8f8;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .rating-form h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #512da8;
    }

    .rating-form .form-group {
        margin-bottom: 20px;
    }

    .rating-form label {
        display: block;
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 5px;
    }

    .rating-form input[type="text"],
    .rating-form textarea,
    .rating-form select {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .rating-form input[type="text"]:focus,
    .rating-form textarea:focus,
    .rating-form select:focus {
        outline: none;
        border-color: #9575cd;
    }

    .rating-form textarea {
        resize: vertical;
    }

    .rating-form .submit-btn {
        background-color: #512da8;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 12px 30px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .rating-form .submit-btn:hover {
        background-color: #311b92;
    }

    /* Three Cards Section */
    .about-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
        margin-top: 30px;
        padding: 20px;
    }

    .about-cards .card {
        background-color: #f8f8f8;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .about-cards .card:hover {
        transform: translateY(-5px) scale(1.05);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .about-cards .card img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .about-cards .card h3 {
        padding: 10px;
        font-size: 1.5rem;
        color: #512da8;
    }

    .about-cards .card p {
        padding: 10px;
        font-size: 1.1rem;
        line-height: 1.4;
        color: #333;
    }

    /* Two-Column Section */
    .two-column-section {
        padding: 50px 20px;
        background-color: #f9f9f9;
    }

    /* Title Bar */
    .title-bar {
        text-align: center;
        margin-bottom: 30px;
    }

    .title-bar h1 {
        font-size: 2.5rem;
        color: #512da8;
    }

    .title-bar p {
        font-size: 1.2rem;
        color: #666;
    }

    .title-bar hr {
        margin-top: 10px;
        border: none;
        border-top: 2px solid #ddd;
        width: 50px;
        margin-left: auto;
        margin-right: auto;
    }

    /* Content Row */
    .content-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    /* Image Column */
    .image-column {
        flex: 1;
    }

    .image-column img {
        width: 100%;
        border-radius: 10px;
    }

    /* Description Column */
    .description-column {
        flex: 1;
    }

    .description-column p {
        font-size: 1.2rem;
        line-height: 1.6;
        color: #333;
    }
</style>

<section class="rating-page">

    <div class="rating-container">
        <!-- Rating Form -->
        <div class="rating-form">
            <?php
            // Get the recipe title dynamically (e.g., from the query string)
            $recipeTitle = $_GET['title'];
            ?>
            <h2>Rate "<?php echo htmlspecialchars($recipeTitle); ?>"</h2>
            <form id="ratingForm">
                <div class="form-group">
                    <!-- Hidden input to send the recipe title or ID to the server -->
                    <input type="hidden" id="recipe" name="recipe" value="<?php echo htmlspecialchars($recipeTitle); ?>">
                </div>
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <label for="rating">Rating</label>
                    <select id="rating" name="rating" required>
                        <option value="1">1 - Poor</option>
                        <option value="2">2 - Fair</option>
                        <option value="3">3 - Good</option>
                        <option value="4">4 - Very Good</option>
                        <option value="5">5 - Excellent</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comments">Comments</label>
                    <textarea id="comments" name="comments" placeholder="Your Comments" rows="5"></textarea>
                </div>
                <button type="submit" class="submit-btn">Submit Rating</button>
            </form>
            <div id="form-message"></div> <!-- Element to display form submission messages -->
        </div>
    </div>
</section>

<!-- Title Bar -->
<div class="title-bar">
    <h1>Testimonial</h1>
    <p>See what our customers say about our recipes</p>
    <hr>
</div>

<!-- Three Cards Section -->
<div class="about-cards">
    <div class="card">
        <h3>Our Culinary Philosophy:<em>4 - Very Good</em></h3>
        <p>At FoodFusion, we believe in the power of fresh ingredients, simple techniques, and a passion for flavor. We're dedicated to providing recipes that inspire creativity in the kitchen. - "<em>Hawah</em>"</p>
    </div>

    <div class="card">
        <h3>Our Core Values:<em>4 - Very Good</em></h3>
        <p>We value community, creativity, and accessibility. We strive to create a space where everyone can share their culinary experiences and learn from others. - "<em>Hawah</em>"</p>
    </div>

    <div class="card">
        <h3>Meet the Team:<em>4 - Very Good</em></h3>
        <p>Our team is made up of passionate food lovers, chefs, and developers dedicated to making cooking accessible and enjoyable for everyone. Get to know us! - "<em>Hawah</em>"</p>
    </div>

    <div class="card">
        <h3>Meet the Team:<em>4 - Very Good</em></h3>
        <p>Our team is made up of passionate food lovers, chefs, and developers dedicated to making cooking accessible and enjoyable for everyone. Get to know us! - "<em>Hawah</em>"</p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ratingForm = document.getElementById('ratingForm');
        const formMessage = document.getElementById('form-message');

        ratingForm.addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(ratingForm);

            fetch('submit_rating.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        formMessage.textContent = "Thank you for your rating!";
                        formMessage.style.color = "green";
                        ratingForm.reset();
                    } else {
                        formMessage.textContent = "Failed to submit rating. Please try again.";
                        formMessage.style.color = "red";
                    }
                })
                .catch(error => {
                    console.error('Error submitting rating:', error);
                    formMessage.textContent = "An error occurred. Please try again.";
                    formMessage.style.color = "red";
                });
        });
    });
</script>