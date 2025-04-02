<?php

class CategoriesController extends BaseController {
    private $category;

    public function __construct() {
        $this->category = new Category();
    }

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
                // $this->setFlashMessage('success', 'Category added successfully!');
                $this->redirect('/category'); // Redirect to the category list page
            } else {
                // $this->setFlashMessage('error', 'Failed to add category. Please try again.');
                $this->redirect('/category/add'); // Redirect to the add category page
            }
        }
    }

    // Delete a category
    public function deleteCategory($categoryID) {
        // Call the deleteCategory method in the Category model to delete the category
        $deleteSuccess = $this->category->deleteCategory($categoryID);

        if ($deleteSuccess) {
            // $this->setFlashMessage('success', 'Category deleted successfully!');
        } else {
            $this->setFlashMessage('error', 'Failed to delete category. Please try again.');
        }

        // Redirect to the category list page
        $this->redirect('/category');
    }

    public function DeleteSelectedCategories() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['categoryIDs'])) {
            $categoryIDs = $_POST['categoryIDs']; 
    
            $deleteSuccess = $this->category->deleteSelectedCategories($categoryIDs);
    
            if ($deleteSuccess) {
                // $this->setFlashMessage('success', 'Selected categories deleted successfully!');
            } else {
                $this->setFlashMessage('error', 'Failed to delete selected categories.');
            }
        } else {
            $this->setFlashMessage('error', 'Please select at least one category to delete.');
        }
    
        $this->redirect('/category');
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
                // $this->setFlashMessage('success', 'Category updated successfully!');
                $this->redirect('/category');
            } else {
                $this->setFlashMessage('error', 'Failed to update category. Please try again.');
                $this->redirect("/category/category_edit/$categoryID");
            }
        }
    }
    
    public function categoryDetail($categoryID) {
        $category = $this->category->getCategoryById($categoryID);
    
        if (!$category) {
            $this->setFlashMessage('error', 'Category not found!');
            $this->redirect('/category');
        }
    
        $this->renderView('adminView/inventory/categories/categoriesdetail', [
            'category' => $category
        ]);
    }

    // public function categoryDetails() {
    //     $categoryCounts = $this->category->getMaterialCountByCategory();
    
    //     // Passing the category counts to the view
    //     $this->renderView('adminView/inventory/categories/categoriesdetail', [
    //         'categoryCounts' => $categoryCounts
    //     ]);
    // }

    public function categoryDetails($categoryID) {
        $category = $this->model->getCategoryDetails($categoryID);
        if (!$category) {
            die("Category not found!");
        }
        require_once "views/adminView/inventory/categoriesdetail.php";
    }
    
}
?>