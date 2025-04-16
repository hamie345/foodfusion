<style>
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

<!-- Three Cards Section -->
<div class="about-cards">
    <div class="card">
        <img src="./assets/images/bg2.jpg" alt="Philosophy">
        <h3>Our Culinary Philosophy</h3>
        <p>At FoodFusion, we believe in the power of fresh ingredients, simple techniques, and a passion for flavor. We're dedicated to providing recipes that inspire creativity in the kitchen.</p>
    </div>

    <div class="card">
        <img src="./assets/images/bg-1.jpg" alt="Values">
        <h3>Our Core Values</h3>
        <p>We value community, creativity, and accessibility. We strive to create a space where everyone can share their culinary experiences and learn from others.</p>
    </div>

    <div class="card">
        <img src="./assets/images/bg-3.jpg" alt="Team">
        <h3>Meet the Team</h3>
        <p>Our team is made up of passionate food lovers, chefs, and developers dedicated to making cooking accessible and enjoyable for everyone. Get to know us!</p>
    </div>
</div>

<section class="two-column-section">
    <!-- Title Bar -->
    <div class="title-bar">
        <h1>Our Culinary Philosophy</h1>
        <p>Discover what drives us to bring the best recipes and cooking tips to your table.</p>
        <hr>
    </div>

    <!-- Two-Column Content -->
    <div class="content-row">
        <!-- Image Column -->
        <div class="image-column">
            <img src="./assets/images/bg-1.jpg" alt="Culinary Philosophy">
        </div>

        <!-- Description Column -->
        <div class="description-column">
            <p>
                At FoodFusion, we believe that cooking is more than just preparing meals; it's an art form that brings people together.
                Our mission is to inspire culinary creativity by sharing diverse recipes, cooking techniques, and kitchen hacks.
                Whether you're a seasoned chef or a home cook, we aim to make cooking accessible and enjoyable for everyone.
            </p>
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