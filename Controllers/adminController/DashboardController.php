<?php

class DashboardController extends BaseController {

    public function index() {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            // Redirect unauthorized users to the login page
            $this->redirect('/login');
            exit;
        }

        // Optional: Check user role (for admin-only access)
        if ($_SESSION['role_id'] !== 1) { // Assuming role_id 1 = Admin
            $this->redirect('/'); // Redirect to an unauthorized access page
            exit;
        }

        // Load the dashboard view with user data
        $this->view('adminView/dashboard/dashboard', [
            'user' => $_SESSION['full_name']
        ]);
    }
}
?>
