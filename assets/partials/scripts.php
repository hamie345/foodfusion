<script>
    $(document).ready(function() {
        // Function to show the message modal
        function showMessageModal(title, message) {
            $("#message-title").text(title);
            $("#message-body").html(message); // Use .html() to render HTML tags
            $("#messageModal").css("display", "block");
            $("#messageModal").addClass("fade-in");
            setTimeout(() => $("#messageModal").removeClass("fade-in"), 500);
        }

        // Close the message modal
        $("#close-message-modal").click(function() {
            $("#messageModal").css("display", "none");
        });

        // Close the message modal when clicking outside the modal content
        window.addEventListener("click", (event) => {
            if (event.target === document.getElementById("messageModal")) {
                document.getElementById("messageModal").style.display = "none";
            }
        });

        $("#btn-login").click(function(e) {
            e.preventDefault();

            // Get the current login index
            let loginIndex = parseInt($("#form-title").data("login-index"));

            // Toggle the login index
            loginIndex = (loginIndex === 0) ? 1 : 0;

            // Update the data-login-index attribute
            $("#form-title").data("login-index", loginIndex);

            // Change the form title based on the login index
            $("#form-title").text(loginIndex === 1 ? "Login" : "Join Us");

            // Change the button text
            $("#btn-login").text(loginIndex === 1 ? "Register" : "Login");
            $("#btn-join").text(loginIndex === 1 ? "Login" : "Register");

            // Toggle visibility of form fields
            if (loginIndex === 1) { // Login mode
                $("#firstname, #lastname, #password-confirmation").hide();
            } else { // Register mode
                $("#firstname, #lastname, #password-confirmation").show();
            }

            // Log the data for testing
            console.log("Login Index:", loginIndex);
        });

        $("#btn-join").click(function() {
            // Get the current login index
            let loginIndex = parseInt($("#form-title").data("login-index"));

            // Check if in login mode
            if (loginIndex === 1) {
                // Handle login submission
                let formData = {
                    email: $("#email").val(),
                    password: $("#password").val()
                };

                // Validate the form
                if (!validateLoginForm(formData)) {
                    return; // Stop if validation fails
                }

                // Submit the form data using AJAX to login.php
                $.ajax({
                    type: "POST",
                    url: "login.php",
                    data: formData,
                    success: function(response) {
                        // Handle the JSON response
                        if (response.success) {
                            showMessageModal("Login Successful!", response.message);
                        } else {
                            // Show error message in modal
                            showMessageModal("Login Failed", response.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle errors
                        console.error("Login error:", textStatus, errorThrown);
                        showMessageModal("Login Failed", "Please try again. Error: " + textStatus + ", " + errorThrown);
                    }
                });
            } else {
                // Handle registration submission
                let formData = {
                    firstname: $("#firstname").val(),
                    lastname: $("#lastname").val(),
                    email: $("#email").val(),
                    password: $("#password").val(),
                    passwordConfirmation: $("#password-confirmation").val()
                };

                // Validate the form
                if (!validateRegistrationForm(formData)) {
                    return; // Stop if validation fails
                }

                // Submit the form data using AJAX to register.php
                $.ajax({
                    type: "POST",
                    url: "register.php?action=register",
                    data: formData,
                    success: function(response) {
                        // Handle the JSON response
                        if (response.success) {
                            showMessageModal("Registration Successful!", response.message);
                        } else {
                            // Show error message in modal
                            showMessageModal("Registration Failed", response.message);
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Handle errors
                        console.error("Registration error:", textStatus, errorThrown);
                        showMessageModal("Registration Failed", "Please try again. Error: " + textStatus + ", " + errorThrown);
                    }
                });
            }
        });

        function validateRegistrationForm(formData) {
            if (formData.password !== formData.passwordConfirmation) {
                showMessageModal("Validation Error", "Passwords do not match.");
                return false;
            }

            return true;
        }

        function validateLoginForm(formData) {
            if (!formData.email || !formData.password) {
                showMessageModal("Validation Error", "Email and password are required.");
                return false;
            }
            return true;
        }
    });
</script>
