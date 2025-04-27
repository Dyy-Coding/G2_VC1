<?php
require_once "Models/invenoryModel/categoryModel.php";

class ShopController extends BaseController {
    private $shop;
    private $material;
    private $category;

    public function __construct() {
        $this->material = new Material();
        $this->category = new Category();
    }

    public function shop(){
        $categories = $this->category->getAllCategories();
        $materials = $this->material->getAllMaterials();
        $this->renderView("adminView/shop/shop", [
            "categories" => $categories,
            "materials" => $materials
        ]);
    }

}