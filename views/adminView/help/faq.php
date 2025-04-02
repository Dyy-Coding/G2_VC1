<div class="container">
    <!-- Header -->
    <header>
        <h1>Customer Feedback System</h1>
        <button id="exportPdfBtn" class="btn btn-secondary">Export to PDF</button>
    </header>
    <!-- Tab Navigation -->
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
                    <input type="text" id="customerName" required aria-label="Your Name">
                </div>
                <div class="form-group">
                    <label for="customerEmail">Email (optional):</label>
                    <input type="email" id="customerEmail" aria-label="Email Address">
                </div>
                <div class="form-group">
                    <label>Rating:</label>
                    <div class="rating-container">
                        <span class="rating-label">How would you rate your experience?</span>
                        <div class="rating-stars" id="ratingStars" aria-label="Rating Stars">
                            <span class="star" data-value="1">☆</span>
                            <span class="star" data-value="2">☆</span>
                            <span class="star" data-value="3">☆</span>
                            <span class="star" data-value="4">☆</span>
                            <span class="star" data-value="5">☆</span>
                        </div>
                        <input type="hidden" id="ratingValue" value="0" aria-hidden="true">
                    </div>
                </div>
                <div class="form-group">
                    <label for="feedbackCategory">Category:</label>
                    <select id="feedbackCategory" aria-label="Feedback Category">
                        <option value="general">General Feedback</option>
                        <option value="bug">Bug Report</option>
                        <option value="feature">Feature Request</option>
                        <option value="complaint">Complaint</option>
                        <option value="praise">Praise</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="feedbackText">Your Feedback:</label>
                    <textarea id="feedbackText" required placeholder="Please share your thoughts..." aria-label="Feedback Text"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit Feedback</button>
            </form>
        </div>
        <h2>Thank You for Your Feedback!</h2>
        <p>Your feedback has been submitted successfully. Only admins can view submitted feedback.</p>
    </div>
    <!-- Admin Tab -->
    <div id="adminTab" class="tab-content">
        <h2>Admin Dashboard</h2>
        <div class="admin-controls">
            <input type="text" id="searchInput" class="search-box" placeholder="Search feedback..." aria-label="Search Feedback">
            <select id="filterCategory" aria-label="Filter by Category">
                <option value="">All Categories</option>
                <option value="general">General</option>
                <option value="bug">Bug</option>
                <option value="feature">Feature</option>
                <option value="complaint">Complaint</option>
                <option value="praise">Praise</option>
            </select>
            <select id="filterRating" aria-label="Filter by Rating">
                <option value="0">All Ratings</option>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
            <button id="bulkDeleteBtn" class="btn btn-error" aria-label="Bulk Delete">Bulk Delete</button>
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
        <div class="feedback-list" id="adminFeedbackList" aria-live="polite">
            <!-- All feedback items will be loaded here -->
        </div>
    </div>
</div>