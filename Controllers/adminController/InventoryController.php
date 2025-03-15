<?php

class InventoryController extends BaseController {

    public function __construct()
    {
        // Ensure the session is started

        // Ensure the user is authenticated and authorized to view inventory
        $this->requireAuth();
        $this->checkAdminRole();
    }

    /**
     * Display the inventory (stock) page.
     */
    public function inventory()
    {
        
            // Check if the required inventory view exists and render it
            $this->renderView('adminView/inventory/stock');

    }

    private function checkAdminRole()
    {
        // Assuming role_id 1 is for admins; adjust as per your actual role system
        if ($_SESSION['role_id'] !== 1) {
            $this->redirect('/'); // Redirect non-admin users to home or another page
        }
    }

    /**
     * Ensure that the session is started.
     */

}
?>
