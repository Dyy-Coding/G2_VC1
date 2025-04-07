<?php

class WelcomeController extends BaseController {
    public function welcome() {
        $categoryModel = new Category();
        $categories = $categoryModel->getAllCategories();
        require_once 'views/userView/Home/home.php';
    }

    public function contact(){
        require_once 'views/userView/Home/contact.php';
    }

    public function about(){
        require_once 'views/userView/Home/about.php';
    }
}