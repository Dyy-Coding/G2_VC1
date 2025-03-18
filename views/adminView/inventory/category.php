<div class="bg-container">
    <div class="content-container">
        <div class="container-fluid py-4 d-flex justify-content-between bg-container">
            <div class="container mt-3 card" style="width: 70%; padding: 20px;">
                <div class="d-flex justify-content-between mb-1 chart-container">
                    <div>
                        <h1>Category list</h1>
                    </div>
                    <div>
                        <button class="btn btn-primary me-2">+ New Category</button>
                        <button class="btn btn-secondary">Import</button>
                        <button class="btn btn-secondary">Export</button>
                    </div>
                </div>
                <div class="input-group mt-0 mb-0">
                    <div class="inline-controls">
                        <label for="rowsPerPage" class="me-2">Rows per page:</label>
                        <select id="rowsPerPage" class="form-select" style="width: 10%;">
                            <option value="10">10</option>
                            <option value="25" selected>25</option>
                            <option value="50">50</option>
                        </select>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="showOutOfStock">
                            <label class="form-check-label" for="showOutOfStock">Show out of stock</label>
                        </div>
                    </div>
                </div>
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Type</th>
                            <th>Last updated</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="checkbox">
                                Cements
                            </td>
                            <td>168</td>
                            <td><button type="button" class="btn btn-success btn-sm">OUT OF STOCK</button></td>
                            <td>Bag</td>
                            <td>14 April 2025</td>
                            <td>
                                <a><i class="material-icons">edit</i></a>
                                <a><i class="material-icons text-danger">delete</i></a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox">
                                Color
                            </td>
                            <td>168</td>
                            <td><button type="button" class="btn btn-success btn-sm">OUT OF STOCK</button></td>
                            <td>litre</td>
                            <td>14 April 2025</td>
                            <td>
                                <i class="material-icons">edit</i>
                                <i class="material-icons text-danger">delete</i>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox">
                                Pin
                            </td>
                            <td>168</td>
                            <td><button type="button" class="btn btn-success btn-sm">OUT OF STOCK</button></td>
                            <td>kg</td>
                            <td>14 April 2025</td>
                            <td>
                                <i class="material-icons">edit</i>
                                <i class="material-icons text-danger">delete</i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="container mt-3 card" style="width: 25%; padding: 20px;">
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