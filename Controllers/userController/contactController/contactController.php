<?php

class ContactController extends BaseController {
    private $category;
    private $salesMaterialModel;

    public function __construct() {
        // Initialize models
        $this->category = new Category();
        $this->salesMaterialModel = new Material(); // Assuming it's the correct model
    }

    public function contact() {
        // Fetch data from models


        // Pass the data to the view by including the view file
        $data = [
       
        ];
        
        // Render the customer view with the data
        $this->renderCustomerView("userView/Home/contact", $data);
    }
}