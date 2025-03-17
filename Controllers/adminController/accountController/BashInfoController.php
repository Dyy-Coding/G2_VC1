<?php

class BashInfoController extends BaseController {

    public function viewAddusersForm() {
        $this->renderView('adminView/accounts/adminUserForm');
    }
}