<?php

class InventoryController extends BaseController {

    public function __construct() {
        $this->requireAuth(); // Ensure the user is logged in

        // Check if the user has permission to view sales
        if (!$this->userHasPermission('view_sales')) {
            $this->redirect('error/403'); // Redirect to a 403 error page if unauthorized
        }
    }

    // Function to display sales data
    public function sales() {
        try {
            // Fetch sales data from the database through the SalesModel
            $salesData = SalesModel::getAllSales();

            // Pass the sales data to the view
            $this->renderView('adminView/sales/sales', ['sales' => $salesData]);
        } catch (Exception $e) {
            // Log the error and display a user-friendly error message
            error_log("Error fetching sales data: " . $e->getMessage());
            $this->renderView('adminView/sales/sales', ['error' => 'Failed to load sales data.']);
        }
    }

    // Helper function to check if the user has the required permission
    private function userHasPermission($permission_name) {
        // Assuming the user’s ID is stored in session after authentication
        $user_id = $_SESSION['user_id'] ?? null;

        // If there's no user ID in the session, the user is not logged in
        if ($user_id === null) {
            return false;
        }

        // Assuming `UserModel` is available to check permissions
        $userModel = new UserModel();
        return $userModel->userHasPermission($user_id, $permission_name);
    }
}
