<!-- Modal Structure -->
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <!-- login index: 1 => login, 0 => register -->
        <h2 id="form-title" data-login-index="0">Join Us</h2>
        <form id="join-form">
            <input type="text" name="firstname" id="firstname" placeholder="First Name" required>
            <input type="text" name="lastname" id="lastname" placeholder="Last Name" required>
            <input type="email" name="email" id="email" placeholder="Email" required>
            <input type="password" name="password" id="password" placeholder="Password" required>
            <input type="password" name="passwordConfirmation" id="password-confirmation" placeholder="Confirm Password" required>
            <button type="button" class="join-us-btn" id="btn-join">Join</button>
            <a class="btn-left" id="btn-login">Login</a>
        </form>
    </div>
</div>

<!-- Menu Modal -->
<div id="menuModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h2>Menu</h2>
        <ul class="modal-nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="#recipes">Recipe Collection</a></li>
            <li><a href="#resources">Resources</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
    </div>
</div>

<!-- Error/Success Modal -->
<div id="messageModal" class="modal">
    <div class="modal-content">
        <span class="close" id="close-message-modal">&times;</span>
        <h2 id="message-title"></h2>
        <p id="message-body"></p>
    </div>
</div>

