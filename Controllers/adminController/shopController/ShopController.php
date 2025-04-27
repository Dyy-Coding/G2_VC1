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
    // public function inventory() {
    //     $categories = $this->category->getAllCategories();
    //     $suppliers = $this->material->getSuppliers();
    //     $materials = $this->material->getAllMaterials();

    //     $this->renderView("adminView/inventory/stock", [
    //         'categories' => $categories,
    //         'suppliers' => $suppliers,
    //         'materials'  => $materials,
    //         'flash_message' => $_SESSION['flash_message'] ?? null
    //     ]);
    //     unset($_SESSION['flash_message']);
    // }

    // public function category() {
    //     $this->renderView('adminView/inventory/category');
    // }
}