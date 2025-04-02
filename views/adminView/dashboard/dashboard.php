

<div class="container-fluid py-4">
  <div class="row">
    <!-- Today Money -->
    <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
      <div class="card shadow-sm">
        <div class="card-body p-3">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                <h5 class="font-weight-bolder">
                  $<?php echo number_format((float)$today_money, 2); ?>
                </h5>
                <p class="mb-0">
                  <?php 
                    $percentage_change = ($total_expenses != 0) ? (($today_money - $total_expenses) / $total_expenses) * 100 : 0;
                    $changeClass = $percentage_change >= 0 ? 'text-success' : 'text-danger';
                  ?>
                  <span class="<?= $changeClass ?> text-sm font-weight-bolder">
                    <?= ($percentage_change >= 0 ? '+' : '') . number_format($percentage_change, 2) ?>%
                  </span>
                  since yesterday
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Today's Customers -->
    <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
      <div class="card shadow-sm">
        <div class="card-body p-3">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Customers</p>
                <h5 class="font-weight-bolder">
                  <?php echo number_format((float)$total_customers_today); ?>
                </h5>
                <p class="mb-0">
                  <?php $customerClass = $customer_percentage_change >= 0 ? 'text-success' : 'text-danger'; ?>
                  <span class="<?= $customerClass ?> text-sm font-weight-bolder">
                    <?= ($customer_percentage_change >= 0 ? '+' : '') . number_format($customer_percentage_change, 2) ?>%
                  </span>
                  since yesterday
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-danger shadow-danger text-center rounded-circle">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Suppliers and Purchase Orders -->
    <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
      <div class="card shadow-sm">
        <div class="card-body p-3">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Suppliers</p>
                <h5 class="font-weight-bolder"><?php echo number_format((float)$totalSuppliers); ?></h5>
                <p class="mb-0">
                  Our purchase orders <strong>:</strong>
                  <span class="text-success text-sm font-weight-bolder"> <?=  number_format((float)$totalPurchaseOrders) ?></span> Purchase orders
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Sales -->
    <div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
      <div class="card shadow-sm">
        <div class="card-body p-3">
          <div class="row align-items-center">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                <h5 class="font-weight-bolder">
                  $<?php echo number_format((float)$totalSalesAmount, 2); ?>
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder"><?php echo number_format((float)$totalSalesOrders); ?></span> sales orders since yesterday
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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


    

    <!-- Stock Lists -->
    <div class="col-lg-5">
      <div class="card shadow-sm">
        <div class="card-header pb-0 p-1">
          <h4 class="m-4">Stock Lists</h4>
        </div>
        <div class="table-container" style="max-height: 400px; overflow-y: auto;">
          <table class="table align-middle bg-white">
            <thead>
              <tr>
                <th class="text-center">Material</th>
                <th class="text-center">Category</th>
                <th class="text-center">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php if (!empty($stockListData)): ?>
                <?php foreach ($stockListData as $material): ?>
                  <tr>
                    <td class="text-center"><?php echo htmlspecialchars($material['MaterialName']); ?></td>
                    <td class="text-center"><?php echo htmlspecialchars($material['CategoryName'] ?? 'N/A'); ?></td>
                    <td class="text-center">
                      <?php 
                        // Determine stock status based on stock quantity
                        $stockQuantity = $material['Quantity']; // Assuming 'Quantity' is passed in the data
                        $status = ($stockQuantity <= 0) ? 'Out of Stock' : (($stockQuantity <= 5) ? 'Low Stock' : 'In Stock');
                        $color = ($stockQuantity <= 0) ? 'danger' : (($stockQuantity <= 5) ? 'warning' : 'success');
                      ?>
                      <button type="button" class="btn btn-<?php echo $color; ?> btn-sm btn-rounded">
                        <?php echo htmlspecialchars($status); ?>
                      </button>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php else: ?>
                <tr>
                  <td colspan="3" class="text-center">No materials found.</td>
                </tr>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Orders Overview -->
  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card shadow-sm">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">Orders Overview</h6>
          <p class="text-sm mb-0">
            <i class="fa fa-arrow-up text-success"></i>
            <span class="font-weight-bold">4% more</span> in 2021
          </p>
        </div>
        <div class="card-body p-3">
          <div class="chart">
            <canvas id="chart-line-2" class="chart-canvas" height="300"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="views/assets/JavaScript/chartSalesOverview/salesData.js"></script>
  <!-- <script src="views/assets/JavaScript/chartOrderOverView/chartOrderOverView.js"></script> -->
