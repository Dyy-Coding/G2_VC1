function handleGlobalSearch(event) {
    event.preventDefault();
    const searchQuery = document.getElementById('searchbar').value.trim();
    const selectedLang = document.getElementById('myDropdown').value;
    
    if (searchQuery) {
        const form = document.getElementById('searchForm');
        // Include language parameter in search
        form.action = `/search?q=${encodeURIComponent(searchQuery)}&lang=${selectedLang}`;
        form.submit();
    }
}

// Language dropdown handler
document.getElementById("myDropdown").addEventListener("change", function () {
    const selectedLang = this.value;
    console.log("Language selected: " + selectedLang);
    // Optional: Trigger search with new language if there's a query
    const searchQuery = document.getElementById('searchbar').value.trim();
    if (searchQuery) {
        document.getElementById('searchForm').dispatchEvent(new Event('submit'));
    }
});


const express = require('express');
const app = express();
// Example Express.js backend
app.get('/search', (req, res) => {
    const query = req.query.q;
    const lang = req.query.lang || 'english';
    // Implement global search across your data
    const results = performGlobalSearch(query, lang);
    res.render('search-results', { results, query, lang });
});