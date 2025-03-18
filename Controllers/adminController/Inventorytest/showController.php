<?php 

class ShowController extends BaseController {
    private $productShow;

    // Constructor to initialize the $productShow object
    public function __construct() {
        // Assuming ProductShow is a class that handles rendering the view
        $this->productShow = new BaseController();
    }

    public function anotherMethod() {
        // your logic here
        echo "404";
    }
    

    // Method to render the product show view
    public function productShow() {
        // Call the renderAuthView method of the $productShow object
        $this->productShow->renderAuthView("adminView/inventories/productshow");
    }
}
