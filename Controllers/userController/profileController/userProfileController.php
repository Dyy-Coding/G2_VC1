<?php

class UserProfileController extends BaseController
{
    private $category;
    private $salesMaterialModel;
    private $userModel;

    public function __construct()
    {
        // Initialize models
        $this->category = new Category();
        $this->salesMaterialModel = new Material(); // For materials if needed later
        $this->userModel = new UserCustomerProfileModel(); // Assuming this model fetches users
    }

    public function profile()
    {
        // Get current user's ID from session
    
        $userId = $_SESSION['user_id'] ?? null;

        if (!$userId) {
            // If no user ID found, redirect to login or error page
            header("Location: /login");
            exit;
        }

        // Fetch user data
        $user = $this->userModel->getUserById($userId);

        if (!$user) {
            // If user not found, show 404 or error
            header("HTTP/1.0 404 Not Found");
            echo "User not found.";
            exit;
        }

        // Pass the user data to the view
        $data = [
            'user' => $user,
        ];

        // Render the customer view with the data
        $this->renderCustomerView("userView/profile/userprofile", $data);
    }
}
?>
