<?php

class InventoryController extends BaseController {

    // Ensure the user is authenticated and authorized for this page
    public function __construct() {
        $this->requireAuth(); // Ensure the user is logged in
        // You could also check if the user has the correct permissions to access the sales page here
    }

    public function sales() {
        // Fetch sales data (Example: Fetch from a database or an API)
        // Assuming you have a SalesModel class for querying the sales data
        // $salesData = SalesModel::getAllSales(); 
        
        $salesData = [
            // Example data, you can replace this with actual data
            ['product' => 'Product A', 'quantity' => 10, 'price' => 100],
            ['product' => 'Product B', 'quantity' => 5, 'price' => 200],
            // More data...
        ];

        // Pass data to the view
        $this->renderView('adminView/sales/sales', ['sales' => $salesData]);
    }
}
