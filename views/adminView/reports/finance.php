

<div class="container mt-4">
  <h2 class="mb-4">📊 Invoice & Financial Reporting System</h2>

  <ul class="nav nav-tabs" id="reportTabs" role="tablist">
    <?php
    $tabs = ['Invoices', 'Payments', 'Overview', 'Admin Dashboard'];
    foreach ($tabs as $index => $tab): ?>
      <li class="nav-item" role="presentation">
        <button class="nav-link <?= $index === 0 ? 'active' : '' ?>" id="<?= strtolower(str_replace(' ', '', $tab)) ?>-tab" data-bs-toggle="tab" data-bs-target="#<?= strtolower(str_replace(' ', '', $tab)) ?>" type="button" role="tab">
          <?= $tab ?>
        </button>
      </li>
    <?php endforeach; ?>
  </ul>

  <div class="tab-content mt-3">
    <!-- 🧾 Invoices Tab -->
    <div class="tab-pane fade show active" id="invoices" role="tabpanel">
      <h5 class="mb-3">Issued Invoices Report</h5>
      <form class="row g-2 mb-3">
        <div class="col-md-3">
          <input type="date" name="start_date" class="form-control" placeholder="From Date">
        </div>
        <div class="col-md-3">
          <input type="date" name="end_date" class="form-control" placeholder="To Date">
        </div>
        <div class="col-md-3">
          <input type="text" name="customer" class="form-control" placeholder="Customer Name">
        </div>
        <div class="col-md-3">
          <select name="status" class="form-select">
            <option value="">All Status</option>
            <option value="paid">Paid</option>
            <option value="unpaid">Unpaid</option>
            <option value="overdue">Overdue</option>
          </select>
        </div>
      </form>
      <div class="d-flex justify-content-end mb-2">
        <button class="btn btn-success me-2">Export to Excel</button>
        <button class="btn btn-danger">Export to PDF</button>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
              <th>Invoice #</th>
              <th>Customer</th>
              <th>Issued</th>
              <th>Due</th>
              <th>Total</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <!-- PHP loop to fill rows -->
            <tr>
              <td>INV-00123</td>
              <td>Acme Corp</td>
              <td>2025-04-01</td>
              <td>2025-04-15</td>
              <td>$1,200.00</td>
              <td><span class="badge bg-success">Paid</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- 💵 Payments Tab -->
    <div class="tab-pane fade" id="payments" role="tabpanel">
      <h5 class="mb-3">Payment Summary Report</h5>
      <form class="row g-2 mb-3">
        <div class="col-md-3">
          <input type="date" name="payment_start" class="form-control">
        </div>
        <div class="col-md-3">
          <input type="date" name="payment_end" class="form-control">
        </div>
        <div class="col-md-3">
          <select name="payment_status" class="form-select">
            <option value="">All Status</option>
            <option value="completed">Completed</option>
            <option value="pending">Pending</option>
            <option value="failed">Failed</option>
          </select>
        </div>
        <div class="col-md-3">
          <input type="text" name="source" class="form-control" placeholder="Source / Method">
        </div>
      </form>
      <div class="d-flex justify-content-end mb-2">
        <button class="btn btn-success me-2">Export to Excel</button>
        <button class="btn btn-danger">Export to PDF</button>
      </div>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-light">
            <tr>
              <th>Payment ID</th>
              <th>Customer</th>
              <th>Amount</th>
              <th>Source</th>
              <th>Date</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>PMT-45678</td>
              <td>Acme Corp</td>
              <td>$1,200.00</td>
              <td>Bank Transfer</td>
              <td>2025-04-05</td>
              <td><span class="badge bg-warning text-dark">Pending</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <!-- 📈 Financial Overview Tab -->
    <div class="tab-pane fade" id="overview" role="tabpanel">
      <h5 class="mb-3">Monthly Financial Overview</h5>
      <form class="row g-2 mb-3">
        <div class="col-md-4">
          <input type="month" name="overview_month" class="form-control">
        </div>
      </form>
      <div class="row">
        <div class="col-md-4">
          <div class="card text-bg-primary mb-3">
            <div class="card-body">
              <h5 class="card-title">Total Revenue</h5>
              <p class="card-text h4">$25,000</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-bg-danger mb-3">
            <div class="card-body">
              <h5 class="card-title">Total Expenses</h5>
              <p class="card-text h4">$14,300</p>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-bg-success mb-3">
            <div class="card-body">
              <h5 class="card-title">Net Profit</h5>
              <p class="card-text h4">$10,700</p>
            </div>
          </div>
        </div>
      </div>
      <canvas id="financialChart" height="100"></canvas>
    </div>

    <!-- 🧑‍💼 Admin Dashboard Tab -->
    <div class="tab-pane fade" id="admindashboard" role="tabpanel">
      <h5 class="mb-3">Admin Access & Controls</h5>
      <p>Use filters to manage financial records and restrict access based on user roles.</p>
      <div class="row g-3">
        <div class="col-md-4">
          <input type="text" class="form-control" placeholder="Search by Employee or Customer">
        </div>
        <div class="col-md-4">
          <select class="form-select">
            <option>All Roles</option>
            <option>Admin</option>
            <option>Finance</option>
            <option>Viewer</option>
          </select>
        </div>
        <div class="col-md-4">
          <select class="form-select">
            <option>All Reports</option>
            <option>Invoices</option>
            <option>Payments</option>
            <option>Financial Overview</option>
          </select>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('financialChart').getContext('2d');
new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['January', 'February', 'March', 'April'],
    datasets: [{
      label: 'Revenue',
      data: [10000, 15000, 20000, 25000],
      borderColor: 'green',
      backgroundColor: 'lightgreen',
      fill: false
    }, {
      label: 'Expenses',
      data: [7000, 8000, 10000, 14300],
      borderColor: 'red',
      backgroundColor: 'lightcoral',
      fill: false
    }]
  }
});
</script>