<!-- Users List -->
<div class="row mt-4">
  <div class="col-lg-12 mb-lg-0 mb-4">
    <div class="card shadow-sm">
      <div class="card-header pb-0 p-3">
        <h3 class="mb-2 align-items-center">Users List</h3>
      </div>
      <div class="table-responsive">
        <table class="table align-items-center">
          <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Status</th> <!-- Changed from Role to Status -->
            </tr>
          </thead>
          <tbody>
            <!-- Example user entries, replace with dynamic PHP -->
            <?php if (!empty($users)): ?>
              <?php foreach ($users as $user): ?>
                <tr>
                  <td>
                    <div class="d-flex align-items-center">
                      <img src="<?php echo htmlspecialchars($user['profile_image']); ?>" alt="User avatar" style="width: 40px; height: 40px" class="rounded-circle">
                      <div class="ms-3">
                        <h6 class="text-sm mb-0"><?php echo htmlspecialchars($user['first_name'] . " " . $user['last_name']); ?></h6>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                    <h6 class="text-sm mb-0"><?php echo htmlspecialchars($user['email']); ?></h6>
                  </td>
                  <td class="text-center">
                    <h6 class="text-sm mb-0"><?php echo htmlspecialchars($user['status']); ?></h6> <!-- Changed from role to status -->
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="3" class="text-center">No users found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- Manage Purchase Order -->
<div class="row mt-4">
  <!-- Purchase Order Overview -->
  <div class="col-lg-5 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100 shadow-sm">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <h6 class="text-capitalize">Manage Purchase Order</h6>
        <p class="text-sm mb-0">
          <i class="fa fa-arrow-up text-success"></i>
          <span class="font-weight-bold">10% more</span> in 2021
        </p>
      </div>
      <div class="card-body p-3">
        <div class="chart">
          <!-- Add a container for the chart with a loading indicator -->
          <div id="chart-container" style="position: relative; height: 400px;">
            <canvas id="purchase-order-chart"></canvas>
            <div id="loading-indicator" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); display: none;">
              <div class="spinner"></div> <!-- Custom or CSS spinner -->
              <p>Loading data...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Stock Lists -->
  <div class="col-lg-7">
    <div class="card shadow-sm">
      <div class="card-header pb-0 p-1">
        <h4 class="m-4">Stock Lists</h4>
      </div>
      <div class="table-container" style="max-height: 400px; overflow-y: auto;">
        <table class="table align-middle bg-white">
          <thead>
            <tr>
              <th class="text-center">Material</th>
              <th class="text-center">Category</th>
              <th class="text-center">Purchase Order Quantity</th>
              <th class="text-center">Total Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($stockListData)): ?>
              <?php foreach ($stockListData as $material): ?>
                <tr>
                  <td class="text-center"><?php echo htmlspecialchars($material['MaterialName']); ?></td>
                  <td class="text-center"><?php echo htmlspecialchars($material['CategoryName'] ?? 'N/A'); ?></td>
                  <td class="text-center"><?php echo htmlspecialchars($material['cQuantity'] ?? 'N/A'); ?></td>
                  <td class="text-center"><?php echo htmlspecialchars($material['TotalAmount'] ?? 'N/A'); ?></td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="4" class="text-center">No materials found with purchase orders.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="views/assets/JavaScript/purchaseOrderChart/purchase.js"></script>