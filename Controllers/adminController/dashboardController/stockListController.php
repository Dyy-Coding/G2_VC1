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
        // Fetch the stock list data from the model
        $stockData = $this->model->StockListAutoUpdateData();
        
        // Pass the data to the view
        $this->renderView('adminView/dashboard/dashboard', ['stockData' => $stockData]);
    }
}