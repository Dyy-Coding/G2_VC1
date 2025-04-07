<div class="row justify-content-center m-3">
    <div class="col-lg-8 col-md-10 col-sm-12">
        <div class="card border-0 shadow-lg p-4 rounded-4">
            <h2 class="text-center mb-4 fw-bold text-primary">
                <i class="fas fa-list-alt me-2"></i> Category Details
            </h2>
            <div class="table-responsive">
                <table class="table table-borderless align-middle table-hover fs-5">
                    <tbody>
                        <?php
                        $fields = [
                            'Category Name' => 'CategoryName',
                            'Description' => 'Description',
                            'Created At' => 'CreatedAt',
                            'Last Updated' => 'UpdatedAt'
                        ];

                        foreach ($fields as $label => $key): ?>
                            <tr>
                                <th class="text-primary text-end fw-semibold" style="width: 35%;">
                                    <?= $label ?>
                                </th>
                                <td class="text-secondary">
                                    <?= htmlspecialchars($category[$key]); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Go Back Button -->
            <div class="text-center mt-4">
                <a href="/category" class="btn btn-outline-primary btn-lg rounded-pill">
                    <i class="fas fa-arrow-left"></i> Go Back
                </a>
            </div>
        </div>
    </div>
</div>
