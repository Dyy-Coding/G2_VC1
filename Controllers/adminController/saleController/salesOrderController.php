<?php

class SaleOrderController extends BaseController {
    private $model;

    public function __construct() {
        $this->model = new SaleOrderManagementModel();
    }

    public function saleInfo() {
        try {
            // Fetch all sales orders
            $salesOrders = $this->model->getAllSalesOrders();

            // var_dump($salesOrders);

            // Pass data to view
            $this->renderView('adminView/sales/saleorder/orderlist', [
                'salesOrders' => $salesOrders,
                'success' => $_GET['success'] ?? null,
                'error' => null
            ]);

        } catch (Exception $e) {
            // If error occurs, pass error message to view
            $this->renderView('adminView/sales/saleorder/orderlist', [
                'salesOrders' => [],
                'success' => null,
                'error' => 'Failed to load sales orders: ' . $e->getMessage()
            ]);
        }
    }
}
