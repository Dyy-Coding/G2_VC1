<div class="row justify-content-center card border-0 shadow-lg p-4 rounded-4 d-flex m-3">
    <div class="container d-flex justify-content-center mt-2">
        <div class="card border-0 shadow-lg p-4 rounded-4 w-75"> <!-- Adjust width to center -->
            <h2 class="text-center mb-4 fw-bold text-primary">
                <i class="fas fa-list-alt me-2"></i> Category Details
            </h2>
            <div class="row justify-content-center">
                <!-- Category Information -->
                <div class="col-md-10"> <!-- Centering the column -->
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle" style="font-size: 1.125rem;">
                            <tbody>
                                <?php
                                // Define fields to display
                                $fields = [
                                    'Category Name' => 'CategoryName',
                                    'Description' => 'Description',
                                    'Created At' => 'CreatedAt',
                                    'Last Updated' => 'UpdatedAt'
                                ];

                                // Loop through fields and display them
                                foreach ($fields as $label => $key): ?>
                                    <tr>
                                        <th class="text-primary text-end" style="width: 35%; font-size: 1.125rem;">
                                            <?= $label ?>
                                        </th>
                                        <td class="text-secondary" style="font-size: 1.125rem;">
                                            <?= htmlspecialchars($category[$key]); ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
        <!-- Go Back Button -->
        <div class="text-center mt-4">
            <a href="/category" class="btn btn-outline-primary btn-lg rounded-pill">
                <i class="fas fa-arrow-left"></i> Go Back
            </a>
        </div>
</div>
