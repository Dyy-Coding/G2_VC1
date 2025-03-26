<?php

class DashboardController extends BaseController {

    private $todayMoneyModel;

    public function __construct() {
        $this->todayMoneyModel = new TodayMoneyModel();
    }

    public function index() {
        // Ensure the user is logged in
        // if (!$this->isUserLoggedIn()) {
        //     $this->redirect('/login');
        //     exit;
        // }

        // // Check if the user is an admin
        // if (!$this->isAdmin()) {
        //     $this->redirect('/user');
        //     exit;
        // }

        // Retrieve today's money data
        $todayMoneyData = $this->todayMoneyModel->getTodayMoneyData();

        // // Retrieve user details
        // $userData = $this->getUserData();
        // $first_name = $userData['first_name'];
        // $last_name = $userData['last_name'];

        // Load the view and pass the data
        $this->renderView('adminView/dashboard/dashboard', [
            // 'first_name' => $first_name,
            // 'last_name' => $last_name,
            'today_money' => $todayMoneyData['today_money'],
            'total_income' => $todayMoneyData['total_income'],
            'total_expenses' => $todayMoneyData['total_expenses'],
        ]);
    }

    // Helper methods (isUserLoggedIn, isAdmin, getUserData) go here...
}
?>
