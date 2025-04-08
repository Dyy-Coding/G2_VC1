<?php

class ExportImportController extends BaseController {
    private $model;

    public function __construct() {
        $this->model = new MaterialModel();
    }

    public function exportMaterials() {
        $materials = $this->model->getAllMaterials();
        $format = $_POST['format'] ?? '';
        echo $format;
        var_dump($materials);

        if (!in_array($format, ['excel', 'word', 'pdf'])) {
            echo "Invalid export format!";
            return;
        }

        $jsonPath = __DIR__ . '/../exports/materials.json';
        file_put_contents($jsonPath, json_encode($materials));

        $scriptPath = __DIR__ . "/../Python/export_{$format}.py";
        $outputFile = __DIR__ . "/../exports/materials.{$format}";

        $cmd = "python3 " . escapeshellarg($scriptPath) . " " . escapeshellarg($jsonPath) . " " . escapeshellarg($outputFile);
        shell_exec($cmd);

        if (file_exists($outputFile)) {
            $this->downloadFile($outputFile, "materials.{$format}");
            unlink($outputFile); // Optional cleanup
        } else {
            echo "Export failed!";
        }
    }

    private function downloadFile($filePath, $fileName) {
        $mimeTypes = [
            'excel' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'word'  => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'pdf'   => 'application/pdf',
        ];

        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $format = str_replace(".$ext", '', $fileName); // Get 'excel', 'word', 'pdf'
        $mimeType = $mimeTypes[$format] ?? 'application/octet-stream';

        header('Content-Description: File Transfer');
        header("Content-Type: $mimeType");
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filePath));
        readfile($filePath);
        exit;
    }
}
