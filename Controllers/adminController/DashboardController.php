<?php

class DashboardController extends BaseController {
    
    public function index() {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/login'); // Redirect to login if not authenticated
            exit;
        }

        // Optional: Check user role (for admin-only access)
        if ($_SESSION['role_id'] !== 1) { // Assuming role_id 1 = Admin
            $this->redirect('/user'); // Redirect non-admin users
            exit;
        }

        // Retrieve user details
        $first_name = $_SESSION['first_name'] ?? 'User';
        $last_name = $_SESSION['last_name'] ?? '';

        // Load the admin dashboard view
        $this->renderView('adminView/dashboard/dashboard', [
            'first_name' => $first_name,
            'last_name' => $last_name
        ]);
    }

    public function userDashboard() {
        // Check if the user is logged in
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/login');
            exit;
        }

        // Retrieve user details
        $first_name = $_SESSION['first_name'] ?? 'User';
        $last_name = $_SESSION['last_name'] ?? '';

        // Load the user dashboard view
        $this->renderView('adminView/dashboard/dashboard', [
            'first_name' => $first_name,
            'last_name' => $last_name
        ]);
    }
}
?>
