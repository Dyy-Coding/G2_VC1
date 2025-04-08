<?php
require_once "Controllers/BaseController.php";
class EmployeeController extends BaseController
{
    function getEmployeeController(){
        $this->renderView('adminView/employees/employeeList');
    }
}