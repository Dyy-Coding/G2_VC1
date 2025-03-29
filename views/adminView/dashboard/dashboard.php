<div class="container-fluid py-4">
  <div class="row">
<!-- today money -->
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
            <div class="card-body p-3">
                <div class="row">
                    <div class="col-8">
                        <div class="numbers">
                            <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Money</p>
                            <h5 class="font-weight-bolder">
                                $<?php echo number_format($today_money, 2); ?>
                            </h5>
                            <p class="mb-0">
                                <span class="text-success text-sm font-weight-bolder">
                                    <?php 
                                        $percentage_change = ($total_expenses != 0) ? (($today_money - $total_expenses) / $total_expenses) * 100 : 0;
                                        echo  number_format($percentage_change, 2) . '%'; 
                                    ?>
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
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-primary shadow-primary text-center rounded-circle">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<!-- Today Customers -->

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">
        <div class="col-8">
          <div class="numbers">
            <p class="text-sm mb-0 text-uppercase font-weight-bold">Today's Customer</p>
            <h5 class="font-weight-bolder">
              <?php echo number_format($total_customers_today); ?>
            </h5>
            <p class="mb-0">
              <span class="text-success text-sm font-weight-bolder">
                <?php 
                  // Display percentage change (add "+" sign if positive)
                  echo ($customer_percentage_change > 0 ? "+" : "") . number_format($customer_percentage_change, 2) . "%"; 
                ?>
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

<<<<<<< HEAD

    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">New Clients</p>
                <h5 class="font-weight-bolder">
                  +3,462
                </h5>
                <p class="mb-0">
                  <span class="text-danger text-sm font-weight-bolder">-2%</span>
                  since last quarter
                </p>
              </div>
            </div>
            <div class="col-4 text-end">
              <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
              </div>
            </div>
=======
<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
  <div class="card">
    <div class="card-body p-3">
      <div class="row">
        <div class="col-8">
          <div class="numbers">
            <p class="text-sm mb-0 text-uppercase font-weight-bold">Suppliers</p>
            <h5 class="font-weight-bolder">
              <?php echo "+".number_format($data['totalSuppliers']); ?>
            </h5>
            <p class="mb-0">
              <span class="text-danger text-sm font-weight-bolder"><?php echo $data['totalPurchaseorders']; ?></span>
              purchaseorders
            </p>
          </div>
        </div>
        <div class="col-4 text-end">
          <div class="icon icon-shape bg-gradient-success shadow-success text-center rounded-circle">
            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
