<?php

class DashboardController extends BaseController {

    private $todayMoneyModel;
    private $StockModel;

    public function __construct() {
        // Initialize the model for today money data
        $this->todayMoneyModel = new TodayMoneyModel();
        $this->StockModel = new StockModel();
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
        
        // Retrieve today's money data
        $todayMoneyData = $this->todayMoneyModel->getTodayMoneyData();
        
        // Sales data (summary and percentage change)
        $data = $this->todayMoneyModel->getSalesSummary();
        $totalSales = number_format($data['total_sales'], 2);
        $percentageChange = number_format($data['percentage_change'], 2);
        
        // Get sales data for the current year
        $currentYear = date('Y');
        $currentYearSales = $this->todayMoneyModel->getSalesDataForYear($currentYear)['total_sales'];
        
        // Get sales data for the previous year
        $previousYear = $currentYear - 1;
        $previousYearSales = $this->todayMoneyModel->getSalesDataForYear($previousYear)['total_sales'];
        
        // Calculate the percentage change
        $percentageChangesales = 0;
        if ($previousYearSales > 0) {
            $percentageChangesales = (($currentYearSales - $previousYearSales) / $previousYearSales) * 100;
        }
        
        // Format the sales data and percentage change for display
        $currentYearSalesFormatted = number_format($currentYearSales, 2);
        $previousYearSalesFormatted = number_format($previousYearSales, 2);
        $percentageChangeFormatted = number_format($percentageChangesales, 2);

        // Stock list data
        // Fetch the stock list data
        $stockListData = $this->StockModel->getStockList();
        
        // Retrieve sales overview for the last 12 months
        // $salesOverview = $this->todayMoneyModel->getSalesOverview();
        
        // Retrieve total sales and total sales orders
        $salesAndOrders = $this->todayMoneyModel->getTotalSalesAndOrders();
        $totalSalesAmount = number_format($salesAndOrders['total_sales'], 2);
        $totalSalesOrders = $salesAndOrders['total_sales_orders'];
        $yesterdaySalesAmount = number_format($salesAndOrders['yesterday_sales'], 2);
        
        // Calculate percentage change in sales from yesterday
        $salesPercentageChange = 0;
        if ($salesAndOrders['yesterday_sales'] > 0) {
            $salesPercentageChange = (($salesAndOrders['total_sales'] - $salesAndOrders['yesterday_sales']) / $salesAndOrders['yesterday_sales']) * 100;
        }
        
        // Pass all the data to the view, including the stock list
        $this->renderView('adminView/dashboard/dashboard', [
            'today_money' => $todayMoneyData['today_money'],
            'total_income' => $todayMoneyData['total_income'],
            'total_expenses' => $todayMoneyData['total_expenses'],
            'total_customers_today' => $todayCustomers,
            'customer_percentage_change' => $customerPercentageChange, // Pass percentage change to the view
            'totalSuppliers' => $totalSuppliers,
            'totalPurchaseorders' => $totalPurchaseorders,
            'totalSalesAmount' => $totalSalesAmount,
            'totalSalesOrders' => $totalSalesOrders,
            'yesterdaySalesAmount' => $yesterdaySalesAmount,
            'salesPercentageChange' => number_format($salesPercentageChange, 2),
            'percentageChangesales' => $percentageChangesales,
            'stockListData' => $stockListData // Pass the stock list data to the view
        ]);
    }
}

?>
