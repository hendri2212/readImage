<?php
    session_start();
    require 'vendor/autoload.php';

    use PhpOffice\PhpSpreadsheet\Spreadsheet;
    use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
    use PhpOffice\PhpSpreadsheet\IOFactory;

    $fileName = 'data.xlsx';
    $fileExists = file_exists($fileName);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $full_name = $_POST['full_name'];
        $phone = $_POST['phone'];
        $school = $_POST['school'];

        if ($fileExists) {
            // Load the existing spreadsheet
            $spreadsheet = IOFactory::load($fileName);
            $sheet = $spreadsheet->getActiveSheet();
            $row = $sheet->getHighestRow() + 1;
        } else {
            // Create a new spreadsheet
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Set header row values
            $sheet->setCellValue('A1', 'Name');
            $sheet->setCellValue('B1', 'Email');
            $sheet->setCellValue('C1', 'Message');

            $row = 2; // Data starts at the second row
        }

        // Set session data values
        $_SESSION['phone'] = $phone;

        // Set form data values
        $sheet->setCellValue("A$row", $full_name);
        $sheet->setCellValue("B$row", $phone);
        $sheet->setCellValue("C$row", $school);

        $writer = new Xlsx($spreadsheet);
        $writer->save($fileName);

        header('Location: index.php');

        // echo "Form data has been saved to $fileName successfully.";
    } else {
        echo "Invalid request method.";
    }
?>