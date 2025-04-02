var ctx2 = document.getElementById("chart-line-2").getContext("2d");

// Create a gradient for the line chart
var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);
gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

// Fetch data from the PHP endpoint
fetch("Models/dashboard/dataOrderOverViewModel.php")
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok: " + response.statusText);
        }
        return response.text();  // First, parse it as text to inspect
    })
    .then(data => {
        console.log(data);  // Check what data is being returned
        try {
            const jsonData = JSON.parse(data);  // Parse it as JSON
            createSalesChart(jsonData);  // Call your chart function with JSON data
        } catch (e) {
            console.error("Error parsing JSON: ", e);
        }
    })
    .catch(error => {
        console.error("Fetch error: ", error);
        alert("Fetch error: " + error.message);
    });


function createSalesChart(data) {
    try {
        // Extract labels and data from the salesData
        const labels = data.map(item => item.month);  // Extracting month labels
        const totalOrders = data.map(item => parseInt(item.totalOrders));  // Extracting totalOrders and parsing as integer
        const totalSalesAmount = data.map(item => parseFloat(item.totalSalesAmount));  // Extracting totalSalesAmount and parsing as float

        console.log("Total Orders:", totalOrders);
        console.log("Total Sales Amount:", totalSalesAmount);

        // Second chart (Bar chart)
        new Chart(ctx2, {
            type: "bar",  
            data: {
                labels: labels,  // Use dynamic labels
                datasets: [{
                    label: "Sales Orders",  // Set an appropriate label for the chart
                    backgroundColor: "#5e72e4",  
                    borderColor: "#5e72e4",
                    borderWidth: 2,
                    data: totalSalesAmount,  // Use totalSalesAmount for the bar chart data
                    maxBarThickness: 30,
                    borderRadius: 10,  // This makes the bars rounded like pillars
                    // Add tooltips and data labels
                    datalabels: {
                        display: true,
                        align: 'top',
                        color: '#fff',
                        font: {
                            weight: 'bold',
                            size: 10
                        },
                        formatter: (value, ctx) => {
                            const index = ctx.dataIndex;
                            const totalOrder = totalOrders[index];  // Ensure correct reference
                            return `Sales: $${value.toFixed(2)}\nOrders: ${totalOrder}`;  // Format properly
                        }
                    }
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItem) {
                                // Customize tooltip title
                                return `Month: ${tooltipItem[0].label}`;
                            },
                            label: function(tooltipItem) {
                                const index = tooltipItem.dataIndex;
                                const totalOrder = totalOrders[index];
                                const totalSales = totalSalesAmount[index];
                                return `Sales Amount: $${totalSales.toFixed(2)}\nOrders: ${totalOrder}`;
                            }
                        }
                    },
                    // Data labels plugin
                    datalabels: {
                        display: true,
                        color: '#ffffff',
                        font: {
                            size: 12,
                            weight: 'bold'
                        },
                        align: 'top',  // Position the labels above the bars
                    }
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
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
        });
    } catch (error) {
        console.error("Chart creation error:", error);
        alert("Error creating chart: " + error.message);
    }
}
