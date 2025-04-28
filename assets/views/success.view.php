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

<section class="contact-page">
    <div class="contact-container">
        <!-- Contact Form -->
        <div class="contact-form">
            <h2>Your Message was sent successfully</h2>
            <a href="contact.php" class="submit-btn">Back</a>
        </div>
    </div>
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