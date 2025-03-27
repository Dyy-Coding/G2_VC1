<?php
require_once "Controllers/BaseController.php";
require_once "Models/accountModel/adminprofileModel.php";

class ProfileAccountController extends BaseController
{
    private $model;
    function __construct()
    {
        $this->model = new AdminProfileModel();
    }

    public function profileadmin()
    {
        // Fetch admin data from the model
        $adminData = $this->model->profileAdminAccount();
        
        // Pass the data to the view
        $this->renderView('adminView/accounts/adminAccount', ['admin' => $adminData]);
    }
}