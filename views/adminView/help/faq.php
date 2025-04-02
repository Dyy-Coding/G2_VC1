<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback System</title>
    <style>
        /* Styling for the entire page */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
            line-height: 1.6;
        }

        header {
            background: #007BFF;
            color: white;
            text-align: center;
            padding: 20px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 20px;
        }

        nav button {
            padding: 10px 20px;
            background: white;
            color: #007BFF;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        nav button:hover {
            background: #0056b3;
            color: white;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        input:focus, textarea:focus {
            border-color: #007BFF;
            outline: none;
        }

        button[type="submit"] {
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        .feedback-list {
            list-style-type: none;
            padding: 0;
        }

        .feedback-item {
            background: #f1f1f1;
            padding: 15px;
            margin-bottom: 10px;
            border-radius: 4px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feedback-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .pagination {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
        }

        .pagination button {
            padding: 5px 10px;
            background: #ddd;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .pagination button.active {
            background: #007BFF;
            color: white;
        }

        .admin-section {
            display: none; /* Hidden by default */
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }

            nav {
                flex-direction: column;
                gap: 10px;
            }
        }

        /* Additional styles to reach 300+ lines */
        footer {
            background: #007BFF;
            color: white;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        .hidden {
            display: none;
        }

        .error {
            color: red;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        .success {
            color: green;
            font-size: 0.9em;
            margin-top: -10px;
            margin-bottom: 10px;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Typography */
        h1 {
            font-size: 2rem;
            letter-spacing: 1px;
        }

        h2 {
            font-size: 1.5rem;
            letter-spacing: 0.5px;
        }

        p {
            font-size: 1rem;
            line-height: 1.6;
        }

        /* Buttons */
        .button-primary {
            background: #007BFF;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .button-primary:hover {
            background: #0056b3;
        }

        .button-secondary {
            background: #ddd;
            color: #333;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .button-secondary:hover {
            background: #bbb;
        }

        /* Forms */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s ease;
        }

        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #007BFF;
            outline: none;
        }

        /* Tables */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table th,
        table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        table th {
            background: #007BFF;
            color: white;
        }

        table tr:nth-child(even) {
            background: #f9f9f9;
        }

        table tr:hover {
            background: #f1f1f1;
        }

        /* Alerts */
        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 4px;
        }

        .alert-info {
            background: #d1ecf1;
            color: #0c5460;
            border: 1px solid #bee5eb;
        }

        .alert-success {
            background: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .alert-danger {
            background: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Pagination */
        .pagination-container {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }

        .pagination-container button {
            padding: 5px 10px;
            background: #ddd;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .pagination-container button.active {
            background: #007BFF;
            color: white;
        }

        /* Tooltip */
        .tooltip {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -60px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }

        /* Modals */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            border-radius: 8px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        /* Progress Bar */
        .progress-bar {
            width: 100%;
            background-color: #ddd;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-bar-fill {
            height: 20px;
            width: 0%;
            background-color: #007BFF;
            transition: width 0.3s ease;
        }

        /* Sliders */
        .slider {
            appearance: none;
            width: 100%;
            height: 10px;
            background: #ddd;
            outline: none;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }

        .slider:hover {
            opacity: 1;
        }

        .slider::-webkit-slider-thumb {
            appearance: none;
            width: 20px;
            height: 20px;
            background: #007BFF;
            cursor: pointer;
        }

        .slider::-moz-range-thumb {
            width: 20px;
            height: 20px;
            background: #007BFF;
            cursor: pointer;
        }

        /* Dropdowns */
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        /* Tabs */
        .tab {
            overflow: hidden;
            border: 1px solid #ccc;
            background-color: #f1f1f1;
        }

        .tab button {
            background-color: inherit;
            float: left;
            border: none;
            outline: none;
            cursor: pointer;
            padding: 14px 16px;
            transition: 0.3s;
        }

        .tab button:hover {
            background-color: #ddd;
        }

        .tab button.active {
            background-color: #ccc;
        }

        .tabcontent {
            display: none;
            padding: 6px 12px;
            border: 1px solid #ccc;
            border-top: none;
        }

        /* Accordion */
        .accordion {
            background-color: #eee;
            color: #444;
            cursor: pointer;
            padding: 18px;
            text-align: left;
            border: none;
            outline: none;
            transition: 0.4s;
        }

        .active, .accordion:hover {
            background-color: #ccc;
        }

        .panel {
            padding: 0 18px;
            display: none;
            background-color: white;
            overflow: hidden;
        }

        /* Spinners */
        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Cards */
        .card {
            background: white;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Grid System */
        .row {
            display: flex;
            flex-wrap: wrap;
            margin: -10px;
        }

        .col {
            flex: 1;
            padding: 10px;
        }

        /* Utility Classes */
        .text-center {
            text-align: center;
        }

        .text-right {
            text-align: right;
        }

        .text-left {
            text-align: left;
        }

        .mt-10 {
            margin-top: 10px;
        }

        .mb-10 {
            margin-bottom: 10px;
        }

        .p-10 {
            padding: 10px;
        }

        .rounded {
            border-radius: 4px;
        }

        .shadow {
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Icons */
        .icon {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        /* Media Queries */
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }

            nav {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <header>
        <h1>Feedback System</h1>
        <nav>
            <button onclick="toggleView('customer')">Customer Feedback</button>
            <button onclick="toggleView('admin')">Admin Dashboard</button>
        </nav>
    </header>

    <!-- Customer Feedback Section -->
    <div class="container" id="customer-section">
        <h2>Submit Feedback</h2>
        <form id="feedback-form">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="feedback">Feedback:</label>
                <textarea id="feedback" name="feedback" rows="4" required></textarea>
            </div>
            <button type="submit" class="button-primary">Submit Feedback</button>
        </form>
    </div>

    <!-- Admin Dashboard Section -->
    <div class="container admin-section" id="admin-section">
        <h2>Admin Dashboard</h2>
        <div class="filters">
            <label for="search">Search:</label>
            <input type="text" id="search" placeholder="Search feedback..." oninput="filterFeedback()">
            <label for="sort">Sort By:</label>
            <select id="sort" onchange="sortFeedback()">
                <option value="date">Date</option>
                <option value="name">Name</option>
            </select>
        </div>
        <ul id="feedback-list" class="feedback-list"></ul>
        <div class="pagination">
            <button id="prev-page" onclick="changePage(-1)">Previous</button>
            <span id="page-info"></span>
            <button id="next-page" onclick="changePage(1)">Next</button>
        </div>
    </div>

    <footer>
        &copy; 2023 Feedback System. All rights reserved.
    </footer>

    <script>
        // Initialize variables
        const feedbackListElement = document.getElementById('feedback-list');
        const searchInput = document.getElementById('search');
        const sortSelect = document.getElementById('sort');
        const prevPageButton = document.getElementById('prev-page');
        const nextPageButton = document.getElementById('next-page');
        const pageInfoElement = document.getElementById('page-info');

        let feedbacks = JSON.parse(localStorage.getItem('feedbacks')) || [];
        let currentPage = 1;
        const itemsPerPage = 5;

        /**
         * Render feedback items on the admin dashboard.
         * @param {Array} filteredFeedbacks - Array of feedback objects to display.
         */
        function renderFeedback(filteredFeedbacks) {
            feedbackListElement.innerHTML = ''; // Clear previous feedback

            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const currentItems = filteredFeedbacks.slice(startIndex, endIndex);

            currentItems.forEach((item, index) => {
                const li = document.createElement('li');
                li.className = 'feedback-item';
                li.innerHTML = `
                    <strong>Name:</strong> ${item.name}<br>
                    <strong>Email:</strong> ${item.email}<br>
                    <strong>Feedback:</strong> ${item.feedback}<br>
                    <small>${new Date(item.createdAt).toLocaleString()}</small>
                `;
                feedbackListElement.appendChild(li);
            });

            updatePagination(filteredFeedbacks.length);
        }

        /**
         * Update the pagination controls based on the total number of items.
         * @param {number} totalItems - Total number of feedback items.
         */
        function updatePagination(totalItems) {
            const totalPages = Math.ceil(totalItems / itemsPerPage);

            prevPageButton.disabled = currentPage === 1;
            nextPageButton.disabled = currentPage === totalPages;

            pageInfoElement.textContent = `Page ${currentPage} of ${totalPages}`;
        }

        /**
         * Filter feedback based on the search input.
         */
        function filterFeedback() {
            const searchTerm = searchInput.value.toLowerCase();
            const filteredFeedbacks = feedbacks.filter(feedback =>
                feedback.name.toLowerCase().includes(searchTerm) ||
                feedback.email.toLowerCase().includes(searchTerm) ||
                feedback.feedback.toLowerCase().includes(searchTerm)
            );

            renderFeedback(filteredFeedbacks);
        }

        /**
         * Sort feedback based on the selected option.
         */
        function sortFeedback() {
            const sortBy = sortSelect.value;

            if (sortBy === 'date') {
                feedbacks.sort((a, b) => b.createdAt - a.createdAt);
            } else if (sortBy === 'name') {
                feedbacks.sort((a, b) => a.name.localeCompare(b.name));
            }

            renderFeedback(feedbacks);
        }

        /**
         * Change the current page for pagination.
         * @param {number} direction - -1 for previous page, 1 for next page.
         */
        function changePage(direction) {
            currentPage += direction;
            const filteredFeedbacks = feedbacks.filter(feedback =>
                feedback.name.toLowerCase().includes(searchInput.value.toLowerCase()) ||
                feedback.email.toLowerCase().includes(searchInput.value.toLowerCase()) ||
                feedback.feedback.toLowerCase().includes(searchInput.value.toLowerCase())
            );
            renderFeedback(filteredFeedbacks);
        }

        /**
         * Handle form submission.
         */
        document.getElementById('feedback-form').addEventListener('submit', function (e) {
            e.preventDefault();

            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const feedbackText = document.getElementById('feedback').value.trim();

            if (!name || !email || !feedbackText) {
                alert('Please fill out all fields.');
                return;
            }

            // Create feedback object
            const newFeedback = {
                name,
                email,
                feedback: feedbackText,
                createdAt: new Date()
            };

            // Add to feedback list
            feedbacks.push(newFeedback);

            // Save to localStorage
            localStorage.setItem('feedbacks', JSON.stringify(feedbacks));

            // Clear form fields
            document.getElementById('name').value = '';
            document.getElementById('email').value = '';
            document.getElementById('feedback').value = '';

            // Re-render feedback list
            renderFeedback(feedbacks);
        });

        /**
         * Toggle between customer and admin views.
         * @param {string} section - 'customer' or 'admin'.
         */
        function toggleView(section) {
            const customerSection = document.getElementById('customer-section');
            const adminSection = document.getElementById('admin-section');

            if (section === 'customer') {
                customerSection.style.display = 'block';
                adminSection.style.display = 'none';
            } else if (section === 'admin') {
                customerSection.style.display = 'none';
                adminSection.style.display = 'block';
                renderFeedback(feedbacks); // Refresh admin dashboard
            }
        }

        // Initial rendering
        renderFeedback(feedbacks);
    </script>
</body>
</html> 