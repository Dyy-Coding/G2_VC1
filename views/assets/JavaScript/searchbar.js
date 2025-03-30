// // Example 3: DOM Search
// function searchInPage() {
//     const searchText = document.getElementById("domSearchInput").value;
//     const elements = document.getElementsByTagName("*");
//     const results = [];
    
//     for (let element of elements) {
//         if (element.textContent.toLowerCase().includes(searchText.toLowerCase()) && 
//             element.tagName !== "SCRIPT" && element.tagName !== "STYLE") {
//             results.push(element.textContent.trim());
//         }
//     }
    
//     const resultDiv = document.getElementById("domResults");
//     if (results.length > 0) {
//         resultDiv.innerHTML = "<strong>Found in page:</strong><br>" + results.join("<br>");
//     } else {
//         resultDiv.innerHTML = "No matches found on the page.";
//     }
// }

// // Example 4: API Search
// async function searchWeb() {
//     const query = document.getElementById("apiSearchInput").value;
//     const resultDiv = document.getElementById("apiResults");
    
//     try {
//         // Using a public API (e.g., JSONPlaceholder for demo purposes)
//         const response = await fetch(`https://jsonplaceholder.typicode.com/posts?q=${query}`);
//         const data = await response.json();
        
//         if (data.length > 0) {
//             const results = data.slice(0, 5).map(post => post.title); // Limit to 5 results
//             resultDiv.innerHTML = "<strong>API Results:</strong><br>" + results.join("<br>");
//         } else {
//             resultDiv.innerHTML = "No results found from the API.";
//         }
//     } catch (error) {
//         resultDiv.innerHTML = "Error fetching data: " + error.message;
//     }
// }