
<!-- Custom CSS -->

<!-- Custom CSS -->
<style>
  /* Table styling */
  .table {
    border-radius: 8px;
  }

  .table th, .table td {
    padding: 8px;
    text-align: center;
  }
  .card-img-top {
    width: 100%;
    height: 150px;
    object-fit: cover;
  }

  /* Make sure text contrasts well with background */
  .text-dark {
    color: #333 !important;
  }

  /* Small text class for smaller font */
  .small-text {
    font-size: 0.75rem;
   
  }
</style>
<div class="container-fluid py-4">
<div class="row">
<!-- Today's Money -->
<div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
    <div class="card shadow-sm">
        <div class="card-body p-3">
            <div class="row align-items-center">
                <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                        <h5 class="font-weight-bolder">
                            $<?php echo $today_money; ?>
                        </h5>
                        <p class="mb-0">
                            <?php 
                                $percentage_change = ($total_expenses != 0) ? (($today_money_raw - $total_expenses) / $total_expenses) * 100 : 0;
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
                            <?php echo number_format($total_customers_today); ?>
                        </h5>
                        <p class="mb-0">
                            <?php 
                                $customerClass = $customer_percentage_change >= 0 ? 'text-success' : 'text-danger'; 
                            ?>
                            <span class="<?= $customerClass ?> text-sm font-weight-bolder">
                                <?= ($customer_percentage_change >= 0 ? '+' : '') . $customer_percentage_change ?>
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
                        <h5 class="font-weight-bolder"><?php echo number_format($totalSuppliers); ?></h5>
                        <p class="mb-0">
                            Our purchase orders <strong>:</strong>
                            <span class="text-success text-sm font-weight-bolder">
                                <?= number_format($getThisMonthPurchaseOrder) ?>
                            </span> this month
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
<!-- Sales Overview Card -->
<div class="col-xl-3 col-lg-4 col-sm-6 mb-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-3">
            <div class="row align-items-center">
                <!-- Textual Data -->
                <div class="col-8">
                    <div class="numbers">
                        <p class="text-sm mb-1 text-uppercase text-muted font-weight-bold">Sales</p>
                        
                        <!-- Total Sales Amount -->
                        <h5 class="font-weight-bolder mb-1">
                            $<?=$lastMonthTotalAmount; ?>
                        </h5>

                        <!-- Sales Orders This Month -->
                        <p class="mb-1 text-sm">
                            <span class="text-success font-weight-bolder">
                                <?=  $lastMonthTotalOrders;?>
                            </span>
                            sales orders this month
                        </p>

                        <!-- Percentage Change -->
                        <?php
                            $salesClass = $lastMonthPercentFromLastMonth >= 0 ? 'text-success' : 'text-danger';
                            $sign = $lastMonthPercentFromLastMonth >= 0 ? '+' : '';
                        ?>
                        <p class="mb-0 text-sm">
                            <span class="<?= $salesClass ?> font-weight-bolder">
                                <?= $sign . $lastMonthPercentFromLastMonth; ?>
                            </span>
                            since last month
                        </p>
                    </div>
                </div>

                <!-- Icon -->
                <div class="col-4 text-end">
                    <div class="icon icon-shape bg-gradient-warning shadow-warning text-center rounded-circle">
                        <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
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
          <h4 class="m-4">Stock</h4>
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
          <h6 class="text-capitalize"> Sales Orders Overview</h6>
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
  <!-- Customer List -->
  <div class="col-lg-4 mb-lg-0 mb-4">
    <div class="card shadow-sm hover:shadow-lg transition-all duration-300 ease-in-out">
      <div class="card-header pb-0 p-3 bg-gradient-to-r from-blue-400 via-indigo-500 to-blue-600 text-white">
        <h4 class="mb-2 align-items-center">Customer Lists</h4>
      </div>
      <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
        <table class="table align-items-center text-sm">
          <thead>
            <tr class="text-gray-700 bg-gray-200">
              <th class="text-center">Profile</th>
              <th class="text-center">Name</th>
              <th class="text-center">Status</th>
            </tr>
          </thead>
          <tbody>
            <!-- Loop through customers -->
            <?php if (!empty($customers)): ?>
              <?php foreach ($customers as $customer): ?>
                <tr class="hover:bg-gray-100 transition-all duration-300">
                  <td class="text-center">
                    <img src="<?php echo htmlspecialchars($customer['profile_image']); ?>" alt="User avatar" class="rounded-circle" style="width: 35px; height: 35px;" data-toggle="tooltip" title="Profile Picture">
                  </td>
                  <td class="text-center">
                    <div class="d-flex align-items-center">
                      <div class="ms-3">
                        <h6 class="mb-0"><?php echo htmlspecialchars($customer['first_name'] . " " . $customer['last_name']); ?></h6>
                      </div>
                    </div>
                  </td>
                  <td class="text-center">
                      <h6 class="text-sm mb-0">
                          <?php
                          if (isset($_SESSION['status']) && $_SESSION['status'] == 'Online') {
                              echo '<span class="text-success">Online</span>';
                          } else {
                              echo '<span class="text-danger">Offline</span>';
                          }
                          ?>
                      </h6>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="4" class="text-center">No users found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Worker List (Users who are NOT role_id = 2) -->
  <div class="col-lg-8 mb-lg-0 mb-4">
    <div class="card shadow-sm hover:shadow-lg transition-all duration-300 ease-in-out" style="background-color:rgb(255, 255, 255);">
      <div class="card-header pb-0 p-3 bg-gradient-to-r from-blue-500 via-indigo-600 to-blue-700 text-white">
        <h4 class="mb-2 align-items-center">Worker Lists</h4>
      </div>
      <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
        <table class="table align-items-center text-sm">
          <thead class="bg-gray-200">
            <tr>
              <th class="text-center">Profile</th>
              <th class="text-center">Name</th>
              <th class="text-center">Email</th>
              <th class="text-center">Status</th>
              <th class="text-center">Position</th>
            </tr>
          </thead>
          <tbody>
            <!-- Loop through workers -->
            <?php if (!empty($workers)): ?>
              <?php foreach ($workers as $worker): ?>
                <tr class="hover:bg-gray-100 transition-all duration-300">
                  <td class="text-center">
                    <img src="<?php echo htmlspecialchars($worker['profile_image']); ?>" alt="User avatar" class="rounded-circle" style="width: 35px; height: 35px;" data-toggle="tooltip" title="Profile Picture">
                  </td>
                  <td class="text-center">
                    <h6 class="mb-0 text-black"><?php echo htmlspecialchars($worker['first_name'] . " " . $worker['last_name']); ?></h6>
                  </td>
                  <td class="text-center">
                    <h6 class="mb-0 text-black"><?php echo htmlspecialchars($worker['email']); ?></h6>
                  </td>
                  <td class="text-center">
                    <h6 class="mb-0 text-black">
                      <?php 
                        if (isset($worker['status']) && $worker['status'] == 'Online') {
                          echo '<span class="text-success">Online</span>';
                        } else {
                          echo '<span class="text-danger">Offline</span>';
                        }
                      ?>
                    </h6>
                  </td>
                  <td class="text-center">
                    <h6 class="mb-0 text-black"><?php echo htmlspecialchars($worker['role_name']); ?></h6>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="text-center text-black">No users found.</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>












