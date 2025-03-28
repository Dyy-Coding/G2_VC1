<?php


class DashboardController extends BaseController {

private $todayMoneyModel;

public function __construct() {
    $this->todayMoneyModel = new TodayMoneyModel();
}

public function index() {
    // Retrieve today's customer count
    $todayCustomers = $this->todayMoneyModel->getTodayCustomers();

    // Retrieve yesterday's customer count
    $yesterdayCustomers = $this->todayMoneyModel->getYesterdayCustomers();

    // Calculate the percentage change in customers
    $customerPercentageChange = $this->todayMoneyModel->getCustomerPercentageChange();

    $totalSuppliers = $this->todayMoneyModel->getTotalSuppliers();
    $totalPurchaseorders = $this->todayMoneyModel->getTotalPurchaseorders();
    $percentageChange = -2; // xample: you can dynamically calculate this if needed
    // Retrieve today's money data
    $todayMoneyData = $this->todayMoneyModel->getTodayMoneyData();

    // Load the view and pass the data
    $this->renderView('adminView/dashboard/dashboard', [
        'today_money' => $todayMoneyData['today_money'],
        'total_income' => $todayMoneyData['total_income'],
        'total_expenses' => $todayMoneyData['total_expenses'],
        'total_customers_today' => $todayCustomers,
        'customer_percentage_change' => $customerPercentageChange, // Pass percentage change to the view
        'totalSuppliers' => $totalSuppliers,
        'percentageChange' => $percentageChange,
        'totalPurchaseorders' => $totalPurchaseorders

    ]);
}
}
