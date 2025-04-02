<?php
require_once "Controllers/BaseController.php";
require_once "Models/salesModel/salesOrderModel.php";

class SaleOrderController extends BaseController {
    private $model;

    function __construct() {
        $this->model = new SaleOrderManagementModel();
    }

    function saleInfo() {
        try {
            $salesOrders = $this->model->getAllSalesOrders();
            
            // Debug output (remove in production)
            error_log("Fetched orders count: " . count($salesOrders));
            
            $this->renderView('adminView/sales/saleorder/orderlist', [
                'salesOrders' => $salesOrders
            ]);
            
        } catch (Exception $e) {
            error_log("Error in saleInfo: " . $e->getMessage());
            $this->renderView('adminView/sales/saleorder/orderlist', [
                'salesOrders' => [],
                'error' => 'Failed to load sales orders'
            ]);
        }
    }
}