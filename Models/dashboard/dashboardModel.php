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

    // Retrieve today's money data (income, expenses, net money, percentage change)
    public function getTodayMoneyData() {
        $query = "SELECT total_income, total_expenses, today_money, percent_change 
                  FROM daily_money_summary 
                  WHERE record_date = CURDATE() 
                  LIMIT 1";
        return $this->fetchSingleRow($query);
    }

    // Retrieve total sales and orders for today
    public function getTotalSalesAndOrders() {
        $query = "SELECT record_date, total_sales, total_sales_orders, yesterday_sales, percent_change 
                  FROM daily_sales_summary 
                  WHERE record_date = CURDATE()";
        return $this->fetchSingleRow($query, [
            'total_sales' => 0,
            'total_sales_orders' => 0,
            'yesterday_sales' => 0,
            'percent_change' => 0
        ]);
    }

    // Retrieve today's customers data with percentage change
    public function getTodayCustomers() {
        $query = "SELECT total_customers_today, total_customers_yesterday, percent_change 
                  FROM all_day_customers 
                  WHERE customer_date = CURDATE()";
        $data = $this->fetchSingleRow($query, [
            'total_customers_today' => 0,
            'total_customers_yesterday' => 0,
            'percent_change' => 'N/A'
        ]);

        // Format percentage change
        $data['percent_change'] = $data['percent_change'] !== null 
                                  ? number_format($data['percent_change'], 2) 
                                  : 'N/A';

        return $data;
    }

    // Retrieve total number of suppliers
    public function getTotalSuppliers() {
        $query = "SELECT COUNT(*) AS total FROM suppliers";
        return $this->fetchSingleValue($query);
    }

    // Retrieve purchase order summary for the current month
    public function getLastMonthPurchaseOrder() {
        $query = "SELECT *
FROM monthly_purchase_order_summary
WHERE month = DATE_FORMAT(DATE_SUB(CURRENT_DATE(), INTERVAL 1 MONTH), '%Y-%m')
";
        
        return $this->fetchSingleRow($query);
    }
    

    // Utility function to execute queries that return multiple rows
    private function executeQuery($query) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Utility function to fetch a single row and handle default values if no data is returned
    private function fetchSingleRow($query, $default = null) {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data ?: $default;
    }

    // Utility function to fetch a single value (e.g., COUNT) from a query
    private function fetchSingleValue($query) {
        return $this->conn->query($query)->fetchColumn();
    }

    // Destructor to close the database connection
    public function __destruct() {
        $this->conn = null;
    }
}
?>
