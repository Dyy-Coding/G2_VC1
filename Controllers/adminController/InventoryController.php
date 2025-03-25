<?php

class InventoryController extends BaseController {
    private $material;
    private $category;

    public function __construct() {
        $this->material = new Material();
        $this->category = new Category();
    }

    /**
     * Display the inventory (stock) page.
     */
    public function inventory() {
        $suppliers = $this->material->getSuppliers();
        $materials = $this->material->getAllMaterials(); // Fetch all materials
    
        $this->renderView("adminView/inventory/stock", [
            'suppliers' => $suppliers,
            'materials'  => $materials
        ]);
    }

    public function order() {
        $this->renderView('adminView/inventory/order');
    }


    

    // Add Material
    public function addMaterial() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Sanitize input
            $data = [
                'name' => $this->sanitizeInput($_POST['name'] ?? ''),
                'categoryID' => (int) $_POST['categoryID'] ?? 0,
                'quantity' => (int) $_POST['quantity'] ?? 0,
                'unitPrice' => (float) $_POST['unitPrice'] ?? 0.0,
                'supplierID' => (int) $_POST['supplierID'] ?? 0,
                'minStockLevel' => (int) $_POST['minStockLevel'] ?? 0,
                'reorderLevel' => (int) $_POST['reorderLevel'] ?? 0,
                'unitOfMeasure' => $this->sanitizeInput($_POST['unitOfMeasure'] ?? ''),
                'size' => $this->sanitizeInput($_POST['size'] ?? ''),
                'description' => $this->sanitizeInput($_POST['description'] ?? ''),
                'brand' => $this->sanitizeInput($_POST['brand'] ?? ''),
                'location' => $this->sanitizeInput($_POST['location'] ?? ''),
                'supplierContact' => $this->sanitizeInput($_POST['supplierContact'] ?? ''),
                'status' => $this->sanitizeInput($_POST['status'] ?? ''),
                'warrantyPeriod' => $this->sanitizeInput($_POST['warrantyPeriod'] ?? ''),
            ];

            // Validate required fields
            if (empty($data['name']) || empty($data['categoryID']) || empty($data['supplierID'])) {
                $this->setFlashMessage('error', 'Name, Category, and Supplier are required!');
                $this->redirect('/materials/add');
                return;
            }

            // Handle image upload
            $imagePath = null;
            if (!empty($_FILES['image']['name'])) {
                $uploadResult = $this->material->uploadImage($_FILES['image']);
                if (isset($uploadResult['error'])) {
                    $this->setFlashMessage('error', $uploadResult['error']);
                    $this->redirect('/materials/add');
                    return;
                }
                $imagePath = $uploadResult['success'];
            }

            // Insert material into database
            $data['imagePath'] = $imagePath;
            $insertSuccess = $this->material->addMaterial($data, $_FILES['image'] ?? null);

            if ($insertSuccess) {
                $this->setFlashMessage('success', 'Material added successfully!');
                $this->redirect('/inventory');
            } else {
                error_log("Error adding material: Database insert failed for " . $data['name']);
                $this->setFlashMessage('error', 'Error adding material! Please try again.');
                $this->redirect('/materials/add');
            }
        }
    }

    // Flash Message Helper
    private function setFlashMessage($type, $message) {
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];
    }

    // Input Sanitization Helper
    private function sanitizeInput($input) {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    /* -------------------Function Categories-------------------------- */

    public function category() {
        $categories = $this->category->getAllCategories();
        
        $this->renderView('adminView/inventory/categories/category', [
            'categories' => $categories
        ]);
    }   

    // Add a new category
    public function addCategory() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Get the category name and description from the form
            $categoryName = $_POST['CategoryName'] ?? '';
            $description = $_POST['Description'] ?? '';

            // Validate that the fields are not empty
            if (empty($categoryName) || empty($description)) {
                $this->setFlashMessage('error', 'Category Name and Description are required!');
                $this->redirect('/category/add'); // Redirect to the add category page
                return;
            }

            // Call the addCategory method in the Category model to insert data
            $categoryId = $this->category->addCategory($categoryName, $description);

            if ($categoryId) {
                $this->setFlashMessage('success', 'Category added successfully!');
                $this->redirect('/category'); // Redirect to the category list page
            } else {
                $this->setFlashMessage('error', 'Failed to add category. Please try again.');
                $this->redirect('/category/add'); // Redirect to the add category page
            }
        }
    }

    // Delete a category
    public function deleteCategory($categoryID) {
        // Call the deleteCategory method in the Category model to delete the category
        $deleteSuccess = $this->category->deleteCategory($categoryID);

        if ($deleteSuccess) {
            $this->setFlashMessage('success', 'Category deleted successfully!');
        } else {
            $this->setFlashMessage('error', 'Failed to delete category. Please try again.');
        }

        // Redirect to the category list page
        $this->redirect('/category');
    }

    
    public function deleteSelectedCategories() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['categoryIDs'])) {
            $categoryIDs = $_POST['categoryIDs']; // Get selected category IDs from form
    
            if (empty($categoryIDs)) {
                $this->setFlashMessage('error', 'No categories selected for deletion!');
                $this->redirect('/category');
                return;
            }
    
            // Delete only the selected categories
            $deleteSuccess = $this->category->deleteSelectedCategories($categoryIDs);
    
            if ($deleteSuccess) {
                $this->setFlashMessage('success', 'Selected categories deleted successfully!');
            } else {
                $this->setFlashMessage('error', 'Failed to delete selected categories.');
            }
    
            $this->redirect('/category');
        }
    }
    

    public function editCategory($categoryID) {
        // Fetch the category details by ID
        $category = $this->category->getCategoryById($categoryID);
    
        if (!$category) {
            $this->setFlashMessage('error', 'Category not found.');
            $this->redirect('/category');
            return;
        }
    
        // Render the edit category form
        $this->renderView('adminView/inventory/categories/category_edit', [
            'category' => $category
        ]);
    }
    
    public function updateCategory($categoryID) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $categoryName = $_POST['CategoryName'] ?? '';
            $description = $_POST['Description'] ?? '';
    
            // Validate input
            if (empty($categoryName) || empty($description)) {
                $this->setFlashMessage('error', 'Category Name and Description are required!');
                $this->redirect("/category/category_edit/$categoryID");
                return;
            }
    
            // Update the category in the database
            $updated = $this->category->updateCategory($categoryID, $categoryName, $description);
    
            if ($updated) {
                $this->setFlashMessage('success', 'Category updated successfully!');
                $this->redirect('/category');
            } else {
                $this->setFlashMessage('error', 'Failed to update category. Please try again.');
                $this->redirect("/category/category_edit/$categoryID");
            }
        }
    }
    

}
?>
