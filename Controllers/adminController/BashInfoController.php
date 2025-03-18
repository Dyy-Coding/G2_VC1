<?php

class BashInfoController extends BaseController {
    private $data;
    private function __construct(){
        $this->data->UserModel();
    }

    public function profile() {

        $allData = $this->data->getAllUsers();

        $this->renderView('adminView/accounts/adminUserForm');
    }
}