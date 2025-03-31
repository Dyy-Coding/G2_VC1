<?php

class TodayMoneyModel {
    private $conn;

    public function __construct() {
        // Initialize the database connection
        $this->conn = Database::getConnection();
    }


   // Function to get total sales for the last 12 months
    // Function to get total sales for the last 12 months
    /**
     * Get sales data for the last 12 months
     */
    public function getSalesForLast12Months() {
        $query = "
            SELECT 
                YEAR(OrderDate) AS year,
                MONTH(OrderDate) AS month,
                SUM(totalAmount) AS totalSalesAmount
            FROM salesorders
            WHERE OrderDate >= CURDATE() - INTERVAL 12 MONTH
            GROUP BY YEAR(OrderDate), MONTH(OrderDate)
            ORDER BY year DESC, month DESC
        ";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $salesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Convert month number to full name
        foreach ($salesData as &$data) {
            $data['month'] = date("M", mktime(0, 0, 0, $data['month'], 1));
            $data['totalSalesAmount'] = number_format($data['totalSalesAmount'], 2);
        }

        return $salesData ?: [];
    }
    



    /**
     * Fetch today's total income and total expenses.
     */
    public function getTodayMoneyData() {
        // SQL query to fetch today's money data (total income and total expenses)
        $query = "
            SELECT 
                COALESCE(
                    (SELECT SUM(Total) FROM salesorderdetails WHERE DATE(SalesOrderDetail_Date) = CURDATE()), 
                    0
                ) +
                COALESCE(
                    (SELECT SUM(Amount) FROM payments WHERE DATE(PaymentDate) = CURDATE()), 
                    0
                ) +
                COALESCE(
                    (SELECT SUM(Amount) FROM invoices WHERE DATE(invoiceDate) = CURDATE() AND payment_status = 'Paid'), 
                    0
                ) AS total_income,

                COALESCE(
                    (SELECT SUM(Amount) FROM expenses WHERE DATE(date_expenses) = CURDATE()), 
                    0
                ) +
                COALESCE(
                    (SELECT SUM(TotalAmount) FROM purchaseorders WHERE DATE(OrderDate) = CURDATE()), 
                    0
                ) +
                COALESCE(
                    (SELECT SUM(TotalReceivedAmount) FROM goodsreceived WHERE DATE(ReceivedDate) = CURDATE()), 
                    0
                ) AS total_expenses,

                (
                    (
                        COALESCE(
                            (SELECT SUM(Total) FROM salesorderdetails WHERE DATE(SalesOrderDetail_Date) = CURDATE()), 
                            0
                        ) +
                        COALESCE(
                            (SELECT SUM(Amount) FROM payments WHERE DATE(PaymentDate) = CURDATE()), 
                            0
                        ) +
                        COALESCE(
                            (SELECT SUM(Amount) FROM invoices WHERE DATE(invoiceDate) = CURDATE() AND payment_status = 'Paid'), 
                            0
                        )
                    ) - 
                    (
                        COALESCE(
                            (SELECT SUM(Amount) FROM expenses WHERE DATE(date_expenses) = CURDATE()), 
                            0
                        ) +
                        COALESCE(
                            (SELECT SUM(TotalAmount) FROM purchaseorders WHERE DATE(OrderDate) = CURDATE()), 
                            0
                        ) +
                        COALESCE(
                            (SELECT SUM(TotalReceivedAmount) FROM goodsreceived WHERE DATE(ReceivedDate) = CURDATE()), 
                            0
                        )
                    )
                ) AS today_money;
        ";

        // Execute the query using PDO
        $stmt = $this->conn->query($query);

        // Check if the query was successful and fetch the result
        if ($stmt) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC); // Fetch the associative array

