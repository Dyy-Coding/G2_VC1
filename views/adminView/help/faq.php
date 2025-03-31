<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Feedback System</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        :root {
            --primary-color: #4285f4;
            --secondary-color: #34a853;
            --error-color: #ea4335;
            --text-color: #333;
            --bg-color: #fff;
            --card-bg: #f9f9f9;
            --border-color: #ddd;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            color: var(--text-color);
            background-color: var(--bg-color);
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid var(--border-color);
        }

        h1, h2, h3 {
            color: var(--primary-color);
            margin-top: 0;
        }

        .tab-container {
            display: flex;
            margin-bottom: 20px;
            border-bottom: 1px solid var(--border-color);
        }

        .tab {
            padding: 10px 20px;
            cursor: pointer;
            background-color: transparent;
            border: none;
            border-bottom: 3px solid transparent;
            font-size: 16px;
            transition: all 0.3s;
        }

        .tab:hover {
            background-color: #f1f1f1;
        }

        .tab.active {
            border-bottom-color: var(--primary-color);
            font-weight: bold;
        }

        .tab-content {
            display: none;
            padding: 20px 0;
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        /* Feedback Form */
        .feedback-form {
            background-color: var(--card-bg);
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-size: 16px;
            transition: border 0.3s;
        }

        input:focus, textarea:focus, select:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        textarea {
            min-height: 120px;
            resize: vertical;
        }

        .rating-container {
            margin: 15px 0;
        }

        .rating-label {
            margin-bottom: 10px;
            display: block;
        }

        .rating-stars {
            display: flex;
            gap: 5px;
        }

        .star {
            font-size: 28px;
            color: #ddd;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star:hover, .star.active {
            color: #ffc107;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-primary {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-primary:hover {
            background-color: #3367d6;
        }

        .btn-secondary {
            background-color: var(--secondary-color);
            color: white;
        }

        .btn-secondary:hover {
            background-color: #2d9249;
        }

        /* Feedback List */
        .feedback-list {
            display: grid;
            gap: 20px;
        }

        .feedback-item {
            background-color: var(--card-bg);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        .feedback-header {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            flex-wrap: wrap;
        }

        .feedback-user {
            font-weight: bold;
            color: var(--primary-color);
            margin-right: 15px;
        }

        .feedback-date {
            color: #666;
            font-size: 14px;
        }

        .feedback-category {
            display: inline-block;
            background-color: #e0e0e0;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: 12px;
            margin-right: 10px;
            text-transform: capitalize;
        }

        .feedback-rating {
            color: #ffc107;
            font-size: 18px;
            margin: 8px 0;
        }

        .feedback-text {
            margin-top: 10px;
            white-space: pre-wrap;
        }

        /* Admin Controls */
        .admin-controls {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search-box {
            flex-grow: 1;
            min-width: 200px;
            padding: 10px;
            border: 1px solid var(--border-color);
            border-radius: 4px;
        }

        /* Stats Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background-color: var(--card-bg);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            text-align: center;
        }

        .stat-value {
            font-size: 32px;
            font-weight: bold;
            color: var(--primary-color);
            margin: 10px 0;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .tab-container {
                overflow-x: auto;
                white-space: nowrap;
            }
            
            .feedback-header {
                flex-direction: column;
                gap: 5px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Customer Feedback System</h1>
            <div>
                <button id="exportPdfBtn" class="btn btn-secondary">Export to PDF</button>
            </div>
        </header>

        <div class="tab-container">
            <button class="tab active" data-tab="customerTab">Customer View</button>
            <button class="tab" data-tab="adminTab">Admin Dashboard</button>
        </div>

        <!-- Customer Tab -->
        <div id="customerTab" class="tab-content" style="display: block;">
            <div class="feedback-form">
                <h2>Submit Your Feedback</h2>
                <form id="feedbackForm">
                    <div class="form-group">
                        <label for="customerName">Your Name:</label>
                        <input type="text" id="customerName" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="customerEmail">Email (optional):</label>
                        <input type="email" id="customerEmail">
                    </div>
                    
                    <div class="form-group">
                        <label>Rating:</label>
                        <div class="rating-container">
                            <span class="rating-label">How would you rate your experience?</span>
                            <div class="rating-stars" id="ratingStars">
                                <span class="star" data-value="1">☆</span>
                                <span class="star" data-value="2">☆</span>
                                <span class="star" data-value="3">☆</span>
                                <span class="star" data-value="4">☆</span>
                                <span class="star" data-value="5">☆</span>
                            </div>
                            <input type="hidden" id="ratingValue" value="0">
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label for="feedbackCategory">Category:</label>
                        <select id="feedbackCategory">
                            <option value="general">General Feedback</option>
                            <option value="bug">Bug Report</option>
                            <option value="feature">Feature Request</option>
                            <option value="complaint">Complaint</option>
                            <option value="praise">Praise</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="feedbackText">Your Feedback:</label>
                        <textarea id="feedbackText" required placeholder="Please share your thoughts..."></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit Feedback</button>
                </form>
            </div>
            
            <h2>Recent Feedback</h2>
            <div class="feedback-list" id="customerFeedbackList">
                <!-- Feedback items will be loaded here -->
            </div>
        </div>

        <!-- Admin Tab -->
        <div id="adminTab" class="tab-content">
            <h2>Admin Dashboard</h2>
            
            <div class="admin-controls">
                <input type="text" id="searchInput" class="search-box" placeholder="Search feedback...">
                <select id="filterCategory">
                    <option value="">All Categories</option>
                    <option value="general">General</option>
                    <option value="bug">Bug</option>
                    <option value="feature">Feature</option>
                    <option value="complaint">Complaint</option>
                    <option value="praise">Praise</option>
                </select>
                <select id="filterRating">
                    <option value="0">All Ratings</option>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
            </div>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-label">Total Feedback</div>
                    <div class="stat-value" id="totalFeedback">0</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Average Rating</div>
                    <div class="stat-value" id="avgRating">0.0</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Positive (4-5 Stars)</div>
                    <div class="stat-value" id="positiveFeedback">0</div>
                </div>
                <div class="stat-card">
                    <div class="stat-label">Negative (1-2 Stars)</div>
                    <div class="stat-value" id="negativeFeedback">0</div>
                </div>
            </div>
            
            <h3>All Feedback</h3>
            <div class="feedback-list" id="adminFeedbackList">
                <!-- All feedback items will be loaded here -->
            </div>
        </div>
    </div>

    <script>
        // Initialize the jsPDF library
        const { jsPDF } = window.jspdf;
        
        // Feedback data structure
        let feedbackData = JSON.parse(localStorage.getItem('feedbackData')) || {
            feedback: [],
            stats: {
                total: 0,
                totalRated: 0,
                ratings: {1: 0, 2: 0, 3: 0, 4: 0, 5: 0},
                categories: {
                    general: 0,
                    bug: 0,
                    feature: 0,
                    complaint: 0,
                    praise: 0
                }
            }
        };

        // DOM Elements
        const ratingStars = document.querySelectorAll('.star');
        const ratingValue = document.getElementById('ratingValue');
        const feedbackForm = document.getElementById('feedbackForm');
        const customerFeedbackList = document.getElementById('customerFeedbackList');
        const adminFeedbackList = document.getElementById('adminFeedbackList');
        const searchInput = document.getElementById('searchInput');
        const filterCategory = document.getElementById('filterCategory');
        const filterRating = document.getElementById('filterRating');
        const exportPdfBtn = document.getElementById('exportPdfBtn');
        const tabs = document.querySelectorAll('.tab');

        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            displayCustomerFeedback();
            displayAdminFeedback();
            updateStatistics();
            
            // Set up tab switching
            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    // Remove active class from all tabs
                    tabs.forEach(t => t.classList.remove('active'));
                    // Add active class to clicked tab
                    tab.classList.add('active');
                    
                    // Hide all tab contents
                    document.querySelectorAll('.tab-content').forEach(content => {
                        content.style.display = 'none';
                    });
                    
                    // Show the selected tab content
                    const tabId = tab.getAttribute('data-tab');
                    document.getElementById(tabId).style.display = 'block';
                    
                    // Refresh admin view when switching to admin tab
                    if (tabId === 'adminTab') {
                        displayAdminFeedback();
                        updateStatistics();
                    }
                });
            });
        });

        // Star rating interaction
        ratingStars.forEach(star => {
            star.addEventListener('click', () => {
                const value = parseInt(star.getAttribute('data-value'));
                ratingValue.value = value;
                
                ratingStars.forEach((s, index) => {
                    if (index < value) {
                        s.textContent = '★';
                        s.classList.add('active');
                    } else {
                        s.textContent = '☆';
                        s.classList.remove('active');
                    }
                });
            });
        });

        // Submit feedback form
        feedbackForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            const name = document.getElementById('customerName').value.trim();
            const email = document.getElementById('customerEmail').value.trim();
            const rating = parseInt(ratingValue.value) || null;
            const category = document.getElementById('feedbackCategory').value;
            const text = document.getElementById('feedbackText').value.trim();
            const date = new Date().toISOString();
            
            if (!name || !text) {
                alert('Please fill in all required fields');
                return;
            }
            
            // Create feedback object
            const feedback = {
                id: Date.now(),
                name,
                email,
                rating,
                category,
                text,
                date,
                status: 'new'
            };
            
            // Add to feedback array
            feedbackData.feedback.unshift(feedback);
            
            // Update statistics
            feedbackData.stats.total += 1;
            
            if (rating) {
                feedbackData.stats.totalRated += 1;
                feedbackData.stats.ratings[rating] += 1;
            }
            
            feedbackData.stats.categories[category] += 1;
            
            // Save to localStorage
            localStorage.setItem('feedbackData', JSON.stringify(feedbackData));
            
            // Reset form
            feedbackForm.reset();
            ratingValue.value = '0';
            ratingStars.forEach(star => {
                star.textContent = '☆';
                star.classList.remove('active');
            });
            
            // Show success message
            alert('Thank you for your feedback!');
            
            // Refresh displays
            displayCustomerFeedback();
            displayAdminFeedback();
            updateStatistics();
        });

        // Display feedback in customer view
        function displayCustomerFeedback() {
            customerFeedbackList.innerHTML = '';
            
            const recentFeedback = feedbackData.feedback.slice(0, 5); // Show 5 most recent
            
            if (recentFeedback.length === 0) {
                customerFeedbackList.innerHTML = '<p>No feedback submitted yet.</p>';
                return;
            }
            
            recentFeedback.forEach(item => {
                const feedbackItem = createFeedbackItem(item);
                customerFeedbackList.appendChild(feedbackItem);
            });
        }

        // Display all feedback in admin view
        function displayAdminFeedback() {
            adminFeedbackList.innerHTML = '';
            
            const filterText = searchInput.value.toLowerCase();
            const categoryFilter = filterCategory.value;
            const ratingFilter = parseInt(filterRating.value);
            
            let filteredFeedback = feedbackData.feedback.filter(item => {
                // Search filter
                const matchesSearch = !filterText || 
                    item.name.toLowerCase().includes(filterText) || 
                    item.text.toLowerCase().includes(filterText) ||
                    (item.email && item.email.toLowerCase().includes(filterText));
                
                // Category filter
                const matchesCategory = !categoryFilter || item.category === categoryFilter;
                
                // Rating filter
                const matchesRating = !ratingFilter || item.rating === ratingFilter;
                
                return matchesSearch && matchesCategory && matchesRating;
            });
            
            if (filteredFeedback.length === 0) {
                adminFeedbackList.innerHTML = '<p>No feedback matches your criteria.</p>';
                return;
            }
            
            filteredFeedback.forEach(item => {
                const feedbackItem = createFeedbackItem(item, true);
                adminFeedbackList.appendChild(feedbackItem);
            });
        }

        // Create a feedback item element
        function createFeedbackItem(item, isAdmin = false) {
            const feedbackItem = document.createElement('div');
            feedbackItem.className = 'feedback-item';
            feedbackItem.dataset.id = item.id;
            
            const stars = item.rating ? '★'.repeat(item.rating) + '☆'.repeat(5 - item.rating) : 'No rating';
            const date = new Date(item.date).toLocaleString();
            
            let adminControls = '';
            if (isAdmin) {
                adminControls = `
                    <div class="feedback-actions" style="margin-top: 10px;">
                        <button onclick="deleteFeedback('${item.id}')" style="background-color: var(--error-color); color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">Delete</button>
                    </div>
                `;
            }
            
            feedbackItem.innerHTML = `
                <div class="feedback-header">
                    <div>
                        <span class="feedback-user">${item.name}</span>
                        ${item.email ? `<span style="color: #666; font-size: 14px;">(${item.email})</span>` : ''}
                    </div>
                    <span class="feedback-date">${date}</span>
                </div>
                <div>
                    <span class="feedback-category">${item.category}</span>
                    ${item.rating ? `<span class="feedback-rating" title="${item.rating} star rating">${stars}</span>` : ''}
                </div>
                <div class="feedback-text">${item.text}</div>
                ${adminControls}
            `;
            
            return feedbackItem;
        }

        // Update statistics display
        function updateStatistics() {
            document.getElementById('totalFeedback').textContent = feedbackData.stats.total;
            
            // Calculate average rating
            let totalRatings = 0;
            let sumRatings = 0;
            let positiveCount = 0;
            let negativeCount = 0;
            
            for (let i = 1; i <= 5; i++) {
                const count = feedbackData.stats.ratings[i] || 0;
                totalRatings += count;
                sumRatings += i * count;
                
                if (i >= 4) positiveCount += count;
                if (i <= 2) negativeCount += count;
            }
            
            const avgRating = totalRatings > 0 ? (sumRatings / totalRatings).toFixed(1) : '0.0';
            document.getElementById('avgRating').textContent = avgRating;
            document.getElementById('positiveFeedback').textContent = positiveCount;
            document.getElementById('negativeFeedback').textContent = negativeCount;
        }

        // Delete feedback (admin only)
        function deleteFeedback(id) {
            if (confirm('Are you sure you want to delete this feedback?')) {
                const index = feedbackData.feedback.findIndex(item => item.id == id);
                if (index !== -1) {
                    // Update stats
                    const item = feedbackData.feedback[index];
                    feedbackData.stats.total -= 1;
                    
                    if (item.rating) {
                        feedbackData.stats.totalRated -= 1;
                        feedbackData.stats.ratings[item.rating] -= 1;
                    }
                    
                    feedbackData.stats.categories[item.category] -= 1;
                    
                    // Remove from array
                    feedbackData.feedback.splice(index, 1);
                    
                    // Save to localStorage
                    localStorage.setItem('feedbackData', JSON.stringify(feedbackData));
                    
                    // Refresh displays
                    displayCustomerFeedback();
                    displayAdminFeedback();
                    updateStatistics();
                }
            }
        }

        // Export to PDF
        exportPdfBtn.addEventListener('click', exportToPdf);

        function exportToPdf() {
            const doc = new jsPDF();
            
            // Add title
            doc.setFontSize(20);
            doc.text('Customer Feedback Report', 105, 20, { align: 'center' });
            
            // Add date
            doc.setFontSize(12);
            doc.text(`Generated on: ${new Date().toLocaleDateString()}`, 105, 30, { align: 'center' });
            
            // Add statistics
            doc.setFontSize(16);
            doc.text('Statistics Summary', 14, 50);
            
            doc.setFontSize(12);
            doc.text(`Total Feedback: ${feedbackData.stats.total}`, 20, 60);
            
            // Calculate average rating
            let totalRatings = 0;
            let sumRatings = 0;
            for (let i = 1; i <= 5; i++) {
                const count = feedbackData.stats.ratings[i] || 0;
                totalRatings += count;
                sumRatings += i * count;
            }
            const avgRating = totalRatings > 0 ? (sumRatings / totalRatings).toFixed(2) : '0.00';
            
            doc.text(`Average Rating: ${avgRating}`, 20, 70);
            doc.text(`Total Rated Feedback: ${feedbackData.stats.totalRated}`, 20, 80);
            
            // Add feedback items
            doc.setFontSize(16);
            doc.text('Feedback Items', 14, 100);
            
            let yPosition = 110;
            feedbackData.feedback.forEach((item, index) => {
                if (yPosition > 270) { // Add new page if we're near the bottom
                    doc.addPage();
                    yPosition = 20;
                }
                
                doc.setFontSize(12);
                doc.setFont('helvetica', 'bold');
                doc.text(`${index + 1}. ${item.name} - ${item.category}`, 20, yPosition);
                yPosition += 7;
                
                if (item.rating) {
                    doc.setFont('helvetica', 'normal');
                    doc.text(`Rating: ${item.rating}/5`, 20, yPosition);
                    yPosition += 7;
                }
                
                doc.text(`Date: ${new Date(item.date).toLocaleString()}`, 20, yPosition);
                yPosition += 7;
                
                // Split feedback text into multiple lines if needed
                const splitText = doc.splitTextToSize(item.text, 170);
                doc.text(splitText, 20, yPosition);
                yPosition += (splitText.length * 7) + 10;
                
                // Add separator line
                doc.line(20, yPosition, 190, yPosition);
                yPosition += 10;
            });
            
            // Save the PDF
            doc.save(`feedback_report_${new Date().toISOString().slice(0, 10)}.pdf`);
        }

        // Search and filter functionality
        searchInput.addEventListener('input', displayAdminFeedback);
        filterCategory.addEventListener('change', displayAdminFeedback);
        filterRating.addEventListener('change', displayAdminFeedback);
    </script>
</body>
</html>