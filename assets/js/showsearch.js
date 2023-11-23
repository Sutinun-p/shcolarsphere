const filterMenu = document.querySelector(".filter-menu"),
  filterBtn = document.querySelector(".filter-btn"),
  option = document.querySelectorAll(".option"),
  sBtn_text = document.querySelector(".sBtn-text");

  filterBtn.addEventListener("click", () => filterMenu.classList.toggle("active"));

option.forEach(option =>{
    option.addEventListener("click",()=>{
        let selectedOption = option.querySelector(".option-text").innerText;
        sBtn_text.innerText = selectedOption;

        filterMenu.classList.remove("active");
    })
 
})