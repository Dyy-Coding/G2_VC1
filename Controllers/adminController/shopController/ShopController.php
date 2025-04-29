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

    public function viewMaterial($id) {
        $material = $this->material->getMaterialById($id);

        if (!$material) {
            $this->renderView('errors/404', [], 404);
            return;
        }

        $this->renderView('adminView/shop/materialDetail', [
            'material' => $material,
            'flash_message' => $_SESSION['flash_message'] ?? null
        ]);
        unset($_SESSION['flash_message']);
    }


    public function help() {
        $this->renderView('adminView/help/help');
    }
}