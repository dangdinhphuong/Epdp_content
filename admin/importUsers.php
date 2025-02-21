<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (empty($_SESSION['user']) || $_SESSION['user']['role'] != 2) {
        $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
$domain = $protocol . "://" . $_SERVER['HTTP_HOST'];
$newPath = strstr($_SERVER['SCRIPT_NAME'], '/admin', true); // Cắt chuỗi từ đầu đến trước "admin"
// Chuyển hướng đến login.php
header("Location: $domain$newPath/login.php");
}
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['excelFile'])) {
    $fileTmpPath = $_FILES['excelFile']['tmp_name'];
    $fileName = $_FILES['excelFile']['name'];
    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    // Kiểm tra định dạng file Excel
    $allowedExtensions = ['xls', 'xlsx'];
    if (!in_array($fileExtension, $allowedExtensions)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid file format.']);
        exit;
    }

    try {
        // Load file Excel
        $spreadsheet = IOFactory::load($fileTmpPath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Hiển thị dữ liệu từ file Excel (dòng đầu tiên là tiêu đề)
        foreach ($rows as $index => $row) {
            if ($index === 0) continue; // Bỏ qua dòng tiêu đề
            $username = $row[0] ?? ''; // Cột 1
            $email = $row[1] ?? '';    // Cột 2
            $phone = $row[2] ?? '';    // Cột 3

            // Lưu dữ liệu vào database hoặc xử lý dữ liệu tại đây
            echo "Username: $username, Email: $email, Phone: $phone <br>";
        }

        echo json_encode(['status' => 'success', 'message' => 'Data imported successfully.']);
    } catch (Exception $e) {
        echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'No file uploaded.']);
}
?>
