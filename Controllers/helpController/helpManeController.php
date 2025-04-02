<?php 
require_once "Controllers/BaseController.php";

class helpManagementController extends BaseController
{
    private $model;

    function helpmanegement(){
        $this->renderView('adminView/help/faq');
    }
}