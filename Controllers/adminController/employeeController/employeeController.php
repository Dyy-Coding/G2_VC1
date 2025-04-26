<?php
require_once "Controllers/BaseController.php";
class EmployeeController extends BaseController
{

    function EmployeeControllerInfo()
    {
        $this->renderView('adminView/employees/employeeList');
    }
}
