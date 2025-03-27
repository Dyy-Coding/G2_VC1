<?php

class TodayMoneyModel {
    private $conn;

    public function __construct() {
        // Initialize the database connection
        $this->conn = Database::getConnection();
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

    // Destructor to close the connection
    public function __destruct() {
        // Close the connection explicitly if needed
        if ($this->conn) {
            $this->conn = null; // Closing the PDO connection
        }
    }
}
?>
