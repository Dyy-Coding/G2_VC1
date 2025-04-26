<div class="container mt-3 card" style="width: 95%; padding: 25px;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h1 class="h3">User List</h1>
            <p class="text-muted mb-0">All users in the system (except admin).</p>
        </div>
        <div>
            <a href="/createuser" class="btn btn-primary">+ Add New</a>
            <button type="button" class="btn btn-secondary" id="deleteSelectedUsers"
                onmouseover="this.classList.replace('btn-secondary', 'btn-danger')"
                onmouseout="this.classList.replace('btn-danger', 'btn-secondary')">
                Delete
            </button>

        </div>
    </div>

    <div class="container d-flex align-items-center justify-content-between mb-3">
        <div class="me-3 d-flex align-items-center">
            <input type="checkbox" name="selectAll" id="selectAll"
                style="width: 30px; position: relative; bottom: 4px;">
            <label class="form-check-label" for="selectAll">Select All</label>
        </div>
        <div class="ms-2" style="width: 400px">
            <input type="search" id="search" class="form-control" placeholder="Search User" />
        </div>
    </div>

    <form action="/deleteuser" method="POST" id="deleteForm">
        <table class="table text-center align-middle" id="userTable">
            <thead>
                <tr>
                    <th class="w-small">Select</th>
                    <th class="w-small">Profile</th>
                    <th class="w-medium">First Name</th>
                    <th class="w-large">Last Name</th>
                    <th class="w-large">Phone Number</th>
                    <th class="w-large">Role</th>
                    <th class="w-large">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $index => $user): ?>
                    <tr>
                        <td><input type="checkbox" name="user_ids[]"
                                value="<?= htmlspecialchars($user['user_id'] ?? '') ?>"></td>
                        <td>
                            <img src="<?= !empty($user['profile_image']) ? htmlspecialchars($user['profile_image']) : 'views/assets/img/team-2.jpg' ?>"
                                alt="Profile Image" style="width: 30px; height: 30px; object-fit: cover;">
                        </td>
                        <td class="first-name"><?= htmlspecialchars($user['first_name'] ?? 'N/A'); ?></td>
                        <td class="last-name"><?= htmlspecialchars($user['last_name'] ?? 'N/A'); ?></td>
                        <td class="phone"><?= htmlspecialchars($user['phone'] ?? 'N/A'); ?></td>
                        <td class="role">
                            <?= htmlspecialchars($user['role_name'] ?? 'N/A'); ?>
                        </td>

                        <td class="dropdown">
                            <a href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="material-icons" style="font-size:34px;">more_vert</i>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                <li>
                                    <a href="/edituser?id=<?= htmlspecialchars($user['user_id'] ?? '') ?>"
                                        class="dropdown-item text-primary d-flex align-items-center">
                                        <i class="material-icons me-2" style="font-size:18px;">edit</i> Edit
                                    </a>
                                </li>
                                <li>
                                    <a href="/deleteuser/<?= htmlspecialchars($user['user_id'] ?? '') ?>"
                                        class="dropdown-item text-danger d-flex align-items-center"
                                        onclick="return confirm('Are you sure?');">
                                        <i class="material-icons me-2" style="font-size:18px;">delete</i> Delete
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="/userdetail?id=<?= htmlspecialchars($user['user_id'] ?? '') ?>"><i
                                            class="material-icons me-2" style="font-size:18px;">visibility</i> View
                                    </a>
                                </li>
                            </ul>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </form>
</div>


<script>

    const selectUser = document.getElementById('deleteSelectedUsers');
    selectUser.addEventListener('click', () => {
    const confirmationMessage = 'Are you sure you want to delete the selected users?';
    const deleteForm = document.getElementById('deleteForm');

    if (confirm(confirmationMessage)) {
        deleteForm.submit();
    }
});


document.getElementById('selectAll').addEventListener('change', function () {
    var checkboxes = document.querySelectorAll('input[name="user_ids[]"]');
    checkboxes.forEach(function (checkbox) {
        checkbox.checked = this.checked;
    }, this);
});

// Add JavaScript for Search Functionality
document.getElementById('search').addEventListener('input', function () {
    const searchValue = this.value.toLowerCase(); // Get the search input and convert to lowercase
    const rows = document.querySelectorAll('#userTable tbody tr'); // Get all table rows

    rows.forEach(row => {
        const firstName = row.querySelector('.first-name').textContent.toLowerCase();
        const lastName = row.querySelector('.last-name').textContent.toLowerCase();
        const phone = row.querySelector('.phone').textContent.toLowerCase();
        const role = row.querySelector('.role').textContent.toLowerCase();

        // Check if any column matches the search input
        if (firstName.includes(searchValue) ||
            lastName.includes(searchValue) ||
            phone.includes(searchValue) ||
            role.includes(searchValue)) {
            row.style.display = ''; // Show the row
        } else {
            row.style.display = 'none'; // Hide the row
        }
    });
});
</script>