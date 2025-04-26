<?php
$exportType = $_GET['type'] ?? 'excel'; // default to excel

// Sanitize input
$allowedTypes = ['excel', 'word', 'pdf'];
if (!in_array($exportType, $allowedTypes)) {
    http_response_code(400);
    echo "❌ Invalid export type";
    exit;
}

// Path to Python executable and script
$python = "python"; // or "python3" depending on your server
$script = "export_materials.py";

// Execute the script
$outputFile = "";
switch ($exportType) {
    case 'excel':
        $outputFile = "materials_export.xlsx";
        break;
    case 'word':
        $outputFile = "materials_export.docx";
        break;
    case 'pdf':
        $outputFile = "materials_export.pdf";
        break;
}

exec("$python $script $exportType", $output, $returnCode);

if ($returnCode !== 0 || !file_exists($outputFile)) {
    http_response_code(500);
    echo "❌ Export failed";
    exit;
}

// Force download
header("Content-Disposition: attachment; filename=$outputFile");
header("Content-Type: application/octet-stream");
readfile($outputFile);

// Optionally delete file after download
// unlink($outputFile);
?>
