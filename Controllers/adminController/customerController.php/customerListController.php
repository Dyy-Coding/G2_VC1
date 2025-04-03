<?php
require_once "Controllers/BaseController.php";
require_once "Models/customerModel/customerListModel.php";

class CustomerInfoController extends BaseController
{
    private $model;
    
    function __construct()
    {
        $this->model = new CustomerInfoModel();
    }
    
    function getCustomersController()
    {
        $customers = $this->model->getCustomersModel();
        $this->renderView('adminView/customers/customersList', ['customers' => $customers]);
    }
}