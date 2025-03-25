<!-- Delete Selected Categories Form -->
    <div class="bg-container">
        <div class="content-container">
            <div class="container-fluid py-4 d-flex justify-content-between bg-container">
                <div class="container mt-3 card" style="width: 100%; padding: 20px;">                   
                    <div class="d-flex justify-content-between mb-1 chart-container">
                        <div>
                            <h1>Categories list</h1>
                        </div>
                        <div>
                            <button class="btn btn-primary me-2" id="btn-add">+ New Category</button>
                            <button class="btn btn-secondary">Import</button>
                            <button class="btn btn-secondary">Export</button>
                        </div>
                    </div>
                    <form id="deleteForm" action="/category/deleteSelected" method="POST" onsubmit="return confirm('Are you sure you want to delete the selected categories?')">
                        <div class="input-group mt-0 mb-0">
                            <div class="inline-controls">
                                <div class="container d-flex align-items-center justify-content-between mb-3">
                                    <!-- Rows per page selection -->
                                    <label for="rowsPerPage" class="me-2">Rows per page:</label>
                                    <select id="rowsPerPage" class="form-select mb-3" style="width: 8%;">
                                        <option value="10" selected>10</option>
                                        <option value="25">20</option>
                                        <option value="50">50</option>
                                        <option value="all">All</option>
                                    </select>

                                    <!-- Select All checkbox -->
                                    <div class="me-3 d-flex align-items-center">
                                        <input type="checkbox" name="selectAll" id="selectAll" style="width: 30px; position: relative; bottom: 4px;">
                                        <label class="form-check-label" for="selectAll">Select All</label>
                                    </div>

                                    <!-- DELETE BUTTON inside the DELETE FORM -->
                                     <div>
                                        <button type="submit" class="btn btn-danger">Delete Selected</button>
                                     </div>
                                    <!-- Search input -->   
                                    <div class="ms-3 mb-3" style="width: 300px;">
                                        <input type="search" id="search" class="form-control" placeholder="Search Categories" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>

                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Categories</th>
                                <th>Description</th>
                                <th>Last updated</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><input type="checkbox" name="categoryIDs[]" value="<?= $category['CategoryID'] ?>"></td>
                                <td><?= htmlspecialchars($category['CategoryName']) ?></td>
                                <td><?= htmlspecialchars($category['Description']?? 'No available') ?></td>
                                <td><?= htmlspecialchars($category['UpdatedAt']?? 'No available') ?></td>
                                <td>
                                    <div class="icon-container">
                                        <i class="fa-solid fa-ellipsis-vertical fs-5"></i>
                                        <div class="icon-menu">
                                            <a href="/category/delete/<?= htmlspecialchars($category['CategoryID']) ?>"><i class="fa-solid fa-trash fs-6"></i></a>
                                            <a href="/category/category_edit/<?= htmlspecialchars($category['CategoryID']) ?>"><i class="fa-solid fa-pen fs-6"></i></a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="7">No Categories Found</td>
                            </tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Category Form (Completely Outside Delete Form) -->
    <div class="form-container card mb-5 addCategory" id="addCategory" style="display: none;">
        <h2 class="text-3xl font-semibold text-gray-800 text-center mb-3">Add New Category</h2>
        <form method="POST" action="/category/add" enctype="multipart/form-data">
            <div class="form-add-category">
                <div class="form-left">
                    <!-- Category Name -->
                    <div class="mb-3">
                        <label for="CategoryName" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="CategoryName" name="CategoryName" required placeholder="Enter Category name">
                    </div>

                    <!-- Add Description -->
                    <div class="mb-3">
                        <label for="Description" class="form-label">Description</label>
                        <input type="text" class="form-control" id="Description" name="Description" required min="0" placeholder="Enter Description">
                    </div>
                </div>                       
            </div>
            <button type="submit" class="btn btn-primary w-100" id="btn-add-category">Add Categories</button>
            <button type="button" class="btn btn-secondary w-100 mt-2" id="btn-cancel">Cancel</button>
        </form>
    </div>

        <div class="container-fluid py-4 d-flex justify-content-between" style="flex-direction: row;">
            <div class="container mt-3 card" style="width: 100%; padding: 20px;">
                <div class="mb-1">
                    <h1>Top sales</h1>
                </div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="d-flex align-items-center justify-content-center">
                                <div class="name">
                                    <p class="mt-0 mb-0 ml-10">Cements</p>
                                    <span>200 order</span>
                                </div>
                            </td>
                            <td>1680</td>
                        </tr>
                        <tr>
                            <td class="d-flex align-items-center justify-content-center">
                                <div class="name">
                                    <p class="mt-0 mb-0 ml-10">Color</p>
                                    <span>200 order</span>
                                </div>
                            </td>
                            <td>1680</td>
                        </tr>
                        <tr>
                            <td class="d-flex align-items-center justify-content-center">
                                <div class="name">
                                    <p class="mt-0 mb-0 ml-10">Pin</p>
                                    <span>200 order</span>
                                </div>
                            </td>
                            <td>1680</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="container-fluid py-4 d-flex justify-content-between" style="flex-direction: row;">
            <div class="container card mt-0" style="width: 35%; padding: 20px;">
                <div class="container mt-0">
                    <h1>Top quantity</h1>
                    <div class="chart-1">
                        <canvas id="chart-pie" class="chart-canvas" height="100vh"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var ctx = document.getElementById("chart-pie").getContext("2d");
                        var myChart = new Chart(ctx, {
                            type: "pie",
                            data: {
                                labels: ["Cements", "Pin", "Steel", "Color"],
                                datasets: [{
                                    data: [50, 30, 20, 25],
                                    backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4CAF50"],
                                    hoverOffset: 5
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: "bottom"
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
            <div class="container card mt-0" style="width: 60%; padding: 20px;">
                <div class="mb-1">
                    <h4>Best selling</h4>
                    <div class="chart">
                        <canvas id="chart-line" class="chart-canvas" height="150vh"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <script>
                        var ctx = document.getElementById("chart-line").getContext("2d");
                        var myChart = new Chart(ctx, {
                            type: "line",
                            data: {
                                labels: ["January", "February", "March", "April"],
                                datasets: [{
                                    label: "Sales",
                                    data: [65, 59, 80, 81],
                                    backgroundColor: "rgba(75, 192, 192, 0.2)",
                                    borderColor: "rgba(75, 192, 192, 1)",
                                    borderWidth: 1
                                }]
                            },
                            options: {
                                responsive: true,
                                plugins: {
                                    legend: {
                                        position: "bottom"
                                    }
                                }
                            }
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Diagram -->
