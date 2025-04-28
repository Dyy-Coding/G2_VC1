<?php

require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

class MaterialExportController {

    private $materialModel;
    private $headers = [
        'MaterialID', 'Name', 'CategoryName', 'Quantity', 'UnitPrice', 'SupplierName',
        'MinStockLevel', 'ReorderLevel', 'UnitOfMeasure', 'Size', 'ImagePath',
        'Description', 'CreatedAt', 'UpdatedAt', 'Brand', 'Location',
        'SupplierContact', 'Status', 'WarrantyPeriod'
    ];

    public function __construct() {
        $this->materialModel = new MaterialModel();
    }

    private function getMaterialsData() {
        return $this->materialModel->getAllMaterials();
    }

    public function exportExcel() {
        $materials = $this->getMaterialsData();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $spreadsheet->getDefaultStyle()->getFont()->setName('Khmer OS')->setSize(12);

        $sheet->fromArray($this->headers, null, 'A1');

        $row = 2;
        foreach ($materials as $material) {
            $data = [];
            foreach ($this->headers as $field) {
                $data[] = $material[$field];
            }
            $sheet->fromArray($data, null, 'A' . $row++);
        }

        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->applyFromArray([
            'font' => ['bold' => true],
            'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER]
        ]);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="materials.xlsx"');
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function exportPDF() {
        $materials = $this->getMaterialsData();

        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);
        $options->set('defaultFont', 'DejaVu Sans');

        $dompdf = new Dompdf($options);

        $html = '<html><head><meta charset="UTF-8">
        <style>
            @import url("https://fonts.googleapis.com/css2?family=Battambang&display=swap");
            body {
                font-family: "Battambang", DejaVu Sans, sans-serif;
                font-size: 12px;
            }
            table {
                border-collapse: collapse;
                width: 100%;
            }
            th, td {
                border: 1px solid #333;
                padding: 5px;
                text-align: left;
            }
            th {
                background-color: #eee;
            }
        </style></head><body>';

        $html .= '<h2>Materials List</h2><table><thead><tr>';
        foreach ($this->headers as $header) {
            $html .= '<th>' . htmlspecialchars($header) . '</th>';
        }
        $html .= '</tr></thead><tbody>';

        foreach ($materials as $material) {
            $html .= '<tr>';
            foreach ($this->headers as $field) {
                $html .= '<td>' . htmlspecialchars($material[$field]) . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</tbody></table></body></html>';

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'landscape');
        $dompdf->render();

        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="materials.pdf"');
        $dompdf->stream('materials.pdf', ['attachment' => 0]);
        exit;
    }

    public function exportWord() {
        $materials = $this->getMaterialsData();
        $phpWord = new PhpWord();

        $phpWord->addFontStyle('khmerStyle', ['name' => 'Khmer OS', 'size' => 12]);
        $phpWord->addTitleStyle(1, ['name' => 'Khmer OS', 'size' => 16, 'bold' => true]);

        $section = $phpWord->addSection();
        $section->addTitle('Materials List', 1);

        $table = $section->addTable([
            'borderSize' => 6,
            'borderColor' => '999999',
            'cellMargin' => 50,
        ]);

        $table->addRow();
        foreach ($this->headers as $header) {
            $table->addCell(2000)->addText($header, 'khmerStyle');
        }

        foreach ($materials as $material) {
            $table->addRow();
            foreach ($this->headers as $field) {
                $table->addCell(2000)->addText($material[$field], 'khmerStyle');
            }
        }

        $writer = IOFactory::createWriter($phpWord, 'Word2007');
        header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
        header('Content-Disposition: attachment; filename="materials.docx"');
        $writer->save('php://output');
        exit;
    }
}