<div class="row mt-4">
<!-- Suppliers lists -->
<div class="col-lg-8 mb-lg-0 mb-4">
  <div class="card shadow-sm hover:shadow-lg transition-all duration-300 ease-in-out">
    <div class="card-header pb-0 p-3 bg-gradient-to-r from-blue-400 via-indigo-500 to-blue-600 text-white">
      <h4 class="mb-2 align-items-center">Supplier lists</h4>
    </div>
    <div class="table-responsive" style="max-height: 400px; overflow-y: auto;">
      <table class="table align-items-center text-sm">
        <thead>
          <tr class="text-gray-700 bg-gray-200">
            <th class="text-center">Profile</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">UpdatedAt</th>
          </tr>
        </thead>
        <tbody>
          <!-- Loop through suppliers -->
          <?php if (!empty($suppliersData)): ?>
            <?php foreach ($suppliersData as $supplier): ?>
              <tr class="hover:bg-gray-100 transition-all duration-300">
                <td class="text-center">
                  <img src="<?php echo htmlspecialchars($supplier['image']); ?>" alt="User avatar" class="rounded-circle" style="width: 35px; height: 35px;" data-toggle="tooltip" title="Profile Picture">
                </td>
                <td class="text-center">
                  <div class="d-flex align-items-center">
                    <div class="ms-3">
                      <h6 class="mb-0"><?php echo htmlspecialchars($supplier['Name']); ?></h6>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                  <div class="d-flex align-items-center">
                    <div class="ms-3">
                      <h6 class="mb-0"><?php echo htmlspecialchars($supplier['Email']); ?></h6>
                    </div>
                  </div>
                </td>
                <td class="text-center">
                  <div class="d-flex align-items-center">
                    <div class="ms-3">
                      <h6 class="mb-0"><?php echo htmlspecialchars($supplier['UpdatedAt']); ?></h6>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php else: ?>
            <tr>
              <td colspan="4" class="text-center">No suppliers found.</td>
            </tr>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

   <!-- Purchase Order Overview -->
  <div class="col-lg-4 mb-lg-0 mb-4">
    <div class="card z-index-2 h-100 shadow-sm">
      <div class="card-header pb-0 pt-3 bg-transparent">
        <h6 class="text-capitalize">Manage Purchase Order</h6>
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
</div>
<!-- Manage Purchase Order -->
<div class="row mt-4">
   <!-- Stock Lists -->
   <div class="col-lg-12">
    <div class="card shadow-sm">
      <div class="card-header pb-0 p-1">
        <h4 class="m-4">Purchase Order Lists</h4>
      </div>
      <div class="table-container" style="max-height: 400px; overflow-y: auto;">
        <table class="table align-middle bg-white">
          <thead>
            <tr>
              <th class="text-center">Material</th>
              <th class="text-center">Category</th>
              <th class="text-center">Purchase Order Quantity</th>
              <th class="text-center">Size/Type</th>
              <th class="text-center">Total Amount</th>
            </tr>
          </thead>
          <tbody>
            <?php if (!empty($purchaseListData)): ?>
              <?php foreach ($purchaseListData as $material): ?>
                <tr>
                  <td class="text-center"><?php echo htmlspecialchars($material['MaterialName']); ?></td>
                  <td class="text-center"><?php echo htmlspecialchars($material['CategoryName'] ?? 'N/A'); ?></td>
                  <td class="text-center"><?php echo htmlspecialchars($material['PurchaseOrderQuantity'] ?? 'N/A'); ?></td>
                  <td class="text-center"><?php echo htmlspecialchars($material['MaterialSize'] ?? 'N/A'); ?></td>
                  <td class="text-center">$<?php echo htmlspecialchars($material['TotalAmount'] ?? 'N/A'); ?></td>
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
