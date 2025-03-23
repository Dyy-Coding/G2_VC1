<div class="container mt-4 mb-4 card" style="width: 95%; padding: 25px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="container" style="max-width: 900px; font-size: 1.125rem;"> <!-- Increased font size -->
            <h1 class="h3 mb-4 text-primary text-center pb-2" style="font-size: 2rem;">User Details
            </h1>
            <div class="row align-items-center">
                <!-- Profile Image -->
                <div class="col-md-4 text-center mb-4">
                    <img src="<?= !empty($user['profile_image']) ? htmlspecialchars($user['profile_image']) : 'views/assets/img/team-2.jpg' ?>"
                        alt="Profile Image" class="rounded-circle border border-3 border-primary shadow-sm"
                        style="width: 160px; height: 160px; object-fit: cover;">
                    <a href="/userList" class="btn btn-primary px-5 py-2 mt-4 rounded-pill shadow"
                        style="font-size: 1rem;">Back to List</a>
                </div>
                <!-- User Information -->
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle" style="font-size: 1.125rem;">
                            <!-- Increased table font size -->
                            <tbody>
                                <?php
                                $fields = [
                                    'First Name' => 'first_name',
                                    'Last Name' => 'last_name',
                                    'Email' => 'email',
                                    'Phone Number' => 'phone',
                                    'Role' => 'role_name',
                                    'Role Description' => 'description',
                                    'Address' => 'address',
                                    'Street Address' => 'street_address',
                                    'Created At' => 'created_at',
                                    'Updated At' => 'updated_at'
                                ];
                                foreach ($fields as $label => $key): ?>
                                    <tr>
                                        <th class="text-primary text-end" style="width: 35%; font-size: 1.125rem;">
                                            <?= $label ?>
                                        </th>
                                        <td class="text-secondary" style="font-size: 1.125rem;">
                                            <?= htmlspecialchars($user[$key] ?? 'N/A'); ?>
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
</div>
