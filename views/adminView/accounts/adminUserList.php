<?php
$users = [
    [
        'name' => 'Phean',
        'position' => 'Product Owner Official',
        'email' => 'Phean@gmail.com',
        'phone' => '1234567',
        'address' => 'HV6J+755, Address: Address:, Phnom Penh',
        'id' => '371',
        'city' => 'Phnom Penh',
    ],
    [
        'name' => 'Phean',
        'position' => 'Product Owner Official',
        'email' => 'Phean@gmail.com',
        'phone' => '1234567',
        'address' => 'HV6J+755, Address: Address:, Phnom Penh',
        'id' => '371',
        'city' => 'Phnom Penh',
    ],
];
?>

<div class="container mt-3 mb-3">
    <div class="card shadow-sm rounded" style="border: 1px solid #ddd;">
        <div class="card-header p-2">
            <div class="d-flex align-items-center">
                <h3 class="fw-bold mb-0" style="color: #4835d4;">Users List</h3>
                <p class="ms-2 mb-0 text-muted">All users in the system who were added.</p>
            </div>
        </div>
        <div class="card-body p-3">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover">
                    <thead class="table-light">
                        <tr>
                            <th class="align-middle">
                                <input type="checkbox" class="form-check-input" style="transform: scale(1.1);">
                            </th>
                            <th class="align-middle">Profile</th>
                            <th class="align-middle">Name</th>
                            <th class="align-middle">Position</th>
                            <th class="align-middle">Email</th>
                            <th class="align-middle">Phone Number</th>
                            <th class="align-middle">Address</th>
                            <th class="align-middle">Street</th>
                            <th class="align-middle">City</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td class="text-center align-middle">
                                    <input type="checkbox" class="form-check-input" style="transform: scale(1.1);">
                                </td>
                                <td class="text-center align-middle">
                                    <img src="views/assets/img/ivana-square.jpg" alt="Profile Image"
                                        class="profile-image rounded-circle"
                                        style="width: 40px; height: 40px; object-fit: cover;">
                                </td>
                                <td class="text-center align-middle"><?php echo $user['name']; ?></td>
                                <td class="text-center align-middle"><?php echo $user['position']; ?></td>
                                <td class="text-center align-middle"><?php echo $user['email']; ?></td>
                                <td class="text-center align-middle"><?php echo $user['phone']; ?></td>
                                <td class="text-center align-middle"><?php echo $user['address']; ?></td>
                                <td class="text-center align-middle"><?php echo $user['id']; ?></td>
                                <td class="text-center align-middle"><?php echo $user['city']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>