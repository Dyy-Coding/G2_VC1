<?php
require_once "Controllers/BaseController.php";

class SettingController extends BaseController
{
    private $model;

    function settingInfo(){
        $this->renderView('adminView/setting/setting');
    }
}