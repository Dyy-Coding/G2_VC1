<?php

class DashboardController extends BaseController {

    private $todayMoneyModel;
    private $stockModel;

    public function __construct() {
        $this->todayMoneyModel = new TodayMoneyModel();
        $this->stockModel = new StockModel();
    }

    // Format currency or numerical values with decimal precision
    private function formatCurrency($amount) {
        return number_format($amount ?? 0, 2);
    }

    // Format percentage change with two decimal places
    private function formatPercentageChange($current, $previous) {
        return $previous > 0 
            ? number_format((($current - $previous) / $previous) * 100, 2)
            : 0;
    }

    public function index() {
        try {
            // --- Customers Data (updated) ---
            $todayCustomersData = $this->todayMoneyModel->getTodayCustomers();
            $totalCustomersToday = $todayCustomersData['total_customers_today'] ?? 0;
            $totalCustomersYesterday = $todayCustomersData['total_customers_yesterday'] ?? 0;
            $customerPercentageChange = $todayCustomersData['percent_change'] ?? 'N/A';
    
            // --- Suppliers & Purchases ---
            $totalSuppliers = $this->todayMoneyModel->getTotalSuppliers();
    
            // --- Today's Money Data (from View) ---
            $todayMoneyData = $this->todayMoneyModel->getTodayMoneyData();
            $todayMoney = $this->formatCurrency($todayMoneyData['today_money']);
            $totalIncome = $this->formatCurrency($todayMoneyData['total_income']);
            $totalExpenses = $this->formatCurrency($todayMoneyData['total_expenses']);
            $percentChange = isset($todayMoneyData['percent_change']) 
                ? number_format($todayMoneyData['percent_change'], 2) 
                : 'N/A';
    
            // --- Stock & Purchase Data ---
            $stockListData = $this->stockModel->getStockList();
            $purchaseListData = $this->stockModel->getTopPurchasedMaterials();
    
            // --- Get Purchase Orders for This Month ---
            $getThisMonthPurchase = $this->todayMoneyModel->getLastMonthPurchaseOrder();
            // var_dump($getThisMonthPurchase); // You can remove this line after debugging.
            // Access the fields from the result
            $getThisMonthPurchaseOrder = $getThisMonthPurchase['total_orders'] ?? 0; // total_orders
            $totalPurchaseAmount = $this->formatCurrency($getThisMonthPurchase['total_purchase_amount'] ?? 0); // total_purchase_amount
            $completedOrders = $getThisMonthPurchase['completed_orders'] ?? 0; // completed_orders
            $pendingOrders = $getThisMonthPurchase['pending_orders'] ?? 0; // pending_orders
            $completedOrdersPercent = $getThisMonthPurchase['completed_orders_percent'] ?? 0; // completed_orders_percent
    
            // --- Total Sales & Orders (from View) ---
            $salesAndOrders = $this->todayMoneyModel->getTotalSalesAndOrders();
            $totalSalesAmount = $this->formatCurrency($salesAndOrders['total_sales']);
            $totalSalesOrders = $salesAndOrders['total_sales_orders'] ?? 0;
            $yesterdaySalesAmount = $this->formatCurrency($salesAndOrders['yesterday_sales']);
            $salesPercentageChange = $this->formatPercentageChange($salesAndOrders['total_sales'], $salesAndOrders['yesterday_sales']);
    
            // --- Users ---
            $customers = $this->todayMoneyModel->getAllCustomers();
            $workers = $this->todayMoneyModel->getAllWorkers();
            $suppliersData = $this->todayMoneyModel->getSuppliersData();
    
            // --- Prepare data for the view ---
            $viewData = [
                'today_money'              => $todayMoney,
                'total_income'             => $totalIncome,
                'total_expenses'           => $totalExpenses,
                'percent_change'           => $percentChange,
                'total_customers_today'    => $totalCustomersToday,
                'total_customers_yesterday' => $totalCustomersYesterday,
                'customer_percentage_change' => $customerPercentageChange,
                'totalSuppliers'           => $totalSuppliers,
                'totalSalesAmount'         => $totalSalesAmount,
                'totalSalesOrders'         => $totalSalesOrders,
                'yesterdaySalesAmount'     => $yesterdaySalesAmount,
                'salesPercentageChange'    => $salesPercentageChange,
                'stockListData'            => $stockListData,
                'customers'                => $customers,
                'workers'                  => $workers,
                'purchaseListData'         => $purchaseListData,
                'suppliersData'            => $suppliersData,
                // Passing the purchase order summary data to the view
                'getThisMonthPurchaseOrder' =>  $getThisMonthPurchaseOrder,
                'totalPurchaseAmount'      => $totalPurchaseAmount,
                'completedOrders'          => $completedOrders,
                'pendingOrders'            => $pendingOrders,
                'completedOrdersPercent'   => $completedOrdersPercent
            ];
    
            // Render the dashboard view
            $this->renderView('adminView/dashboard/dashboard', $viewData);
    
        } catch (Exception $e) {
            // Error logging with more context
            error_log("Error in DashboardController - " . $e->getMessage());
            $this->renderView('errorPage', ['message' => "An error occurred while loading the dashboard. Please try again later."]);
        }
    }
    
}
