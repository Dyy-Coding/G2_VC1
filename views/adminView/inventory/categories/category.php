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
                    <form action="/category/deleteSelected" method="POST">
                        <div class="container d-flex align-items-center justify-content-between mb-3">
                            <div>
                                <!-- Rows per page selection -->
                                <label for="rowsPerPage" class="me-2">Rows per page:</label>
                                <select id="rowsPerPage" class="form-select mb-3">
                                    <option value="10" selected>10</option>
                                    <option value="25">20</option>
                                    <option value="50">50</option>
                                    <option value="all">All</option>
                                </select>
                            </div>
                            <div class="me-3 d-flex align-items-center">
                                <input type="checkbox" name="selectAll" id="selectAll"
                                    style="width: 30px; position: relative; bottom: 4px;">
                                <label class="form-check-label" for="selectAll">Select All</label>
                            </div>
                            <div class="ms-2" style="width: 500px">
                                <input type="search" id="search" class="form-control" placeholder="Search Categories" />
                            </div>
                            <!-- DELETE BUTTON inside the DELETE FORM -->
                            <div>
                                <button type="submit" class="btn btn-danger" disabled onclick="return confirmDelete()">Delete All</button>
                            </div>
                        </div>
                  
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
                                        <!-- Action Dropdown -->
                                    <td class="dropdown">
                                        <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="material-icons" style="font-size:30px;">more_vert</i>
                                        </a>

                                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                            <li>
                                                <a href="/category/category_edit/<?= htmlspecialchars($category['CategoryID']) ?>" class="dropdown-item text-primary d-flex align-items-center">
                                                    <i class="material-icons me-2" style="font-size:18px;">edit</i> Edit
                                                </a>
                                            </li>
                                            <li>
                                            <a href="/category/delete/<?= htmlspecialchars($category['CategoryID']) ?>" class="dropdown-item text-danger d-flex align-items-center"
                                                onclick="return confirm('Are you sure?');">
                                                    <i class="material-icons me-2" style="font-size:18px;">delete</i> Delete
                                                </a>
                                            </li>
                                            <li>
                                                <a class="dropdown-item d-flex align-items-center" href="/category/detail/<?= $category['CategoryID']; ?>">
                                                    <i class="material-icons me-2" style="font-size:18px;">visibility</i> View
                                                </a>
                                            </li>
                                        </ul>
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
                        </form>
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
            <div class="container card mt-0" style="width: 35%; padding: 20px;">
                <div class="container mt-0">
                    <h1>Top quantity</h1>
                    <div class="chart-1">
                        <canvas id="chart-pie" class="chart-canvas" height="100vh"></canvas>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    fetch("Models/invenoryModel/modelTopccategory.php") // 🔁 Replace with actual PHP filename, e.g., "top_categories.php"
        .then(response => response.json())
        .then(data => {
            const labels = data.map(item => item.CategoryName);
            const values = data.map(item => item.materialCount);

            const ctx = document.getElementById("chart-pie").getContext("2d");
            new Chart(ctx, {
                type: "pie",
                data: {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: [
                            "#FF6384", "#36A2EB", "#FFCE56", "#4CAF50", "#9966FF"
                        ],
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
        })
        .catch(error => {
            console.error("Error loading chart data:", error);
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
    // Fetch data from the PHP API
    fetch('path_to_your_php_script.php')
        .then(response => response.json())
        .then(data => {
            // Prepare the data for the chart
            const months = [];
            const categorySales = [];
            
            // Process the data to get months and sales for each category
            data.forEach(item => {
                months.push(item.Month); // Add months (e.g., '2025-01')
                categorySales.push(item.TotalSold); // Add total sales for each category
            });

            // Initialize the chart with the fetched data
            var ctx = document.getElementById("chart-line").getContext("2d");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: months, // Use months as labels
                    datasets: [{
                        label: "Total Sales",
                        data: categorySales, // Use sales data
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
        })
        .catch(error => console.error('Error fetching data:', error));
</script>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Diagram -->
