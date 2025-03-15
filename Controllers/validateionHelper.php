

<?php
class ValidationHelper {
    public static function isValidEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function isStrongPassword($password) {
        return preg_match('/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password);
    }

    public static function sanitizeInput($input) {
        return htmlspecialchars(trim($input));
    }
}
