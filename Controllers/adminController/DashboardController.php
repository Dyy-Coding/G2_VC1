<?php

class DashboardController extends BaseController {

    private $todayMoneyModel;
    private $stockModel;

    public function __construct() {
        $this->todayMoneyModel = new TodayMoneyModel();
        $this->stockModel = new StockModel();
    }
 

// Assuming a connection to the database is already established


    
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

            $stockListData = $this->stockModel->getStockList();
            $purchaseListData = $this->stockModel->getTopPurchasedMaterials();
         

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
            $salesOverview = $this->todayMoneyModel->getSalesForLast12Months();


            // users data 
            $customers = $this->todayMoneyModel->getAllCustomers();
            // var_dump( $customers);
            $workers = $this->todayMoneyModel->getAllworkers();
            $SuppliersData = $this->todayMoneyModel->getSuppliersData();
            // var_dump( $workers);
               
            $labels = [];
            $salesData = [];

            foreach ($salesOverview as $data) {
                $monthName = date("M", strtotime("1 " . $data['month'] . " " . $data['year'])); // Convert to "Apr", "May" etc.
                if (!in_array($monthName, $labels)) { // Avoid duplicate months
                    $labels[] = $monthName;
                    $salesData[] = (int) floatval(str_replace(',', '', $data['totalSalesAmount'])); // Convert sales to INT
                }
            }

            // Encode for JavaScript
            // Convert PHP arrays to JSON
            $labelsJson = ($labels);
            $salesDataJson = ($salesData);


            // --- Order Overview ---
            $orderOverview = $this->todayMoneyModel->getOrderOverview();

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
                'stockListData'            => $stockListData,
                'labels'                   => $labels,
                'salesData'                => $salesData,
                'orderOverview'            => $orderOverview, // Added order overview
                'customers'                =>  $customers,
                'workers'                  =>  $workers,
                'purchaseListData'         =>  $purchaseListData,
                'SuppliersData'         =>  $SuppliersData
            ];

            // Render the dashboard view with all data
            $this->renderView('adminView/dashboard/dashboard', $viewData);

        } catch (Exception $e) {
            // Log error message and show error page
            error_log("Error in DashboardController: " . $e->getMessage());
            $this->renderView('errorPage', ['message' => $e->getMessage()]);
        }
    }
}
