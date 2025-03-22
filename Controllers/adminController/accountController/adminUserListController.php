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




























    
    public function viewuserdetail()
    {
        // Fetch the 'id' from the query string
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

        // Validate the id
        if (!$id) {
            header('Location: userList?error=Invalid user ID');
            exit;
        }

        // Fetch the user data using the model
        $user = $this->model->viewuserdetail($id);

        // Check if the user exists
        if (!$user) {
            header('Location: userList?error=User not found');
            exit;
        }
        $this->renderView('adminView/accounts/adminUserList/listuser/viewuserlistdetail', ['user' => $user]);
    }
}