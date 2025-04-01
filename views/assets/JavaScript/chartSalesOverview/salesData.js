var ctx1 = document.getElementById("chart-line-1").getContext("2d");

var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

fetch("Models/dashboard/dataSalesOverviewModel.php")
    .then((response) => {
        if (!response.ok) {
            throw new Error("Network response was not ok: " + response.statusText);
        }
        return response.text();
    })
    .then((responseText) => {
        console.log('Response Text:', responseText);

        try {
            const salesData = JSON.parse(responseText);

            if (salesData && Array.isArray(salesData) && salesData.length > 0) {
                createSalesChart(salesData, "line");
            } else {
                console.error("No valid sales data received.");
                alert("Error: No valid sales data received.");
            }
        } catch (e) {
            console.error("Error parsing JSON:", e);
            alert("Error parsing sales data. Please check the data source.");
        }
    })
    .catch((error) => {
        console.error("Fetch error: ", error);
        alert("Fetch error: " + error.message);
    });

function createSalesChart(chartData, type) {
    try {
        const gradientStroke1 = ctx1.createLinearGradient(0, 0, 0, 300);
        gradientStroke1.addColorStop(0, "rgba(75, 192, 192, 0.2)");
        gradientStroke1.addColorStop(1, "rgba(75, 192, 192, 0)");

        const labels = chartData.map(item => item.month);
        const data = chartData.map(item => parseFloat(item.totalSalesAmount.replace(/,/g, '')));

        if (!labels.length || !data.length) {
            throw new Error("Invalid chart data.");
        }

        new Chart(ctx1, {
            type: type,
            data: {
                labels: labels,
                datasets: [{
                    label: "Sales Data",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: data,
                    maxBarThickness: 6,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                },
                interaction: {
                    intersect: false,
                    mode: 'index',
                },
                scales: {
                    y: {
                        grid: {
                            drawBorder: false,
                            display: true,
                            drawOnChartArea: true,
                            drawTicks: false,
                            borderDash: [5, 5],
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: { size: 11, family: "Open Sans", style: 'normal', lineHeight: 2 },
                        },
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5],
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: { size: 11, family: "Open Sans", style: 'normal', lineHeight: 2 },
                        },
                    },
                },
            },
        });
    } catch (error) {
        console.error("Chart creation error:", error);
        alert("Error creating chart: " + error.message);
    }
}
