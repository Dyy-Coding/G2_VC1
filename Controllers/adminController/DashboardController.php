<?php

class DashboardController extends BaseController {

    private $todayMoneyModel;
    private $stockModel;
    private $monthlySalesSummaryModel;

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
            $percentChange = $todayMoneyData['percent_change'] ?? 'N/A';

            // --- Stock & Purchase Data --- 
            $stockListData = $this->stockModel->getStockList();
            $purchaseListData = $this->stockModel->getTopPurchasedMaterials();

            // --- Get Purchase Orders for This Month --- 
            $getThisMonthPurchase = $this->todayMoneyModel->getLastMonthPurchaseOrder();
            $getThisMonthPurchaseOrder = $getThisMonthPurchase['total_orders'] ?? 0;
            $totalPurchaseAmount = $this->formatCurrency($getThisMonthPurchase['total_purchase_amount'] ?? 0);
            $completedOrders = $getThisMonthPurchase['completed_orders'] ?? 0;
            $pendingOrders = $getThisMonthPurchase['pending_orders'] ?? 0;
            $completedOrdersPercent = $getThisMonthPurchase['completed_orders_percent'] ?? 0;

            // --- Total Sales & Orders (from View) --- 
            $salesAndOrders = $this->todayMoneyModel->getTotalSalesAndOrders();
            $totalSalesAmount = $this->formatCurrency($salesAndOrders['total_sales']);
            $totalSalesOrders = $salesAndOrders['total_sales_orders'] ?? 0;
            $yesterdaySalesAmount = $this->formatCurrency($salesAndOrders['yesterday_sales']);
            $salesPercentageChange = $this->formatPercentageChange($salesAndOrders['total_sales'], $salesAndOrders['yesterday_sales']);

            // --- Get the latest sales summary (Last Month's) --- 
            $lastMonthSalesSummary = $this->todayMoneyModel->getLastMonthSalesSummary();
            $lastMonthYear = $lastMonthSalesSummary['year'] ?? 'N/A';
            $lastMonthMonth = $lastMonthSalesSummary['month'] ?? 'N/A';
            $lastMonthTotalOrders = $lastMonthSalesSummary['totalOrders'] ?? 0;
            $lastMonthTotalAmount = $lastMonthSalesSummary['totalAmount'] ?? '0.00';
            $lastMonthPercentFromLastMonth = $lastMonthSalesSummary['percentFromLastMonth'] ?? 'N/A';

            // --- Users --- 
            $customers = $this->todayMoneyModel->getAllCustomers();
            $workers = $this->todayMoneyModel->getAllWorkers();
            $suppliersData = $this->todayMoneyModel->getSuppliersData();

            // --- Prepare data for the view --- 
            $viewData = [
                'today_money'                => $todayMoney,
                'total_income'               => $totalIncome,
                'total_expenses'             => $totalExpenses,
                'percent_change'             => $percentChange,
                'total_customers_today'      => $totalCustomersToday,
                'total_customers_yesterday'  => $totalCustomersYesterday,
                'customer_percentage_change' => $customerPercentageChange,
                'totalSuppliers'             => $totalSuppliers,
                'totalSalesAmount'           => $totalSalesAmount,
                'totalSalesOrders'           => $totalSalesOrders,
                'yesterdaySalesAmount'       => $yesterdaySalesAmount,
                'salesPercentageChange'      => $salesPercentageChange,
                'stockListData'              => $stockListData,
                'customers'                  => $customers,
                'workers'                    => $workers,
                'purchaseListData'           => $purchaseListData,
                'suppliersData'              => $suppliersData,
                'getThisMonthPurchaseOrder'  => $getThisMonthPurchaseOrder,
                'totalPurchaseAmount'        => $totalPurchaseAmount,
                'completedOrders'            => $completedOrders,
                'pendingOrders'              => $pendingOrders,
                'completedOrdersPercent'     => $completedOrdersPercent,
                
                // Add last month's sales summary to the view
                'lastMonthYear'              => $lastMonthYear,
                'lastMonthMonth'             => $lastMonthMonth,
                'lastMonthTotalOrders'       => $lastMonthTotalOrders,
                'lastMonthTotalAmount'       => $lastMonthTotalAmount,
                'lastMonthPercentFromLastMonth' => $lastMonthPercentFromLastMonth
            ];

            // Render the dashboard view
            $this->renderView('adminView/dashboard/dashboard', $viewData);

        } catch (Exception $e) {
            error_log("Error in DashboardController - " . $e->getMessage());
            $this->renderView('errorPage', ['message' => "An error occurred while loading the dashboard. Please try again later."]);
        }
    }

}
