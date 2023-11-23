document.addEventListener('DOMContentLoaded', function () {
    var showAllButton = document.getElementById('showAllAuthors');
    
    showAllButton.addEventListener('click', function() {
        // Logic to show all authors
        alert('Show all authors clicked!');
    });

    // Add event listeners for other interactive elements as needed
    var yearRange = document.getElementById('yearRange');
    var fromYear = document.getElementById('fromYear');
    var toYear = document.getElementById('toYear');

    yearRange.addEventListener('input', function() {
        // Logic to update year range inputs
        fromYear.value = this.value;
        toYear.value = this.value; // Update this logic as per your requirement
    });
});

document.addEventListener('DOMContentLoaded', () => {
    const toggleButton = document.getElementById('toggleButton');
    const dropdownMenu = document.getElementById('dropdownMenu');
    const rangeSelection = document.querySelector('.year-range-selection');
    const individualSelection = document.querySelector('.individual-year-selection');
    const rangeRadio = document.getElementById('range');
    const individualRadio = document.getElementById('individual');

    toggleButton.addEventListener('click', () => {
        dropdownMenu.classList.toggle('show');
    });

    function toggleYearInput() {
        if (rangeRadio.checked) {
            rangeSelection.style.display = 'block';
            individualSelection.style.display = 'none';
        } else if (individualRadio.checked) {
            rangeSelection.style.display = 'none';
            individualSelection.style.display = 'block';
        }
    }

    rangeRadio.addEventListener('change', toggleYearInput);
    individualRadio.addEventListener('change', toggleYearInput);
    
    // Initial check
    toggleYearInput();
});

