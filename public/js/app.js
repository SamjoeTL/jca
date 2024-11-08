//Menu
function windowScroll() {
    const navbar = document.getElementById("navbar");
    if (
      document.body.scrollTop >= 50 ||
      document.documentElement.scrollTop >= 50
    ) {
      navbar.classList.add("nav-sticky");
    } else {
      navbar.classList.remove("nav-sticky");
    }
  }
  window.addEventListener("scroll", (ev) => {
    ev.preventDefault();
    windowScroll();
  });


let lastScrollTop = 0;
const navbar = document.getElementById("navbar");

window.addEventListener("scroll", function () {
  let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

  if (scrollTop > lastScrollTop) {
    // Scrolling down - hide navbar
    navbar.style.top = "-80px"; // Adjust to navbar height if needed
  } else {
    // Scrolling up - show navbar
    navbar.style.top = "0";
  }

  lastScrollTop = scrollTop <= 0 ? 0 : scrollTop; // Ensure it doesn't go below zero
});

  // Close Menu small screen
  document.addEventListener("DOMContentLoaded", function () {
    const navbarToggler = document.querySelector(".navbar-toggler");
    const navLinks = document.querySelectorAll(".nav-link");

    navLinks.forEach((link) => {
      link.addEventListener("click", function () {
        if (window.innerWidth < 992) {
          // Bootstrap breakpoint for small screens
          navbarToggler.click(); // Simulates a click on the toggler to collapse the navbar
        }
      });
    });
  });
  // Scroll-to-Top Button
  const backToTopButton = document.getElementById("backToTop");

  // Show the button when user scrolls down 100px from the top
  window.onscroll = function () {
    if (
      document.body.scrollTop > 100 ||
      document.documentElement.scrollTop > 100
    ) {
      backToTopButton.classList.add("show");
    } else {
      backToTopButton.classList.remove("show");
    }
  };

  // Scroll to the top smoothly when the button is clicked
  backToTopButton.addEventListener("click", () => {
    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
