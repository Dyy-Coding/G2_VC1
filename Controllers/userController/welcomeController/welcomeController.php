<?php

class WelcomeController extends BaseController {
    public function welcome() {
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategories();


        require_once 'views/userView/Home/home.php';
    }
}