            // If a row is found, return the data; otherwise, return default values
            if ($row) {
                return [
                    'total_income' => $row['total_income'],
                    'total_expenses' => $row['total_expenses'],
                    'today_money' => $row['today_money']
                ];
            } else {
                return [
                    'total_income' => 0,
                    'total_expenses' => 0,
                    'today_money' => 0
                ];
            }
        } else {
            // If query fails, return default values
            return [
                'total_income' => 0,
                'total_expenses' => 0,
                'today_money' => 0
            ];
        }
    }

     /**
     * Get total sales and total sales orders for the sales overview
     */
    public function getTotalSalesAndOrders() {
        $query = "
            SELECT 
                SUM(TotalAmount) AS total_sales, 
                COUNT(*) AS total_sales_orders 
            FROM salesorders
            WHERE DATE(CreatedAt) = CURDATE();
        ";
    
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $todaySales = $stmt->fetch(PDO::FETCH_ASSOC);
    
        $queryYesterday = "
            SELECT 
                SUM(TotalAmount) AS yesterday_sales
            FROM salesorders
            WHERE DATE(CreatedAt) = CURDATE() - INTERVAL 1 DAY;
        ";
    
        $stmtYesterday = $this->conn->prepare($queryYesterday);
        $stmtYesterday->execute();
        $yesterdaySales = $stmtYesterday->fetch(PDO::FETCH_ASSOC);
    
        return array_merge($todaySales, $yesterdaySales);
    }


      /**
     * Fetch the total number of customers added today.
     */  // Existing method to get today's customers
    public function getTodayCustomers() {
        $query = "SELECT COUNT(*) AS total_customers_today FROM Customers WHERE DATE(created) = CURDATE()";
        $stmt = $this->conn->query($query);

        if ($stmt) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? $row['total_customers_today'] : 0;
        }
        return 0;
    }

    // New method to get yesterday's customers
    public function getYesterdayCustomers() {
        $query = "SELECT COUNT(*) AS total_customers_yesterday FROM Customers WHERE DATE(created) = CURDATE() - INTERVAL 1 DAY";
        $stmt = $this->conn->query($query);

        if ($stmt) {
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row ? $row['total_customers_yesterday'] : 0;
        }
        return 0;
    }

    // Method to calculate the percentage change
    public function getCustomerPercentageChange() {
        $todayCustomers = $this->getTodayCustomers();
        $yesterdayCustomers = $this->getYesterdayCustomers();

        if ($yesterdayCustomers > 0) {
            // Calculate percentage change
            $percentageChange = (($todayCustomers - $yesterdayCustomers) / $yesterdayCustomers) * 100;
        } else {
            // If no customers yesterday, consider the percentage change as 100% increase
            $percentageChange = 0;
        }

        return $percentageChange;
    }


    public function getTotalSuppliers() {
        $query = "SELECT COUNT(*) AS total FROM suppliers";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    }
    public function getTotalPurchaseorders() {
        $query = "SELECT COUNT(*) AS totalPurchaseorders FROM `purchaseorders`;";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['totalPurchaseorders'];
    }


        // Get total sales amount and percentage change
        public function getSalesSummary() {
            $query = "
                SELECT 
                    SUM(TotalAmount) AS total_sales,
                    (SELECT (SUM(TotalAmount) - LAG(SUM(TotalAmount)) OVER (ORDER BY DATE(CreatedAt))) / 
                    NULLIF(LAG(SUM(TotalAmount)) OVER (ORDER BY DATE(CreatedAt)), 0) * 100 
                    FROM salesorders WHERE CreatedAt >= DATE_SUB(NOW(), INTERVAL 2 MONTH) LIMIT 1) AS percentage_change
                FROM salesorders
                WHERE CreatedAt >= DATE_SUB(NOW(), INTERVAL 1 MONTH);
            ";
            
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }



        // Get sales data for the past 12 months
 // Method to fetch sales overview for the last 12 months
 public function getSalesOverview() {
    $query = "
        SELECT 
            DATE_FORMAT(CreatedAt, '%Y-%m') AS month, 
            SUM(CASE WHEN YEAR(CreatedAt) = YEAR(NOW()) THEN TotalAmount ELSE 0 END) AS current_year_sales
        FROM salesorders
        WHERE CreatedAt >= DATE_SUB(NOW(), INTERVAL 12 MONTH)
        GROUP BY month
        ORDER BY month ASC;
    ";

    $stmt = $this->conn->prepare($query);
    $stmt->execute();
    $salesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Return sales data (Ensure it's an array)
    return $salesData;
}

        


        public function getSalesDataForYear($year) {
            $query = "
                SELECT SUM(TotalAmount) AS total_sales 
                FROM salesorders 
                WHERE YEAR(CreatedAt) = :year;
            ";
            
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':year', $year, PDO::PARAM_INT);
            $stmt->execute();
            
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

    // Destructor to close the connection
    public function __destruct() {
        // Close the connection explicitly if needed
        if ($this->conn) {
            $this->conn = null; // Closing the PDO connection
        }
    }

 
}
?>
