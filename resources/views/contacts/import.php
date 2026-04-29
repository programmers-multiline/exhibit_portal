<?php
require 'vendor/autoload.php';

$conn = new mysqli("localhost", "root", "", "exhibit_portal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// File upload input
if (isset($_FILES['excel_file']['tmp_name'])) {
    $filePath = $_FILES['excel_file']['tmp_name'];
    importExcelToMySQL($filePath, $conn);
}

use PhpOffice\PhpSpreadsheet\IOFactory;

function importExcelToMySQL($filePath, $conn)
{
    try {
        // Load Excel file
        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();
        $rows = $sheet->toArray();

        // Skip header row (index 0)
        foreach ($rows as $index => $row) {
            if ($index == 0) continue;

            $exhibit_name         = $conn->real_escape_string($row[0]);
            $entry_by             = $conn->real_escape_string($row[1]);
            $day_num              = $conn->real_escape_string($row[2]);
            $participant_name     = $conn->real_escape_string($row[3]);
            $participant_email    = $conn->real_escape_string($row[4]);
            $participant_company  = $conn->real_escape_string($row[5]);
            $participant_position = $conn->real_escape_string($row[6]);
            $participant_contact  = $conn->real_escape_string($row[7]);

            $sql = "INSERT INTO participants2 (exhibit_name, entry_by, day_num, participant_name, participant_email, participant_company, participant_position, participant_contact)
                    VALUES ('$exhibit_name', '$entry_by', '$day_num', '$participant_name', '$participant_email', '$participant_company', '$participant_position', '$participant_contact')";

            if (!$conn->query($sql)) {
                echo "Error: " . $conn->error;
            }
        }

        echo "Import successful!";

    } catch (Exception $e) {
        echo "Error loading file: " . $e->getMessage();
    }
}
?>