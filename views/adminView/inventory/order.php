<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Order Management</title>
    <style>
    /* General Styles */
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
    body {
        font-family: 'Inter', sans-serif;
        margin: 0;
        padding: 0;
        background: #ffffff;
        color: #333333;
        min-height: 100vh;
    }

    header {
        margin-top: 20px;
        border-radius: 8px;
        background-color: #ffffff;
        color: #333333;
        text-align: center;
        padding: 20px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    main {
        padding: 20px;
        max-width: 1200px;
        margin: 0 auto;
    }

    table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    background: white;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px; /* Rounded corners for the table */
    overflow: hidden; /* Ensures border-radius is applied */
}

table th, table td {
    padding: 12px;
    text-align: left;
}

table th {
    background-color: #f5f5f5;
    color: #333;
}

table tr {
    border-bottom: 1px solid #ddd; /* Keeps the row underline */
}

table tr:last-child {
    border-bottom: none; /* Removes underline for the last row */
}

table tr:hover {
    background-color: #f8f9fa;
}

    button {
        background-color: #007bff;
        color: white;
        border: none;
        padding: 8px 15px;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }

    .customer-detail {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin: 15px 0;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
        page-break-inside: avoid;
        border-radius: 12px; /* Rounded corners */
    }

    .filter-section {
        margin-bottom: 20px;
    }

    .filter-section input, .filter-section select {
        margin-right: 10px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>

</head>
<body>
    <header>
        <h1>Admin Order Management</h1>
    </header>
    <main>
        <!-- Filter Section -->
        <section class="filter-section">
            <h3>Filter Orders</h3>
            <input type="text" id="searchOrder" placeholder="Search by Customer Name" onkeyup="filterOrders()">
            <select id="filterStatus" onchange="filterOrders()">
                <option value="">All Statuses</option>
                <option value="Pending">Pending</option>
                <option value="Shipped">Shipped</option>
                <option value="Delivered">Delivered</option>
            </select>
            <button onclick="sortOrders()">Sort by Date</button>
        </section>

        <!-- Customer Orders Table -->
        <section>
            <h2>Customer Orders</h2>
            <table id="orderTable">
                <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Contact Info</th>
                        <th>Shipping Address</th>
                        <th>Material/Tool</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Timestamp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dynamic rows will be added here -->
                </tbody>
            </table>
        </section>

        <!-- Customer History Section -->
        <section id="customerHistory">
            <h2>Viewed Customers</h2>
        </section>
    </main>

    <script>
        // Sample Data: Predefined orders for demonstration
        const orders = [
            { 
                customerName: 'NinoAncy', 
                contactInfo: 'ninoAncy@example.com | +1234567890', 
                shippingAddress: '123 Main St, Springfield, IL', 
                material: 'Screws', 
                quantity: 100, 
                price: 50, 
                status: 'Delivered', 
                timestamp: '2023-10-01 10:00 AM' 
            },
            { 
                customerName: 'ShadoZz BoYY', 
                contactInfo: 'naruto@example.com | +0987654321', 
                shippingAddress: '456 Elm St, Metropolis, NY', 
                material: 'Nails', 
                quantity: 200, 
                price: 60, 
                status: 'Pending', 
                timestamp: '2023-10-02 11:30 AM' 
            },
            { 
                customerName: 'SuperAnjing', 
                contactInfo: 'supeanjing@example.com | +1122334455', 
                shippingAddress: '789 Oak St, Gotham, NJ', 
                material: 'Hammers', 
                quantity: 10, 
                price: 100, 
                status: 'Shipped', 
                timestamp: '2023-10-03 02:45 PM' 
            }
        ];

        let filteredOrders = [...orders];
        let clickCount = 0;
        const viewedCustomers = new Set();

        // Function to Populate the Table with Orders
        function populateOrderTable() {
            const tableBody = document.querySelector('#orderTable tbody');
            tableBody.innerHTML = '';

            filteredOrders.forEach((order, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${order.customerName}</td>
                    <td>${order.contactInfo}</td>
                    <td>${order.shippingAddress}</td>
                    <td>${order.material}</td>
                    <td>${order.quantity}</td>
                    <td>$${order.price.toFixed(2)}</td>
                    <td>${order.status}</td>
                    <td>${order.timestamp}</td>
                    <td><button onclick="showCustomerDetails(${index})">View Details</button></td>
                `;
                tableBody.appendChild(row);
            });
        }

        // Function to Show Customer Details
        function showCustomerDetails(index) {
            const order = filteredOrders[index];
            clickCount++;
            
            // Show alert every 20 clicks
            if (clickCount % 20 === 0) {
                alert(`You've viewed ${clickCount} customers!`);
            }

            // Check if customer already viewed
            if (viewedCustomers.has(index)) return;

            // Add to viewed customers
            viewedCustomers.add(index);

            // Create customer detail element
            const detailDiv = document.createElement('div');
            detailDiv.className = 'customer-detail';
            detailDiv.innerHTML = `
                <h3>${order.customerName}</h3>
                <p><strong>Contact:</strong> ${order.contactInfo}</p>
                <p><strong>Address:</strong> ${order.shippingAddress}</p>
                <p><strong>Material:</strong> ${order.material}</p>
                <p><strong>Quantity:</strong> ${order.quantity}</p>
                <p><strong>Price:</strong> $${order.price.toFixed(2)}</p>
                <p><strong>Status:</strong> ${order.status}</p>
                <p><strong>Date:</strong> ${order.timestamp}</p>
            `;

            // Add to history section
            document.getElementById('customerHistory').appendChild(detailDiv);
        }

        // Function to Filter Orders
        function filterOrders() {
            const searchValue = document.getElementById('searchOrder').value.toLowerCase();
            const statusFilter = document.getElementById('filterStatus').value;

            filteredOrders = orders.filter(order => {
                const matchesSearch = order.customerName.toLowerCase().includes(searchValue);
                const matchesStatus = statusFilter ? order.status === statusFilter : true;
                return matchesSearch && matchesStatus;
            });

            populateOrderTable();
        }

        // Function to Sort Orders by Timestamp
        function sortOrders() {
            filteredOrders.sort((a, b) => new Date(a.timestamp) - new Date(b.timestamp));
            populateOrderTable();
        }

        // Initialize the Page
        window.onload = () => {
            populateOrderTable();
        };
    </script>
</body>
</html>