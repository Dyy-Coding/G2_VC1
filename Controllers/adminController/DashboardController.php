<?php

class DashboardController extends BaseController {

    private $todayMoneyModel;
    private $stockModel;
    private $salesOverview;

    public function __construct() {
        $this->todayMoneyModel = new TodayMoneyModel();
        $this->stockModel = new StockModel();
        $this->salesOverview = $this->todayMoneyModel->getSalesForLast12Months(); // Make sure this is correct
    }
    
    public function index() {
        try {
            // --- Customers Data ---
            $todayCustomers = $this->todayMoneyModel->getTodayCustomers(); 
            $customerPercentageChange = $this->todayMoneyModel->getCustomerPercentageChange();
            
            // --- Suppliers & Purchases ---
            $totalSuppliers = $this->todayMoneyModel->getTotalSuppliers();
            $totalPurchaseOrders = $this->todayMoneyModel->getTotalPurchaseOrders();

            // --- Today's Money Data ---
            $todayMoneyData = $this->todayMoneyModel->getTodayMoneyData();

            // --- Sales Summary ---
            $salesSummary = $this->todayMoneyModel->getSalesSummary();
            $totalSales = number_format($salesSummary['total_sales'], 2);
            $percentageChangesales = number_format($salesSummary['percentage_change'], 2);

            // --- Yearly Sales Data ---
            $currentYear = date('Y');
            $previousYear = $currentYear - 1;

            $currentYearSales = $this->todayMoneyModel->getSalesDataForYear($currentYear)['total_sales'] ?? 0;
            $previousYearSales = $this->todayMoneyModel->getSalesDataForYear($previousYear)['total_sales'] ?? 0;

            // Calculate Yearly Sales Percentage Change
            $percentageChangeSales = ($previousYearSales > 0) 
                ? (($currentYearSales - $previousYearSales) / $previousYearSales) * 100 
                : 0;

            // Format values for display
            $currentYearSalesFormatted = number_format($currentYearSales, 2);
            $previousYearSalesFormatted = number_format($previousYearSales, 2);
            $percentageChangeFormatted = number_format($percentageChangeSales, 2);

            // --- Stock Data ---
            $stockListData = $this->stockModel->getStockList();

            // --- Total Sales & Orders ---
            $salesAndOrders = $this->todayMoneyModel->getTotalSalesAndOrders();

            $totalSalesAmount = number_format($salesAndOrders['total_sales'], 2);
            $totalSalesOrders = $salesAndOrders['total_sales_orders'] ?? 0;
            $yesterdaySalesAmount = number_format($salesAndOrders['yesterday_sales'], 2);

            // Calculate Percentage Change in Sales from Yesterday
            $salesPercentageChange = ($salesAndOrders['yesterday_sales'] > 0) 
                ? (($salesAndOrders['total_sales'] - $salesAndOrders['yesterday_sales']) / $salesAndOrders['yesterday_sales']) * 100 
                : 0;

            // --- Sales Overview for Last 12 Months ---
            $labels = [];
            $salesData = [];

            foreach ($this->salesOverview as $data) { // Fixed variable name
                $labels[] = $data['month']; // Month as "Jan", "Feb", etc.
                $salesData[] = $data['totalSalesAmount']; // Total sales
            }

            // Prepare data for the view
            $viewData = [
                'today_money'              => $todayMoneyData['today_money'],
                'total_income'             => $todayMoneyData['total_income'],
                'total_expenses'           => $todayMoneyData['total_expenses'],
                'total_customers_today'    => $todayCustomers,
                'customer_percentage_change' => $customerPercentageChange,
                'totalSuppliers'           => $totalSuppliers,
                'totalPurchaseOrders'      => $totalPurchaseOrders,
                'totalSalesAmount'         => $totalSalesAmount,
                'totalSalesOrders'         => $totalSalesOrders,
                'yesterdaySalesAmount'     => $yesterdaySalesAmount,
                'salesPercentageChange'    => number_format($salesPercentageChange, 2),
                'percentageChangesales'    => $percentageChangeFormatted,
                'stockListData'            => $stockListData,
                'labels'                   => $labels, // Fixed variable name
                'salesData'                => $salesData, // Added sales data for chart
                'labelsJson'               => json_encode($labels), // Pre-encoded for JS
                'salesDataJson'            => json_encode($salesData) // Pre-encoded for JS
            ];

            // Render the dashboard view with all data
            $this->renderView('adminView/dashboard/dashboard', $viewData);

        } catch (Exception $e) {
            // Log error message and show error page
            error_log("Error in DashboardController: " . $e->getMessage());
            $this->renderView('errorPage', ['message' => "Failed to load dashboard data."]);
        }
    }
}