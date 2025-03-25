<?php
require_once "Controllers/BaseController.php";
class ProfileAdminController extends BaseController
{
    function profileadmin(){
        $this->renderView('adminView/accounts/adminAccount');
    }

}