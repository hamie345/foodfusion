<style>
    /* Contact Page Styles */
    .contact-page {
        padding: 50px 20px;
    }

    .contact-container {
        max-width: 900px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        /* Responsive columns */
        gap: 30px;
    }

    /* Contact Form Styles */
    .contact-form {
        padding: 20px;
        background-color: #f8f8f8;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .contact-form h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #512da8;
    }

    .contact-form .form-group {
        margin-bottom: 20px;
    }

    .contact-form label {
        display: block;
        font-size: 1.1rem;
        color: #333;
        margin-bottom: 5px;
    }

    .contact-form input[type="text"],
    .contact-form input[type="email"],
    .contact-form textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 1rem;
        transition: border-color 0.3s ease;
    }

    .contact-form input[type="text"]:focus,
    .contact-form input[type="email"]:focus,
    .contact-form textarea:focus {
        outline: none;
        border-color: #9575cd;
    }

    .contact-form textarea {
        resize: vertical;
    }

    .contact-form .submit-btn {
        background-color: #512da8;
        color: white;
        border: none;
        border-radius: 5px;
        padding: 12px 30px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .contact-form .submit-btn:hover {
        background-color: #311b92;
    }

    /* FAQ Section Styles */
    .faq-section {
        padding: 20px;
    }

    .faq-section h2 {
        font-size: 2rem;
        margin-bottom: 20px;
        color: #512da8;
    }

    .faq-section .faq-item {
        margin-bottom: 15px;
        border: 1px solid #ddd;
        border-radius: 5px;
        overflow: hidden;
        /* Ensures content doesn't overflow */
    }

    .faq-section .faq-question {
        background-color: #f0f0f0;
        color: #333;
        padding: 12px 15px;
        font-size: 1.1rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
        position: relative;
        /* For the arrow */
    }

    .faq-section .faq-question:hover {
        background-color: #e0e0e0;
    }

    .faq-section .faq-question::after {
        content: '+';
        position: absolute;
        top: 50%;
        right: 15px;
        transform: translateY(-50%);
        font-size: 1.5rem;
    }

    .faq-section .faq-item.open .faq-question::after {
        content: '-';
    }

    .faq-section .faq-answer {
        padding: 15px;
        font-size: 1rem;
        line-height: 1.4;
        color: #555;
        display: none;
        /* Hidden by default */
    }

    .faq-section .faq-item.open .faq-answer {
        display: block;
        /* Visible when the FAQ item is open */
    }
</style>

<section class="contact-page">
    <!-- Banner Section (Assuming you have this from previous steps) -->
    <div class="banner">
        <div class="banner-overlay"></div>
        <div class="banner-content">
            <div class="breadcrumb">
                <a href="index.html">Home</a> / Contact Us
            </div>
            <h2>Contact Us</h2>
        </div>
    </div>

    <div class="contact-container">
        <!-- Contact Form -->
        <div class="contact-form">
            <h2>Send Us a Message</h2>
            <form id="contactForm">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Your Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" placeholder="Your Message" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
            <div id="form-message"></div> <!-- Element to display form submission messages -->
        </div>

        <!-- FAQ Section -->
        <div class="faq-section">
            <h2>FAQ</h2>
            <div class="faq-item">
                <div class="faq-question">
                    What types of recipes can I find on FoodFusion?
                </div>
                <div class="faq-answer">
                    FoodFusion offers a wide variety of recipes, from traditional family favorites to innovative dishes inspired by global cuisine. You'll find recipes for every skill level and dietary preference.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    How can I submit my own recipes to FoodFusion?
                </div>
                <div class="faq-answer">
                    We're always looking for new and exciting recipes to share with our community! Please visit our "Submit a Recipe" page to share your creations with us.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-question">
                    Is there a cost to use FoodFusion?
                </div>
                <div class="faq-answer">
                    No, FoodFusion is completely free to use. Our goal is to provide a platform for sharing and discovering culinary inspiration without any cost to our users.
                </div>
            </div>
            <!-- Add more FAQ items as needed -->
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faqItems = document.querySelectorAll('.faq-item');

        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');

            question.addEventListener('click', function() {
                item.classList.toggle('open');
            });
        });
    });
</script>