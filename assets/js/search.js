// Script for the first dropdown menu
const optionMenu = document.querySelector(".select-menu"),
      selectBtn = optionMenu.querySelector(".select-btn"),
      options = optionMenu.querySelectorAll(".option"),
      sBtnText = optionMenu.querySelector(".sBtn-text");

selectBtn.addEventListener("click", () => optionMenu.classList.toggle("active"));

options.forEach(option => {
    option.addEventListener("click", () => {
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtnText.innerText = selectedOption;
        optionMenu.classList.remove("active");
    });
});

// Script for the second dropdown menu
const filterMenu = document.querySelector(".filter-menu"),
      filterBtn = filterMenu.querySelector(".filter-btn"),
      filterOptions = filterMenu.querySelectorAll(".option"),
      filterBtnText = filterMenu.querySelector(".sBtn-text");

filterBtn.addEventListener("click", () => filterMenu.classList.toggle("active"));

filterOptions.forEach(option => {
    option.addEventListener("click", () => {
        let selectedOption = option.querySelector(".option-text").innerText;
        filterBtnText.innerText = selectedOption;
        filterMenu.classList.remove("active");
    });
});
