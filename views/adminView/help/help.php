<div class="container mt-3 card" style="width: 95%; padding: 20px;">
<!-- Header -->
<div class="container mt-5">
  <h1 class="text-center display-4">Help & Support</h1>
  <p class="text-center text-muted mb-4">We're here to help! Find answers, contact us, or explore resources below.</p>

  <!-- Searchable FAQ Section -->
  <div class="card mb-4">
    <div class="card-body">
      <h2 class="card-title">Frequently Asked Questions</h2>
      <input type="text" id="faqSearch" placeholder="Search FAQs..." class="form-control mb-3">
      <div class="btn-group mb-3" role="group">
        <button class="btn btn-outline-secondary" onclick="filterFAQ('all')">All</button>
        <button class="btn btn-outline-secondary" onclick="filterFAQ('account')">Account</button>
        <button class="btn btn-outline-secondary" onclick="filterFAQ('billing')">Billing</button>
        <button class="btn btn-outline-secondary" onclick="filterFAQ('technical')">Technical</button>
      </div>
      <div id="faqList">
        <div class="faq-item account">
          <h3 class="font-weight-bold">How do I reset my password?</h3>
          <p>Go to the login page, click "Forgot Password," and follow the instructions to reset it.</p>
        </div>
        <div class="faq-item billing">
          <h3 class="font-weight-bold">Where can I view my billing history?</h3>
          <p>Log in, go to "Account Settings," and select "Billing History."</p>
        </div>
        <div class="faq-item technical">
          <h3 class="font-weight-bold">Why is the app not loading?</h3>
          <p>Check your internet connection, clear your cache, or try restarting the app.</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Contact Information -->
  <div class="card mb-4">
    <div class="card-body">
      <h2 class="card-title">Contact Us</h2>
      <p class="mb-4">We typically respond within 24 hours.</p>
      <ul class="list-unstyled">
        <li>Email: <a href="mailto:support@company.com" class="text-primary">support@company.com</a></li>
        <li>Phone: +855 888 263 077 (Mon–Fri, 9 AM–5 PM EST)</li>
        <li>Live Chat: <a href="#" class="text-primary" onclick="alert('Live chat coming soon!')">Start Chat</a></li>
      </ul>
      <a href="#ticket" class="btn btn-primary">Submit a Ticket</a>
    </div>
  </div>

  <!-- Self-Help Resources -->
  <div class="card mb-4">
    <div class="card-body">
      <h2 class="card-title">Self-Help Resources</h2>
      <ul class="list-unstyled">
        <li><a href="/guides" class="text-primary">User  Guides</a></li>
        <li><a href="/tutorials" class="text-primary">Video Tutorials</a></li>
      </ul>
    </div>
  </div>


  <script>
    // FAQ Search and Filter
    const faqSearch = document.getElementById('faqSearch');
    const faqItems = document.querySelectorAll('.faq-item');

    faqSearch.addEventListener('input', () => {
      const query = faqSearch.value.toLowerCase();
      faqItems.forEach(item => {
        const text = item.textContent.toLowerCase();
        item.style.display = text.includes(query) ? 'block' : 'none';
      });
    });

    function filterFAQ(category) {
      faqItems.forEach(item => {
        item.style.display = (category === 'all' || item.classList.contains(category)) ? 'block' : 'none';
      });
    }

    // Accessibility: Allow keyboard navigation for FAQ buttons
    document.querySelectorAll('.category-btn').forEach(btn => {
      btn.addEventListener('keydown', (e) => {
        if (e.key === 'Enter' || e.key === ' ') {
          btn.click();
        }
      });
    });
  </script>