<?php

class SearchController extends BaseController {

    // Handle the search request and display results
    public function handleSearchRequest() {
        // Get the keyword from the GET request (submitted by the search form)
        $keyword = isset($_GET['q']) ? $_GET['q'] : '';

        // Debugging: Output the keyword for checking
        echo "Keyword: " . htmlspecialchars($keyword) . "<br>";

        // Safely build the path to the view file
        $fileName = __DIR__ . "/{$keyword}.php";  // Store views in a dedicated directory
        echo $fileName;

        // Check if the file exists before including it to avoid errors
        if (file_exists($fileName)) {
            // You can include the file here
            require_once $fileName;
        } else {
            // Provide a clear message if the file doesn't exist
            echo "The file for '{$keyword}' does not exist.";
            echo $fileName;
        }
    }
}
