
// Get the canvas element
const ctx = document.getElementById('myLineChart').getContext('2d');

// Define data for the chart
const DATA_COUNT = 30;
const labels = [];
for (let i = 0; i < DATA_COUNT; ++i) {
    labels.push(i.toString());
}
const views = [0, 20, 20, 60, 60, 120, NaN, 180, 120, 125, 105, 110, 170, 256];
const comments = [0, 20, 20, 60, 60, 40, 0, 35, 20, 10, 8, 0, 68, 72];

// Chart configuration
const config = {
    type: 'line',
    data: {
        labels: labels,
        datasets: [
            {
                label: 'تعداد بازدید',
                data: views,
                borderColor: 'rgb(255, 99, 132)', // Red
                fill: false,
                cubicInterpolationMode: 'monotone',
                tension: 0.4
            },
            {
                label: 'تعداد کامنت ها',
                data: comments,
                borderColor: 'rgb(54, 162, 235)', // Blue
                fill: false,
                tension: 0.4
            }
        ]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: false,
                text: 'Monthly Data Analysis'
            }
        },
        interaction: {
            intersect: false
        },
        scales: {
            x: {
                display: true,
                title: {
                    display: true,
                    text: 'روز'
                }
            },
            y: {
                display: true,
                title: {
                    display: true,
                    text: 'تعداد'
                },
                suggestedMin: 0,
                suggestedMax: 200
            }
        }
    }
};

// Initialize the chart
new Chart(ctx, config);