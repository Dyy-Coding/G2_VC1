<?php

class WelcomeController extends BaseController {
    private $category;
    private $salesMaterialModel;

    public function __construct() {
        // Initialize models
        $this->category = new Category();
        $this->salesMaterialModel = new Material(); // Assuming it's the correct model
    }

    public function welcome() {
        // Fetch data from models
        $categories = $this->category->getAllCategories();
        $topSellingMaterials = $this->salesMaterialModel->getTopSellingMaterials();
        $popularCategories = $this->salesMaterialModel->getPopularCategories();

        // Pass the data to the view by including the view file
        $data = [
            'topSellingMaterials' => $topSellingMaterials,
            'categories' => $popularCategories
        ];
        
        // Render the customer view with the data
        $this->renderCustomerView("userView/Home/home", $data);
    }
}
