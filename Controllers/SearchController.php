<?php
class SearchController {
    public function globalSearch() {
        header("Content-Type: application/json");
        
        require_once "../models/ProductModel.php";
        $query = isset($_GET['q']) ? strtolower(trim($_GET['q'])) : '';
        
        $model = new ProductModel();
        $results = $model->searchProducts($query);

        echo json_encode($results);
    }
}
?>