<?php
require_once "Models/accountModel/adminUserListModel.php";
require_once "Controllers/BaseController.php";
// require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class AccountListController extends BaseController
{
    private $model;

    function __construct()
    {
        $this->model = new AdminUserListModel();

    }

    // get all users from database
    public function viewUsersAccListProfile()
    {
        $users = $this->model->getUsersAccount();
        $this->renderView('adminView/accounts/adminUserList/listuser/userlist', ['users' => $users]);
    }

    // show user detail
    public function viewUserDetail()
    {
        // Fetch the 'id' from the query string
        $id = isset($_GET['id']) ? (int) $_GET['id'] : null;

        // Validate the id
        if (!$id) {
            header('Location: userList?error=Invalid user ID');
            exit;
        }

        // Fetch the user data using the model
        $user = $this->model->viewUserAccountDetail($id);

        // Check if the user exists
        if (!$user) {
            header('Location: userList?error=User not found');
            exit;
        }
        $this->renderView('adminView/accounts/adminUserList/listuser/userdetail', ['user' => $user]);
    }

    // Display the create user form (GET request)
    public function createNewUserAccProfile()
    {
        $roles = $this->model->getRolesFSY();
        // Filter out the admin role (role_id 1) from the roles array
        $roles = array_filter($roles, function ($role) {
            return $role['role_id'] != 1;
        });
        $this->renderView('adminView/accounts/adminUserList/listuser/createuser', ['roles' => $roles]);
    }

    // Store a new user (POST request from /userstore)
    public function storeUserAccProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: createuser?error=Invalid request method');
            exit;
        }

        $roleId = (int) ($_POST['role'] ?? 2); // Default to role_id 2 (non-admin)

        // Prevent assigning the admin role
        if ($roleId == 1) {
            $error = "Cannot assign admin role.";
            $this->renderView('adminView/accounts/adminUserList/listuser/createuser', ['error' => $error]);
            return;
        }

        // Get form data
        $firstName = $_POST['first_name'] ?? '';
        $lastName = $_POST['last_name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? null;
        $streetAddress = $_POST['street'] ?? null;

        // Handle file upload for profile image
        $profileImage = null;
        if (isset($_FILES['profile']) && $_FILES['profile']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'uploads/'; // Ensure this directory exists and is writable
            if (!is_dir($uploadDir)) {
                if (!mkdir($uploadDir, 0755, true)) {
                    $error = "Failed to create upload directory.";
                    $this->renderView('adminView/accounts/adminUserList/listuser/createuser', ['error' => $error]);
                    return;
                }
            }

            $uploadFile = $uploadDir . time() . '_' . basename($_FILES['profile']['name']);
            if (!move_uploaded_file($_FILES['profile']['tmp_name'], $uploadFile)) {
                $error = "Failed to upload profile image. Please check file permissions or server configuration.";
                $this->renderView('adminView/accounts/adminUserList/listuser/createuser', ['error' => $error]);
                return;
            }
            $profileImage = $uploadFile;
        }

        // Validation
        if (empty($firstName) || empty($lastName) || empty($email) || empty($password) || empty($phone)) {
            $error = "All required fields must be filled.";
            $this->renderView('adminView/accounts/adminUserList/listuser/createuser', ['error' => $error]);
            return;
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format.";
            $this->renderView('adminView/accounts/adminUserList/listuser/createuser', ['error' => $error]);
            return;
        }

        // Check if email already exists
        if ($this->model->findUserByEmail($email)) {
            $error = "Email already exists.";
            $this->renderView('adminView/accounts/adminUserList/listuser/createuser', ['error' => $error]);
            return;
        }

        // Add the user using the model
        try {
            $newUserId = $this->model->addNewUserAccount(
                $firstName,
                $lastName,
                $email,
                $phone,
                $roleId,
                $password,
                $address,
                $streetAddress,
                $profileImage
            );

            if ($newUserId) {
                // Redirect to user list with success message
                header('Location: userList');
                exit;
            } else {
                $error = "Failed to create user.";
                $this->renderView('adminView/accounts/adminUserList/listuser/createuser', ['error' => $error]);
            }
        } catch (Exception $e) {
            $error = "Error creating user: " . $e->getMessage();
            $this->renderView('adminView/accounts/adminUserList/listuser/createuser', ['error' => $error]);
        }
    }
    // edit user
    public function editUserAccProfile()
    {
        $id = isset($_GET['id']) ? (int) $_GET['id'] : null;

        if (!$id) {
            header('Location: userList?error=Invalid user ID');
            exit;
        }

        // Fetch the user data using the model
        $user = $this->model->getUserAccountFSY($id);

        // Check if the user exists
        if (!$user) {
            header('Location: userList?error=User not found');
            exit;
        }

        if (!$user) {
            header('Location: userList?error=User not found');
            exit;
        }

        $roles = $this->model->getRolesFSY();
        // Filter out the admin role (role_id 1) from the roles array
        $roles = array_filter($roles, function ($role) {
            return $role['role_id'] != 1;
        });

        // Render the edit user view with the user data and roles
        $this->renderView('adminView/accounts/adminUserList/listuser/edituser', ['user' => $user, 'roles' => $roles]);
    }

    public function updateUserAccProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['user_id'] ?? null;

            if (empty($id)) {
                $this->redirect('/userList?error=User ID is missing');
                return;
            }

            $roleId = (int) ($_POST['role_id'] ?? 2); // Default to role_id 2 (non-admin)

            // Prevent assigning the admin role
            if ($roleId == 1) {
                $this->redirect('/edituser?id=' . $id . '&error=Cannot assign admin role.');
                return;
            }

            // Handle profile image upload
            $profileImage = $_POST['old_profile'] ?? null; // Default to old profile image

            if (!empty($_FILES['profile']['name'])) {
                // Check for upload errors
                if ($_FILES['profile']['error'] !== UPLOAD_ERR_OK) {
                    $errorMessage = 'File upload error: ';
                    switch ($_FILES['profile']['error']) {
                        case UPLOAD_ERR_INI_SIZE:
                        case UPLOAD_ERR_FORM_SIZE:
                            $errorMessage .= 'File is too large.';
                            break;
                        case UPLOAD_ERR_PARTIAL:
                            $errorMessage .= 'File was only partially uploaded.';
                            break;
                        case UPLOAD_ERR_NO_FILE:
                            $errorMessage .= 'No file was uploaded.';
                            break;
                        default:
                            $errorMessage .= 'An unknown error occurred.';
                            break;
                    }
                    $this->redirect('/edituser?id=' . $id . '&error=' . urlencode($errorMessage));
                    return;
                }

                // Validate file type
                $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
                $fileType = mime_content_type($_FILES['profile']['tmp_name']);
                if (!in_array($fileType, $allowedTypes)) {
                    $this->redirect('/edituser?id=' . $id . '&error=' . urlencode('Invalid file type. Only JPEG, PNG, and GIF are allowed.'));
                    return;
                }

                // Validate file size (e.g., max 2MB)
                $maxFileSize = 2 * 1024 * 1024; // 2MB in bytes
                if ($_FILES['profile']['size'] > $maxFileSize) {
                    $this->redirect('/edituser?id=' . $id . '&error=' . urlencode('File is too large. Maximum size is 2MB.'));
                    return;
                }

                $targetDir = "public/Images/"; // Adjust based on your web root
                // Ensure the directory exists and is writable
                if (!is_dir($targetDir)) {
                    if (!mkdir($targetDir, 0755, true)) {
                        $this->redirect('/edituser?id=' . $id . '&error=' . urlencode('Failed to create Images directory.'));
                        return;
                    }
                }
                if (!is_writable($targetDir)) {
                    $this->redirect('/edituser?id=' . $id . '&error=' . urlencode('Images directory is not writable.'));
                    return;
                }

                $newFileName = time() . "_" . basename($_FILES["profile"]["name"]);
                $targetFile = $targetDir . $newFileName;

                if (move_uploaded_file($_FILES["profile"]["tmp_name"], $targetFile)) {
                    $profileImage = "/public/Images/" . $newFileName; // Path relative to web root
                } else {
                    $this->redirect('/edituser?id=' . $id . '&error=' . urlencode('Failed to move uploaded file.'));
                    return;
                }
            }

            // Prepare data for updating the user
            $data = [
                'profile_image' => $profileImage,
                'first_name' => $_POST['first_name'] ?? '',
                'last_name' => $_POST['last_name'] ?? '',
                'email' => $_POST['email'] ?? '',
                'phone' => $_POST['phone'] ?? '',
                'role_id' => $_POST['role_id'] ?? '',
                'address' => $_POST['address'] ?? '',
                'street_address' => $_POST['street_address'] ?? '',
                'password' => !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_BCRYPT) : ($_POST['old_password'] ?? '')
            ];

            // Basic validation
            if (empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || empty($data['phone']) || empty($data['role_id'])) {
                $this->redirect('/edituser?id=' . $id . '&error=Required fields are missing');
                return;
            }

            // Update the user using the model
            $this->model->updateUserAccountTSY($id, $data);

            // Redirect to user list with success message
            $this->redirect('/userList');
        } else {
            $this->redirect('/userList?error=Invalid request method');
        }
    }

    // detele
    public function destroyUserAccProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['user_ids'])) {
            $userIds = $_POST['user_ids'];

            if (!is_array($userIds)) {
                $userIds = [$userIds];
            }

            foreach ($userIds as $userId) {
                $this->model->deleteUserAccountById($userId);
            }

            $this->redirect('/userList');
        } else {
            $this->redirect('/userList?error=No user selected');
        }
    }
    public function destroySingleUserAccProfile($userId = null)
    {
        // Check if we have a user ID (could come from URL parameter)
        if ($userId === null && isset($_GET['id'])) {
            $userId = $_GET['id'];
        }

        if ($userId) {
            $this->model->deleteUserAccountById($userId);
            $this->redirect('/userList?success=User deleted successfully');
        } else {
            $this->redirect('/userList?error=No user ID provided');
        }
    }
}