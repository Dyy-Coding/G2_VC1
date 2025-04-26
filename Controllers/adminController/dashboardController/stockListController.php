<?php
require_once "Controllers/BaseController.php";
require_once "Models/dashboard/stockListModel.php";

class DashboardStocklistController extends BaseController
{
    private $model;

    function __construct()
    {
        $this->model = new StockListModel();
    }

    function GetStockListData()
    {
        $stockListData = $this->model->StockListAutoUpdateData();
        $this->renderView('adminView/dashboard/dashboard', ['stockListData' => $stockListData]);
    }
}