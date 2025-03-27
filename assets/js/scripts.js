document.addEventListener("DOMContentLoaded", () => {
  // Check if the user has already accepted the cookies
  if (!localStorage.getItem("cookieConsent")) {
    // Show the Toastify notification
    Toastify({
      text: "This website uses cookies to ensure you get the best experience. By continuing to browse, you agree to our use of cookies.",
      duration: -1, // Display indefinitely until closed
      close: true,
      gravity: "bottom",
      position: "right",
      backgroundColor: "#4a148c",
      stopOnFocus: true,
      onClick: function () {
        // Set local storage to remember user's consent
        localStorage.setItem("cookieConsent", "true");
      },
    }).showToast();
  }

  // Existing modal JavaScript, carousel initialization, etc.
  const modal = document.getElementById("modal");
  const joinUsBtn = document.querySelector(".join-us-btn");
  const closeBtn = document.querySelectorAll(".close");
  const toggleMenu = document.querySelector(".toggle-menu");
  const menuModal = document.getElementById("menuModal");

  // Open "Join Us" modal on button click
  joinUsBtn.addEventListener("click", () => {
    modal.style.display = "block";
    modal.classList.add("fade-in");
    setTimeout(() => modal.classList.remove("fade-in"), 500);
  });

  // Open menu modal on burger menu click
  toggleMenu.addEventListener("click", () => {
    menuModal.style.display = "block";
    menuModal.classList.add("fade-in");
    setTimeout(() => menuModal.classList.remove("fade-in"), 500);
  });

  // Close modal on close button click
  closeBtn.forEach((btn) => {
    btn.addEventListener("click", (event) => {
      const modalElement = event.target.closest(".modal");
      modalElement.style.display = "none";
      modalElement.classList.add("fade-out");
      setTimeout(() => modalElement.classList.remove("fade-out"), 500);
    });
  });
  // Close modal when clicking outside the modal content
  window.addEventListener("click", (event) => {
    if (event.target === modal) {
      modal.style.display = "none";
    }
    if (event.target === menuModal) {
      menuModal.style.display = "none";
    }
  });

  // Initialize Slick Carousel
  $(".carousel").slick({
    dots: true,
    infinite: true,
    speed: 500,
    slidesToShow: 1,
    adaptiveHeight: true,
    autoplay: true,
    autoplaySpeed: 3000,
  });
});
