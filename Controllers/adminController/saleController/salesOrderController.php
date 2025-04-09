<?php
require_once "Controllers/BaseController.php";
require_once "Models/salesModel/salesOrderModel.php";

class SaleOrderController extends BaseController {
    private $model;

    public function __construct() {
        $this->model = new SaleOrderManagementModel();
    }

    public function saleInfo() {
        try {
            $salesOrders = $this->model->getAllSalesOrders();
            
            $this->renderView('adminView/sales/saleorder/orderlist', [
                'salesOrders' => $salesOrders,
                'success' => $_GET['success'] ?? null
            ]);
            
        } catch (Exception $e) {
            $this->renderView('adminView/sales/saleorder/orderlist', [
                'salesOrders' => [],
                'error' => 'Failed to load sales orders: ' . $e->getMessage()
            ]);
        }
    }
}