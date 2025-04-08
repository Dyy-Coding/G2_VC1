<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use TCPDF;

class ExportImportController extends BaseController {
    private $model;

    public function __construct() {
        $this->model = new MaterialModel(); // Use MaterialModel instead of Material
    }

    // Export materials as Excel, Word, or PDF
    public function exportMaterials() {
        $materials = $this->model->getAllMaterials(); // Get all materials from the model
        $format = $_POST['format'] ?? '';

        if ($format === 'excel') {
            $this->exportToExcel($materials);
        } elseif ($format === 'word') {
            $this->exportToWord($materials);
        } elseif ($format === 'pdf') {
            $this->exportToPDF($materials);
        } else {
            echo "Invalid export format!";
        }
    }

    // Import materials from uploaded Excel, CSV, or XLS file
    public function importMaterials() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['importFile'])) {
            if ($_FILES['importFile']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['importFile']['tmp_name'];
                $mimeType = mime_content_type($file);
                $allowedMimeTypes = [
                    'application/vnd.ms-excel',
                    'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'text/csv'
                ];

                if (!in_array($mimeType, $allowedMimeTypes)) {
                    echo "Invalid file type!";
                    return;
                }

                $this->importFromExcel($file); // Call import function
                echo "Import successful!";
            } else {
                echo "Error uploading file!";
            }
        } else {
            echo "No file uploaded!";
        }
    }

    // Export materials to Excel format
    private function exportToExcel($materials) {
        // Create a new spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers with styling
        $headers = ['MaterialID', 'Name', 'CategoryID', 'Quantity', 'UnitPrice', 'SupplierID', 'MinStockLevel', 'ReorderLevel', 'UnitOfMeasure', 'Size', 'ImagePath', 'Description', 'CreatedAt', 'UpdatedAt', 'Brand', 'Location', 'SupplierContact', 'Status', 'WarrantyPeriod'];

        // Add header row and apply style
        $sheet->fromArray($headers, NULL, 'A1');
        $sheet->getStyle('A1:S1')->getFont()->setBold(true);
        $sheet->getStyle('A1:S1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
        $sheet->getStyle('A1:S1')->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
        $sheet->getStyle('A1:S1')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setRGB('FFFF00');  // Yellow background for header

        // Add material data to sheet with styling
        $row = 2;
        foreach ($materials as $material) {
            $sheet->setCellValue('A' . $row, $material['MaterialID']);
            $sheet->setCellValue('B' . $row, $material['Name']);
            $sheet->setCellValue('C' . $row, $material['CategoryID']);
            $sheet->setCellValue('D' . $row, $material['Quantity']);
            $sheet->setCellValue('E' . $row, $material['UnitPrice']);
            $sheet->setCellValue('F' . $row, $material['SupplierID']);
            $sheet->setCellValue('G' . $row, $material['MinStockLevel']);
            $sheet->setCellValue('H' . $row, $material['ReorderLevel']);
            $sheet->setCellValue('I' . $row, $material['UnitOfMeasure']);
            $sheet->setCellValue('J' . $row, $material['Size']);
            $sheet->setCellValue('K' . $row, $material['ImagePath']);
            $sheet->setCellValue('L' . $row, $material['Description']);
            $sheet->setCellValue('M' . $row, $material['CreatedAt']);
            $sheet->setCellValue('N' . $row, $material['UpdatedAt']);
            $sheet->setCellValue('O' . $row, $material['Brand']);
            $sheet->setCellValue('P' . $row, $material['Location']);
            $sheet->setCellValue('Q' . $row, $material['SupplierContact']);
            $sheet->setCellValue('R' . $row, $material['Status']);
            $sheet->setCellValue('S' . $row, $material['WarrantyPeriod']);

            // Apply borders and align the data
            $sheet->getStyle("A$row:S$row")->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle("A$row:S$row")->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

            $row++;
        }

        // Auto-size columns based on content
        foreach (range('A', 'S') as $columnID) {
            $sheet->getColumnDimension($columnID)->setAutoSize(true);
        }

        // Set the headers for download (this is important to trigger the file download)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="materials.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the file directly to the output stream (no need to save it on disk)
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    // Import materials from Excel file
    private function importFromExcel($file) {
        // Load the uploaded Excel file
        $spreadsheet = IOFactory::load($file);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Skip the header row and insert each row into the database
        for ($i = 1; $i < count($rows); $i++) {
            $material = [
                'name' => $rows[$i][1],
                'categoryID' => $rows[$i][2],
                'quantity' => $rows[$i][3],
                'unitPrice' => $rows[$i][4],
                'supplierID' => $rows[$i][5],
                'minStockLevel' => $rows[$i][6],
                'reorderLevel' => $rows[$i][7],
                'unitOfMeasure' => $rows[$i][8],
                'size' => $rows[$i][9],
                'imagePath' => $rows[$i][10],
                'description' => $rows[$i][11],
                'createdAt' => $rows[$i][12],
                'updatedAt' => $rows[$i][13],
                'brand' => $rows[$i][14],
                'location' => $rows[$i][15],
                'supplierContact' => $rows[$i][16],
                'status' => $rows[$i][17],
                'warrantyPeriod' => $rows[$i][18],
            ];
            // Save to database
            $this->model->importMaterial($material);  // Use model's import method
        }
    }

    // Export materials to Word format
    private function exportToWord($materials) {
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        $section->addText('Materials List', ['bold' => true]);

        // Add material data to the Word document
        foreach ($materials as $material) {
            $section->addText("MaterialID: {$material['MaterialID']}");
            $section->addText("Name: {$material['Name']}");
            $section->addText("CategoryID: {$material['CategoryID']}");
            $section->addText("Quantity: {$material['Quantity']}");
            $section->addText("UnitPrice: {$material['UnitPrice']}");
            $section->addText("SupplierID: {$material['SupplierID']}");
            $section->addText("MinStockLevel: {$material['MinStockLevel']}");
            $section->addText("ReorderLevel: {$material['ReorderLevel']}");
            $section->addText("UnitOfMeasure: {$material['UnitOfMeasure']}");
            $section->addText("Size: {$material['Size']}");
            $section->addText("ImagePath: {$material['ImagePath']}");
            $section->addText("Description: {$material['Description']}");
            $section->addText("CreatedAt: {$material['CreatedAt']}");
            $section->addText("UpdatedAt: {$material['UpdatedAt']}");
            $section->addText("Brand: {$material['Brand']}");
            $section->addText("Location: {$material['Location']}");
            $section->addText("SupplierContact: {$material['SupplierContact']}");
            $section->addText("Status: {$material['Status']}");
            $section->addText("WarrantyPeriod: {$material['WarrantyPeriod']}");
            $section->addText(''); // Add an empty line for spacing
        }

        // Save Word document
        $filename = 'materials.docx';
        $phpWord->save($filename, 'Word2007');

        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        readfile($filename);
        unlink($filename); // Delete the temporary file after sending it to the client
    }

    // Export materials to PDF format
    private function exportToPDF($materials) {
        $pdf = new TCPDF();
        $pdf->AddPage();
        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Materials List', 0, 1, 'C');

        // Add material data to the PDF
        foreach ($materials as $material) {
            $pdf->Cell(0, 10, "MaterialID: {$material['MaterialID']} | Name: {$material['Name']} | CategoryID: {$material['CategoryID']} | Quantity: {$material['Quantity']} | UnitPrice: {$material['UnitPrice']} | SupplierID: {$material['SupplierID']} | MinStockLevel: {$material['MinStockLevel']} | ReorderLevel: {$material['ReorderLevel']} | UnitOfMeasure: {$material['UnitOfMeasure']} | Size: {$material['Size']} | ImagePath: {$material['ImagePath']} | Description: {$material['Description']} | CreatedAt: {$material['CreatedAt']} | UpdatedAt: {$material['UpdatedAt']} | Brand: {$material['Brand']} | Location: {$material['Location']} | SupplierContact: {$material['SupplierContact']} | Status: {$material['Status']} | WarrantyPeriod: {$material['WarrantyPeriod']}", 0, 1);
        }

        // Output PDF to download
        $filename = 'materials.pdf';
        $pdf->Output($filename, 'D'); // 'D' for download
    }
}

?>
