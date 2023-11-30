var lineCtx = document.getElementById('lineChart').getContext('2d');
var lineChart = new Chart(lineCtx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [{
            label: 'Q1',
            data: [65, 59, 80, 81, 56, 55, 40],
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }, {
            label: 'Q2',
            // ... Add the data for Q2, Q3, Q4
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
    }
});

var barCtx = document.getElementById('barChart').getContext('2d');
var barChart = new Chart(barCtx, {
    type: 'bar',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
        datasets: [{
            label: 'AI',
            data: [65, 59, 80, 81, 56, 55, 40],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
        }, {
            label: 'Network',
            // ... Add the data for Network, Other
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
    }
});
