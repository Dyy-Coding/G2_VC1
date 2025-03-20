<?php
require_once "Models/accountModel/adminUserListModel.php";
require_once "Controllers/BaseController.php";
class AccountListController extends BaseController
{
    private $model;

    function __construct()
    {
        $this->model = new AdminUserListModel();
    }

    public function viewAddusersListdetail()
    {
        $users = $this->model->listGetUsersAccount();
        $this->renderView('adminView/accounts/adminUserList/listuser/adminUserList', ['users' => $users]);
    }
    public function admincreateuserlist()
    {
        $this->renderView('adminView/accounts/adminUserList/listuser/admincreateuserlist');
    }
}