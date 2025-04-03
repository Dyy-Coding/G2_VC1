// Fetch data from the PHP endpoint
fetch("Models/dashboard/purchaseOrderModel.php")
  .then(response => {
    if (!response.ok) {
      throw new Error("Network response was not ok: " + response.statusText);
    }
    return response.json();  // Parse response as JSON directly
  })
  .then(data => {
    console.log(data);  // Log the raw data to see what is returned
    createPurchaseOrderChart(data);  // Call the chart function with the data
  })
  .catch(error => {
    console.error("Fetch error: ", error);
    alert("Fetch error: " + error.message);
  });

// Function to create the pie chart with fetched data
function createPurchaseOrderChart(purchaseData) {
  var labels = [];
  var quantities = [];  // For Purchase Order Quantity
  var amounts = [];     // For Purchase Order Total Amount (optional)

  // Ensure that the data is correctly formatted
  if (Array.isArray(purchaseData) && purchaseData.length > 0) {
    // Populate the labels and data arrays
    purchaseData.forEach(function(item) {
      // Handle possible undefined or missing fields
      labels.push(item.MonthYear|| "Unknown");  // Fallback if MaterialName is missing
      quantities.push(item.TotalQuantity || 0);  // Fallback if TotalQuantity is missing
      amounts.push(item.TotalAmount || 0);  // Fallback if TotalAmount is missing
    });

    console.log(labels);
    console.log(amounts);
    console.log(quantities);

    // Get the canvas context
    var ctx = document.getElementById('purchase-order-chart').getContext('2d');

    // Create the pie chart
    var pieChart = new Chart(ctx, {
      type: 'pie',  // Pie chart type
      data: {
        labels: labels,  // Labels for each segment (Materials)
        datasets: [{
          label: 'Purchase Order Quantity',
          data: quantities,  // Or use amounts[] if you prefer to display total amount
          backgroundColor: generateColors(labels.length),  // Dynamically generate colors
          borderColor: generateColors(labels.length, true),  // Border colors for each segment
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'top',
          },
          tooltip: {
            callbacks: {
              label: function(tooltipItem) {
                return tooltipItem.label + ': ' + tooltipItem.raw + ' $'; // Or use amounts
              }
            }
          }
        }
      }
    });
  } else {
    console.error("No valid data found for the chart.");
    alert("No valid data available for the purchase orders.");
  }
}

// Function to generate random colors for the chart segments
// Function to generate random colors for the chart segments
// Function to generate random colors for the chart segments
function generateColors(count, isBorder = false) {
    const colors = [];
    for (let i = 0; i < count; i++) {
        // Random color generator (fixed string interpolation issue)
        const randomColor = `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${isBorder ? 1 : 0.2})`;
        colors.push(randomColor);
    }
    return colors;
}
