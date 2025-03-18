<?php

class InventoryController extends BaseController {


    /**
     * Display the inventory (stock) page.
     */
    public function inventory()
    {
        // If needed, you can fetch the inventory data from the model or database here
        // Example: $inventoryData = $this->inventoryModel->getInventory();
        
        // Check if the required inventory view exists and render it
        // Assuming `adminView/inventory/stock` is the correct view file
        $this->renderView('adminView/inventory/stock');
    }

    public function category() {

        $this->renderView('adminView/inventory/category');
    }

    public function order() {
        $this->renderView('adminView/inventory/order');
    }
    /**
     * Ensure that the session is started.
     * This can be moved to BaseController or another common helper class
     */
}
