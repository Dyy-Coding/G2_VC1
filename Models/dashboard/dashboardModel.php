<?php

class TodayMoneyModel {
    private $conn;

    public function __construct() {
        // Initialize the connection
        $this->conn = Database::getConnection();
    }

    // Retrieve all suppliers data
    public function getSuppliersData() {
        $query = "SELECT SupplierID, Name, ContactPerson, Phone, image, Email, Address, CreatedAt, UpdatedAt FROM suppliers";
        return $this->executeQuery($query);
    }

    // Retrieve all workers (excluding roles 1 and 2)
    public function getAllWorkers() {
        $query = "SELECT u.*, r.role_name FROM Users u 
                  JOIN roles r ON u.role_id = r.role_id 
                  WHERE u.role_id != 2 AND u.role_id != 1";
        return $this->executeQuery($query);
    }

    // Retrieve all customers
    public function getAllCustomers() {
        $query = "SELECT * FROM customers";
        return $this->executeQuery($query);
    }

    // ✅ Updated: Retrieve today's money data with safe formatting
    public function getTodayMoneyData() {
        $query = "SELECT total_income, total_expenses, today_money, percent_change 
                  FROM daily_money_summary 
                  WHERE record_date = CURDATE() 
                  LIMIT 1";

        $data = $this->fetchSingleRow($query, [
            'total_income' => 0,
            'total_expenses' => 0,
            'today_money' => 0,
            'percent_change' => 0
        ]);

        // Format percent_change safely
        $data['percent_change'] = is_numeric($data['percent_change']) 
                                ? number_format((float)$data['percent_change'], 2) . '%' 
                                : '0.00%';

        return $data;
    }

    // Retrieve total sales and orders for today
    public function getTotalSalesAndOrders() {
        $query = "SELECT record_date, total_sales, total_sales_orders, yesterday_sales, percent_change 
                  FROM daily_sales_summary 
                  WHERE record_date = CURDATE()";

        $data = $this->fetchSingleRow($query, [
            'total_sales' => 0,
            'total_sales_orders' => 0,
            'yesterday_sales' => 0,
            'percent_change' => 0
        ]);

        $data['percent_change'] = is_numeric($data['percent_change']) 
                                ? number_format((float)$data['percent_change'], 2) . '%' 
                                : '0.00%';

        return $data;
    }

    public function getLastMonthSalesSummary()
{
    // Query to fetch the most recent sales summary data
    $query = "
        SELECT 
            year,
            month,
            totalOrders,
            totalAmount,
            percentFromLastMonth
        FROM MonthlySalesSummary
        ORDER BY year DESC, month DESC
        LIMIT 1
    ";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        $year = $row['year'];
        $month = $row['month'];
        $totalOrders = (int)$row['totalOrders'];
        $totalAmount = (float)$row['totalAmount'];
        $percentFromLastMonth = $row['percentFromLastMonth'] !== null ? number_format($row['percentFromLastMonth'], 2) . '%' : 'N/A';  // Format percentage change

        // Return the last record
        return [
            'year' => $year,
            'month' => $month,
            'totalOrders' => $totalOrders,
            'totalAmount' => number_format($totalAmount, 2), // Format amount to 2 decimal places
            'percentFromLastMonth' => $percentFromLastMonth
        ];
    } else {
        // Return an empty result if no records exist
        return null;
    }
}


    // ✅ Updated: Retrieve today's customers data with percentage change
    public function getTodayCustomers() {
        $query = "SELECT total_customers_today, total_customers_yesterday, percent_change 
                  FROM all_day_customers 
                  WHERE customer_date = CURDATE()";

        $data = $this->fetchSingleRow($query, [
            'total_customers_today' => 0,
            'total_customers_yesterday' => 0,
            'percent_change' => 0
        ]);

        $data['percent_change'] = is_numeric($data['percent_change']) 
                                ? number_format((float)$data['percent_change'], 2) . '%' 
                                : '0.00%';

        return $data;
    }

    // Retrieve total number of suppliers
    public function getTotalSuppliers() {
        $query = "SELECT COUNT(*) AS total FROM suppliers";
        return $this->fetchSingleValue($query);
    }

    // Retrieve purchase order summary for the last month
    public function getLastMonthPurchaseOrder() {
        $query = "SELECT * 
                  FROM monthly_purchase_order_summary 
                  WHERE month = DATE_FORMAT(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH), '%Y-%m')";
        return $this->fetchSingleRow($query);
    }

    // Utility: Execute queries that return multiple rows
    private function executeQuery($query) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Utility: Fetch a single row, fallback to defaults if no result
    private function fetchSingleRow($query, $default = null) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ?: $default;
    }

    // Utility: Fetch a single scalar value (e.g., COUNT)
    private function fetchSingleValue($query) {
        return $this->conn->query($query)->fetchColumn();
    }

    // Close connection
    public function __destruct() {
        $this->conn = null;
    }
}
?>
