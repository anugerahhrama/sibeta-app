
  document.addEventListener("DOMContentLoaded", () => {
    const hamburgerMenu = document.querySelector(".hamburger-menu");
    const rightSidebar = document.querySelector(".right");

    // Toggle sidebar visibility
    hamburgerMenu.addEventListener("click", () => {
      rightSidebar.classList.toggle("open");
    });
  });

