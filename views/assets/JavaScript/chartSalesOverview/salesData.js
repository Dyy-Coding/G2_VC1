// Create sales chart (Line chart)
var ctx1 = document.getElementById("chart-line-1").getContext("2d");
var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

// Fetch data for sales chart
fetch("Models/dashboard/dataSalesOverviewModel.php")
    .then(response => {
        if (!response.ok) {
            throw new Error("Network response was not ok: " + response.statusText);
        }
        return response.text();
    })
    .then(responseText => {
        console.log('Sales Data Response:', responseText);

        try {
            const salesData = JSON.parse(responseText);

            if (salesData && Array.isArray(salesData) && salesData.length > 0) {
                createSalesChart(salesData, "line", ctx1, gradientStroke1);
            } else {
                console.error("No valid sales data received.");
                alert("Error: No valid sales data received.");
            }
        } catch (e) {
            console.error("Error parsing JSON:", e);
            alert("Error parsing sales data. Please check the data source.");
        }
    })
    .catch(error => {
        console.error("Fetch error: ", error);
        alert("Fetch error: " + error.message);
    });

// Create order overview chart (Bar chart)
var ctx2 = document.getElementById("chart-line-2").getContext("2d");
var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);
gradientStroke2.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
gradientStroke2.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
gradientStroke2.addColorStop(0, 'rgba(94, 114, 228, 0)');

// Fetch data for order overview chart
fetch("Models/dashboard/dataOrderOverViewModel.php")
    .then(response => response.text())  // Change to text for debugging
    .then(data => {
        console.log('Order Data Response:', data);  // Log the raw response
        try {
            const jsonData = JSON.parse(data);
            if (jsonData && Array.isArray(jsonData) && jsonData.length > 0) {
                createOrderChart(jsonData, "bar", ctx2, gradientStroke2);
            } else {
                console.error("No valid order data received.");
                alert("Error: No valid order data received.");
            }
        } catch (e) {
            console.error("Error parsing JSON:", e);
            alert("Error: " + e.message);
        }
    })
    .catch(error => {
        console.error("Fetch error: ", error);
        alert("Fetch error: " + error.message);
    });


// General function to create the sales chart (Line chart)
function createSalesChart(chartData, chartType, ctx, gradientStroke) {
    try {
        const labels = chartData.map(item => item.month);
        const totalSalesAmount = chartData.map(item => parseFloat(item.totalSalesAmount.replace(/,/g, '')));

        // Check for valid data
        if (!labels.length || !totalSalesAmount.length) {
            throw new Error("Invalid chart data.");
        }

        new Chart(ctx, {
            type: chartType,  // Use dynamic chartType (line or bar)
            data: {
                labels: labels,
                datasets: [{
                    label: chartType === "line" ? "Sales Data" : "Sales Orders",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke,
                    borderWidth: 3,
                    fill: true,
                    data: totalSalesAmount,
                    maxBarThickness: 6,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItem) {
                                return `Month: ${tooltipItem[0].label}`;
                            },
                            label: function(tooltipItem) {
                                const index = tooltipItem.dataIndex;
                                const totalSales = totalSalesAmount[index];
                                return `Sales Amount: $${totalSales.toFixed(2)}`;
                            }
                        }
                    },
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

// General function to create the order chart (Bar chart)
function createOrderChart(chartData, chartType, ctx, gradientStroke) {
    try {
        const labels = chartData.map(item => item.month);
        const totalOrders = chartData.map(item => parseInt(item.totalOrders));
        const totalSalesAmount = chartData.map(item => parseFloat(item.totalSalesAmount));

        // Check for valid data
        if (!labels.length || !totalOrders.length || !totalSalesAmount.length) {
            throw new Error("Invalid chart data.");
        }

        new Chart(ctx, {
            type: chartType,  // Use dynamic chartType (line or bar)
            data: {
                labels: labels,
                datasets: [{
                    label: "Sales Orders",
                    backgroundColor: "#5e72e4",
                    borderColor: "#5e72e4",
                    borderWidth: 2,
                    data: totalSalesAmount,
                    maxBarThickness: 30,
                    borderRadius: 10,
                    datalabels: {
                        display: true,
                        align: 'top',
                        color: '#fff',
                        font: { weight: 'bold', size: 10 },
                        formatter: (value, ctx) => {
                            const index = ctx.dataIndex;
                            const totalOrder = totalOrders[index];
                            return `Sales: $${value.toFixed(2)}\nOrders: ${totalOrder}`;
                        }
                    }
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        callbacks: {
                            title: function(tooltipItem) {
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
                    datalabels: {
                        display: true,
                        color: '#ffffff',
                        font: { size: 12, weight: 'bold' },
                        align: 'top',
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
