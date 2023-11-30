document.addEventListener("DOMContentLoaded", () => {
  // Function to initialize each dropdown
  function setupDropdown(toggleButtonId, dropdownMenuId) {
    const toggleButton = document.getElementById(toggleButtonId);
    const dropdownMenu = document.getElementById(dropdownMenuId);

    // Toggle the dropdown
    toggleButton.addEventListener("click", () => {
      const isShown = dropdownMenu.style.display === "block";
      // Hide any other open dropdowns
      document.querySelectorAll(".dropdown-menu").forEach((menu) => {
        menu.style.display = "none";
      });
      document.querySelectorAll(".dropdown-toggle").forEach((button) => {
        button.classList.remove("active");
      });
      // Show or hide this dropdown
      dropdownMenu.style.display = isShown ? "none" : "block";
      toggleButton.classList.toggle("active", !isShown);
    });
  }

  // Initialize all dropdowns
  setupDropdown('yearToggleButton', 'yearDropdownMenu');
  setupDropdown('authorToggleButton', 'authorDropdownMenu');
  setupDropdown("documentToggleButton", "documentDropdownMenu");
  setupDropdown("sourceToggleButton", "sourceDropdownMenu");
  setupDropdown("affiliationToggleButton", "affiliationDropdownMenu");
  setupDropdown("keyToggleButton", "keyDropdownMenu");
  setupDropdown("languageToggleButton", "languageDropdownMenu");

  // Close dropdowns when clicking outside of them
  window.addEventListener('click', (e) => {
    if (!e.target.matches('.dropdown-toggle')) {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.style.display = 'none';
        });
        document.querySelectorAll('.dropdown-toggle').forEach(button => {
            button.classList.remove('active');
        });
    }
}, true);
});
