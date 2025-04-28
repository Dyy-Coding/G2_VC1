<div class="container my-5">
  <div class="card shadow-lg rounded-4 overflow-hidden" style="width: 100%; max-width: 1100px; margin: auto;">
    <!-- Cover Photo (Optional future) -->
    <!-- <div style="background: url('your-cover-photo.jpg') center/cover; height: 250px;"></div> -->

    <div class="bg-white p-4">
      <div class="text-center">
        <img 
          src="<?= !empty($user['profile_image']) ? htmlspecialchars($user['profile_image']) : 'views/assets/img/team-2.jpg' ?>"
          alt="Profile Image"
          class="rounded-circle border border-4 border-primary shadow-sm"
          style="width: 180px; height: 180px; object-fit: cover; margin-top: -90px;"
        >
        <h2 class="mt-3 mb-0 text-primary"><?= htmlspecialchars($user['first_name'] . ' ' . $user['last_name']) ?></h2>
        <p class="text-muted mb-3" style="font-size: 1.1rem;">
          <?= htmlspecialchars($user['role_name'] ?? 'User') ?>
        </p>
        <a href="/welcome" class="btn btn-outline-primary rounded-pill px-4 py-2 mb-4">
          Back to home
        </a>
      </div>

      <hr class="my-4">

      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="table-responsive">
            <table class="table table-borderless">
              <tbody>
                <?php
                $fields = [
                  'Email' => 'email',
                  'Phone Number' => 'phone',
                  'Role Description' => 'description',
                  'Address' => 'address',
                  'Street Address' => 'street_address',
                  'Created At' => 'created_at',
                  'Updated At' => 'updated_at'
                ];
                foreach ($fields as $label => $key): ?>
                  <tr>
                    <th class="text-end text-primary" style="width: 35%; font-size: 1.125rem;">
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
