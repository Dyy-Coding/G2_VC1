<?php

class PurchaseOrderController extends BaseController {
    private $model;

    public function __construct() {
        $this->model = new SaleOrderManagementModel();
    }

    public function purchaseInfo() {
        try {
            // Fetch all sales orders
            $purchaseOrders = $this->model->getAllPurchaseOrders();

            // var_dump($salesOrders);

            // Pass data to view
            $this->renderView('adminView/sales/purchase/purchaseList', [
                'purchaseOrders' => $purchaseOrders,
                'success' => $_GET['success'] ?? null,
                'error' => null
            ]);

        } catch (Exception $e) {
            // If error occurs, pass error message to view
            $this->renderView('adminView/sales/purchase/purchaseList', [
                'purchaseOrders' => [],
                'success' => null,
                'error' => 'Failed to load sales orders: ' . $e->getMessage()
            ]);
        }
    }
}
