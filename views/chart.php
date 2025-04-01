<!-- Sales Overview -->
<div class="row mt-2">
  <div class="col-lg-7 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100 shadow-sm">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <h6 class="text-capitalize">Sales Overview</h6>
        <p class="text-sm mb-0">
          <i class="fa fa-arrow-up text-success"></i>
          <span class="font-weight-bold">4% more</span> in 2021
        </p>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <canvas id="chart-line-1" class="chart-canvas" height="300"></canvas>
        </div>
      </div>
    </div>
  </div>

  <?php 
  // Extract labels (Months) and sales data
  $labels = [];
  $salesData = [];

  foreach ($salesOverView as $data) {
      $labels[] = $data['month']; // Month as "Jan", "Feb", etc.
      $salesData[] = $data['totalSalesAmount']; // Total sales
  }

  // Convert PHP arrays into JavaScript format
  $labelsJson = json_encode($labels);
  $salesDataJson = json_encode($salesData);
  ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  var ctx = document.getElementById('chart-line-1').getContext('2d');

  new Chart(ctx, {
    type: "line",
    data: {
      labels: <?php echo $labelsJson; ?>,
      datasets: [{
        label: "Sales Overview",
        borderWidth: 3,
        borderColor: "#5e72e4",
        backgroundColor: "rgba(94, 114, 228, 0.2)",
        fill: true,
        data: <?php echo $salesDataJson; ?>
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: true }
      },
      scales: {
        y: {
          grid: { drawBorder: false, borderDash: [5, 5] },
          ticks: { padding: 10, color: '#fbfbfb' }
        },
        x: {
          grid: { drawBorder: false, display: false },
          ticks: { padding: 20, color: '#ccc' }
        }
      }
    }
  });
</script>