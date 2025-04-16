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