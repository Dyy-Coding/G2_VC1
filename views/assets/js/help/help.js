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
const adminFeedbackList = document.getElementById('adminFeedbackList');
const searchInput = document.getElementById('searchInput');
const filterCategory = document.getElementById('filterCategory');
const filterRating = document.getElementById('filterRating');
const exportPdfBtn = document.getElementById('exportPdfBtn');
const tabs = document.querySelectorAll('.tab');
const bulkDeleteBtn = document.getElementById('bulkDeleteBtn');
// Initialize the page
document.addEventListener('DOMContentLoaded', () => {
    displayAdminFeedback();
    updateStatistics();
    setupEventListeners();
    renderFeedbackChart();
});
// Set up event listeners
function setupEventListeners() {
    // Tab switching
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            document.querySelectorAll('.tab-content').forEach(content => {
                content.style.display = 'none';
            });
            const tabId = tab.getAttribute('data-tab');
            document.getElementById(tabId).style.display = 'block';
            if (tabId === 'adminTab') {
                displayAdminFeedback();
                updateStatistics();
                renderFeedbackChart();
            }
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
    feedbackForm.addEventListener('submit', submitFeedback);
    // Search and filter functionality
    searchInput.addEventListener('input', displayAdminFeedback);
    filterCategory.addEventListener('change', displayAdminFeedback);
    filterRating.addEventListener('change', displayAdminFeedback);
    // Export to PDF
    exportPdfBtn.addEventListener('click', exportToPdf);
    // Bulk delete
    bulkDeleteBtn.addEventListener('click', handleBulkDelete);
}
// Submit feedback form
function submitFeedback(e) {
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
    const feedback = {
        id: Date.now(),
        name,
        email,
        rating,
        category,
        text,
        date
    };
    feedbackData.feedback.unshift(feedback);
    feedbackData.stats.total += 1;
    if (rating) {
        feedbackData.stats.totalRated += 1;
        feedbackData.stats.ratings[rating] += 1;
    }
    feedbackData.stats.categories[category] += 1;
    localStorage.setItem('feedbackData', JSON.stringify(feedbackData));
    feedbackForm.reset();
    ratingValue.value = '0';
    ratingStars.forEach(star => {
        star.textContent = '☆';
        star.classList.remove('active');
    });
    alert('Thank you for your feedback!');
    displayAdminFeedback();
    updateStatistics();
}
// Display all feedback in admin view
function displayAdminFeedback() {
    adminFeedbackList.innerHTML = '';
    const filterText = searchInput.value.toLowerCase();
    const categoryFilter = filterCategory.value;
    const ratingFilter = parseInt(filterRating.value);
    let filteredFeedback = feedbackData.feedback.filter(item => {
        const matchesSearch = !filterText || 
            item.name.toLowerCase().includes(filterText) || 
            item.text.toLowerCase().includes(filterText) ||
            (item.email && item.email.toLowerCase().includes(filterText));
        const matchesCategory = !categoryFilter || item.category === categoryFilter;
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
// Delete feedback
function deleteFeedback(id) {
    const index = feedbackData.feedback.findIndex(item => item.id == id);
    if (index !== -1) {
        const item = feedbackData.feedback[index];
        feedbackData.stats.total -= 1;
        if (item.rating) {
            feedbackData.stats.totalRated -= 1;
            feedbackData.stats.ratings[item.rating] -= 1;
        }
        feedbackData.stats.categories[item.category] -= 1;
        feedbackData.feedback.splice(index, 1);
        localStorage.setItem('feedbackData', JSON.stringify(feedbackData));
        displayAdminFeedback();
        updateStatistics();
    }
}
// Bulk delete
function handleBulkDelete() {
    if (confirm('Are you sure you want to delete all feedback? This action cannot be undone.')) {
        feedbackData.feedback = [];
        feedbackData.stats = {
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
        };
        localStorage.setItem('feedbackData', JSON.stringify(feedbackData));
        displayAdminFeedback();
        updateStatistics();
    }
}
// Export to PDF
function exportToPdf() {
    const doc = new jsPDF();
    doc.setFontSize(20);
    doc.text('Customer Feedback Report', 105, 20, { align: 'center' });
    doc.setFontSize(12);
    doc.text(`Generated on: ${new Date().toLocaleDateString()}`, 105, 30, { align: 'center' });
    doc.setFontSize(16);
    doc.text('Statistics Summary', 14, 50);
    doc.setFontSize(12);
    doc.text(`Total Feedback: ${feedbackData.stats.total}`, 20, 60);
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
    doc.setFontSize(16);
    doc.text('Feedback Items', 14, 100);
    let yPosition = 110;
    feedbackData.feedback.forEach((item, index) => {
        if (yPosition > 270) {
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
        const splitText = doc.splitTextToSize(item.text, 170);
        doc.text(splitText, 20, yPosition);
        yPosition += (splitText.length * 7) + 10;
        doc.line(20, yPosition, 190, yPosition);
        yPosition += 10;
    });
    doc.save(`feedback_report_${new Date().toISOString().slice(0, 10)}.pdf`);
}
// Render feedback chart
function renderFeedbackChart() {
    const ctx = document.getElementById('feedbackChart').getContext('2d');
    const ratings = Object.keys(feedbackData.stats.ratings).map(Number);
    const counts = ratings.map(rating => feedbackData.stats.ratings[rating] || 0);
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ratings.map(rating => `${rating} Star`),
            datasets: [{
                label: 'Number of Feedback',
                data: counts,
                backgroundColor: ['#4285f4', '#34a853', '#fbbc05', '#ea4335', '#7fbc00'],
                borderColor: ['#3367d6', '#2d9249', '#c58900', '#b33929', '#6aa800'],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
}