>>>>>>> main
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
    <div class="col-xl-3 col-sm-6">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="col-8">
              <div class="numbers">
                <p class="text-sm mb-0 text-uppercase font-weight-bold">Sales</p>
                <h5 class="font-weight-bolder">
                  $103,430
                </h5>
                <p class="mb-0">
                  <span class="text-success text-sm font-weight-bolder">+5%</span> than last month
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
  <div class="row mt-4">
    <div class="col-lg-7 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">Sales overview</h6>
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



    <!-- update code -->


    <div class="col-lg-5">
      <div class="col-lg-12 ">
        <div class="card">
          <div class="card-header pb-0 p-1">
            <div class="d-flex justify-content-between">
              <h3 class="mb-2 p-2">Stock Lists</h3>
            </div>
          </div>
          <table class="table align-middle bg-white">
            <thead>
              <tr>
                <th style="font-size: 16px;">Material</th>
                <th style="font-size: 16px;">Category</th>
                <th style="font-size: 16px;">Status</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="text-center">Phone</div>
                </td>
                <td class="text-center">Electronic</td>
                <td>
                  <div class="text-center">
                    <button type="button" class="btn btn-success btn-sm btn-rounded">Have in stock</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="text-center">Laptop</div>
                </td>
                <td class="text-center">Electronic</td>
                <td>
                  <div class="text-center">
                    <button type="button" class="btn btn-danger btn-sm btn-rounded">Out of stock</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="text-center">T-Shirt</div>
                </td>
                <td class="text-center">Clothing</td>
                <td>
                  <div class="text-center">
                    <button type="button" class="btn btn-success btn-sm btn-rounded">Have in stock</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="text-center">Shoes</div>
                </td>
                <td class="text-center">Footwear</td>
                <td>
                  <div class="text-center">
                    <button type="button" class="btn btn-danger btn-sm btn-rounded">Out of stock</button>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="text-center">Shoes</div>
                </td>
                <td class="text-center">Footwear</td>
                <td>
                  <div class="text-center">
                    <button type="button" class="btn btn-danger btn-sm btn-rounded">Out of stock</button>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        </div>
      </div>
    </div>


  </div>
  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="card z-index-2 h-100">
        <div class="card-header pb-0 pt-3 bg-transparent">
          <h6 class="text-capitalize">Orders overview</h6>
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
  <div class="row mt-4">
    <div class="col-lg-6 mb-lg-0 mb-4">
      <div class="todo-card ">
        <div class="card-header pb-4 p-3">
          <div class="d-flex justify-content-between">
            <h3 class="mb-2">Supplier</h3>
          </div>
        </div>
        <table class="table align-middle bg-white">
          <tbody>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img src="https://mdbootstrap.com/img/new/avatars/8.jpg" alt="" style="width: 45px; height: 45px"
                    class="rounded-circle" />
                  <div class="ms-3">
                    <p class="fw-bold mb-1">John Doe</p>
                    <button type="button" class="btn btn-danger btn-sm">Offline</button>
                  </div>
                </div>
              </td>
              <td>
                <button type="button" class="btn btn-rounded ">
                  Edit
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img src="https://mdbootstrap.com/img/new/avatars/6.jpg" class="rounded-circle" alt=""
                    style="width: 45px; height: 45px" />
                  <div class="ms-3">
                    <p class="fw-bold mb-1">Alex Ray</p>
                    <button type="button" class="btn btn-success btn-sm">Online</button>
                  </div>
                </div>
              </td>
              <td>
                <button type="button" class="btn btn-rounded ">
                  Edit
                </button>
              </td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-items-center">
                  <img src="https://mdbootstrap.com/img/new/avatars/7.jpg" class="rounded-circle" alt=""
                    style="width: 45px; height: 45px" />
                  <div class="ms-3">
                    <p class="fw-bold mb-1">Kate Hunington</p>
                    <button type="button" class="btn btn-danger btn-sm">Offline</button>
                  </div>
                </div>
              </td>
              <td>
                <button type="button" class="btn btn-rounded ">
                  Edit
                </button>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-6 mb-lg-2 mb-4">
      <div class="todo-card">
        <div class="container mt-3">
          <h3>Progress Track</h3>

          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-info-circle me-2"></i>
            <span>React Material Dashboard</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <img src="/views/assets/img/carousel-3.jpg" alt="User avatar"
              style="width: 40px; height: 40px; border-radius: 5px" class="me-2">
            <div class="progress flex-grow-1">
              <div class="progress-bar bg-warning" style="width: 70%;" role="progressbar" aria-valuenow="70"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="line line-filled"></div>

          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-eye me-2"></i>
            <span>View Dashboard</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <img src="/views/assets/img/carousel-2.jpg" alt="User avatar"
              style="width: 40px; height: 40px; border-radius: 5px" class="me-2">
            <div class="progress flex-grow-1">
              <div class="progress-bar bg-primary" style="width: 60%;" role="progressbar" aria-valuenow="70"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="line line-filled"></div>

          <div class="d-flex align-items-center mb-3">
            <i class="bi bi-check-circle me-2"></i>
            <span>Task Completed</span>
          </div>
          <div class="d-flex align-items-center mb-3">
            <img src="/views/assets/img/carousel-1.jpg" alt="User avatar"
              style="width: 40px; height: 40px; border-radius: 5px" class="me-2">
            <div class="progress flex-grow-1">
              <div class="progress-bar bg-success" style="width: 70%;" role="progressbar" aria-valuenow="70"
                aria-valuemin="0" aria-valuemax="100"></div>
            </div>
          </div>
          <div class="line line-filled"></div>

        </div>
      </div>
    </div>

  </div>
  <!-- <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="todo-card">
        <div class="card-header pb-0 p-1">
          <div class="d-flex justify-content-between">
            <h3 class="mb-2">Stock Lists</h3>
          </div>
        </div>
        <table class="table align-middle bg-white">
          <thead>
            <tr>
              <th>Product</th>
              <th>Category</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>
                <div class="text-center">Phone</div>
              </td>
              <td class="text-center">Electronic</td>
              <td>
                <div class="text-center">
                  <button type="button" class="btn btn-success btn-sm btn-rounded">Have in stock</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="text-center">Laptop</div>
              </td>
              <td class="text-center">Electronic</td>
              <td>
                <div class="text-center">
                  <button type="button" class="btn btn-danger btn-sm btn-rounded">Out of stock</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="text-center">T-Shirt</div>
              </td>
              <td class="text-center">Clothing</td>
              <td>
                <div class="text-center">
                  <button type="button" class="btn btn-success btn-sm btn-rounded">Have in stock</button>
                </div>
              </td>
            </tr>
            <tr>
              <td>
                <div class="text-center">Shoes</div>
              </td>
              <td class="text-center">Footwear</td>
              <td>
                <div class="text-center">
                  <button type="button" class="btn btn-danger btn-sm btn-rounded">Out of stock</button>
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div> -->
  <div class="row mt-4">
    <div class="col-lg-12 mb-lg-0 mb-4">
      <div class="todo-card">
        <div class="card-header pb-0 p-3">
          <div class="d-flex justify-content-between">
            <h3 class="mb-2">Users List</h3>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table align-items-center">
            <thead>
              <tr>
                <th style="font-size: 16px;">Name</th>
                <th style="font-size: 16px;">Email</th>
                <th style="font-size: 16px;">Role</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="w-30">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div>
                      <img src="/views/assets/img/team-1.jpg" alt="User avatar" style="width: 40px; height: 40px"
                        class="rounded-circle">
                    </div>
                    <div class="ms-4">
                      <h6 class="text-sm mb-0">John Doe</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0">john@example.com</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0">Admin</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="w-30">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div>
                      <img src="/views/assets/img/team-2.jpg" alt="User avatar" style="width: 40px; height: 40px"
                        class="rounded-circle">
                    </div>
                    <div class="ms-4">
                      <h6 class="text-sm mb-0">Jane Smith</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0">jane@example.com</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0">User</h6>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="w-30">
                  <div class="d-flex px-2 py-1 align-items-center">
                    <div>
                      <img src="/views/assets/img/team-3.jpg" alt="User avatar" style="width: 40px; height: 40px"
                        class="rounded-circle">
                    </div>
                    <div class="ms-4">
                      <h6 class="text-sm mb-0">Alice Johnson</h6>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0">alice@example.com</h6>
                  </div>
                </td>
                <td>
                  <div class="text-center">
                    <h6 class="text-sm mb-0">Viewer</h6>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>