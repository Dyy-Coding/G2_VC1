<?php

class AccountController extends BaseController {

    public function viewAddusersForm() {
        $this->renderView('adminView/accounts/adminUserForm');
    }
}