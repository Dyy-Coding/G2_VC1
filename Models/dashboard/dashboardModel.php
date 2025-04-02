<?php

class TodayMoneyModel {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getOrderOverview() {
        $query = "SELECT COUNT(*) AS total_orders, SUM(TotalAmount) AS total_revenue FROM salesorders";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllUsers() {
        $stmt = $this->conn->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSalesForLast12Months() {
        $query = "
            SELECT 
                YEAR(OrderDate) AS year,
                MONTH(OrderDate) AS month,
                SUM(totalAmount) AS totalSalesAmount
            FROM salesorders
            WHERE OrderDate >= CURDATE() - INTERVAL 12 MONTH
            GROUP BY year, month
            ORDER BY year DESC, month DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $salesData = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($salesData as &$data) {
            $data['month'] = date("M", mktime(0, 0, 0, $data['month'], 1));
            $data['totalSalesAmount'] = number_format($data['totalSalesAmount'], 2);
        }
        return $salesData ?: [];
    }

    public function getTodayMoneyData() {
        $query = "
            SELECT 
                (COALESCE((SELECT SUM(Total) FROM salesorderdetails WHERE DATE(SalesOrderDetail_Date) = CURDATE()), 0) +
                COALESCE((SELECT SUM(Amount) FROM payments WHERE DATE(PaymentDate) = CURDATE()), 0) +
                COALESCE((SELECT SUM(Amount) FROM invoices WHERE DATE(invoiceDate) = CURDATE() AND payment_status = 'Paid'), 0)) AS total_income,
                (COALESCE((SELECT SUM(Amount) FROM expenses WHERE DATE(date_expenses) = CURDATE()), 0) +
                COALESCE((SELECT SUM(TotalAmount) FROM purchaseorders WHERE DATE(OrderDate) = CURDATE()), 0) +
                COALESCE((SELECT SUM(TotalReceivedAmount) FROM goodsreceived WHERE DATE(ReceivedDate) = CURDATE()), 0)) AS total_expenses,
                ((COALESCE((SELECT SUM(Total) FROM salesorderdetails WHERE DATE(SalesOrderDetail_Date) = CURDATE()), 0) +
                COALESCE((SELECT SUM(Amount) FROM payments WHERE DATE(PaymentDate) = CURDATE()), 0) +
                COALESCE((SELECT SUM(Amount) FROM invoices WHERE DATE(invoiceDate) = CURDATE() AND payment_status = 'Paid'), 0)) - 
                (COALESCE((SELECT SUM(Amount) FROM expenses WHERE DATE(date_expenses) = CURDATE()), 0) +
                COALESCE((SELECT SUM(TotalAmount) FROM purchaseorders WHERE DATE(OrderDate) = CURDATE()), 0) +
                COALESCE((SELECT SUM(TotalReceivedAmount) FROM goodsreceived WHERE DATE(ReceivedDate) = CURDATE()), 0))) AS today_money";

        $stmt = $this->conn->query($query);
        return $stmt ? $stmt->fetch(PDO::FETCH_ASSOC) : [ 'total_income' => 0, 'total_expenses' => 0, 'today_money' => 0 ];
    }

    public function getTotalSalesAndOrders() {
        $query = "SELECT SUM(TotalAmount) AS total_sales, COUNT(*) AS total_sales_orders FROM salesorders WHERE DATE(CreatedAt) = CURDATE();";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $todaySales = $stmt->fetch(PDO::FETCH_ASSOC);

        $queryYesterday = "SELECT SUM(TotalAmount) AS yesterday_sales FROM salesorders WHERE DATE(CreatedAt) = CURDATE() - INTERVAL 1 DAY;";
        $stmtYesterday = $this->conn->prepare($queryYesterday);
        $stmtYesterday->execute();
        $yesterdaySales = $stmtYesterday->fetch(PDO::FETCH_ASSOC);
        
        return array_merge($todaySales, $yesterdaySales);
    }

    public function getCustomerPercentageChange() {
        $todayCustomers = $this->getTodayCustomers();
        $yesterdayCustomers = $this->getYesterdayCustomers();
        return ($yesterdayCustomers > 0) ? (($todayCustomers - $yesterdayCustomers) / $yesterdayCustomers) * 100 : 0;
    }

    public function getTodayCustomers() {
        $query = "SELECT COUNT(*) AS total_customers_today FROM Customers WHERE DATE(created) = CURDATE()";
        return $this->conn->query($query)->fetchColumn();
    }

    public function getYesterdayCustomers() {
        $query = "SELECT COUNT(*) AS total_customers_yesterday FROM Customers WHERE DATE(created) = CURDATE() - INTERVAL 1 DAY";
        return $this->conn->query($query)->fetchColumn();
    }

    public function getTotalSuppliers() {
        return $this->conn->query("SELECT COUNT(*) AS total FROM suppliers")->fetchColumn();
    }

    public function getTotalPurchaseorders() {
        return $this->conn->query("SELECT COUNT(*) AS totalPurchaseorders FROM purchaseorders")->fetchColumn();
    }



    public function __destruct() {
        $this->conn = null;
    }
}
?>
