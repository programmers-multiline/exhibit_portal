<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

// ✅ OPTIONAL: increase memory (extra safety)
ini_set('memory_limit', '1024M');
set_time_limit(0);

// ✅ DATABASE CONNECTION
$conn = new mysqli("localhost", "root", "", "exhibit_portal");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ✅ FILE PATH (FIXED)
$filePath = "C:/xampp/htdocs/ImportExcelPhpmyadmin/PHILCONSTRUCT2.xlsx";

// ✅ CHECK FILE
if (!file_exists($filePath)) {
    die("❌ File not found: " . $filePath);
}

// ✅ RUN IMPORT
importExcelToMySQL($filePath, $conn);

function importExcelToMySQL($filePath, $conn)
{
    try {
        echo "📂 Loading Excel...<br>";

        $spreadsheet = IOFactory::load($filePath);
        $sheet = $spreadsheet->getActiveSheet();

        $highestRow = $sheet->getHighestRow();

        echo "📊 Total Rows: " . $highestRow . "<br><br>";

        // ✅ PREPARED STATEMENT (FASTER + SAFE)
        $stmt = $conn->prepare("
            INSERT INTO participants2 (
                exhibit_name,
                entry_by,
                day_num,
                participant_name,
                participant_email,
                participant_company,
                participant_position,
                participant_contact
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->bind_param(
            "ssssssss",
            $exhibit_name,
            $entry_by,
            $day_num,
            $participant_name,
            $participant_email,
            $participant_company,
            $participant_position,
            $participant_contact
        );

        $inserted = 0;

        // ✅ LOOP ROW BY ROW (NO MEMORY ISSUE)
        for ($row = 2; $row <= $highestRow; $row++) {

            $exhibit_name         = $sheet->getCell("A$row")->getValue();
            $entry_by             = $sheet->getCell("B$row")->getValue();
            $day_num              = $sheet->getCell("C$row")->getValue();
            $participant_name     = $sheet->getCell("D$row")->getValue();
            $participant_email    = $sheet->getCell("E$row")->getValue();
            $participant_company  = $sheet->getCell("F$row")->getValue();
            $participant_position = $sheet->getCell("G$row")->getValue();
            $participant_contact  = $sheet->getCell("H$row")->getValue();

            // ✅ SKIP EMPTY ROWS
            if (empty($participant_name) && empty($participant_email)) {
                continue;
            }

            if (!$stmt->execute()) {
                echo "❌ Error on row $row: " . $stmt->error . "<br>";
            } else {
                $inserted++;
            }

            // ✅ PROGRESS DISPLAY (every 500 rows)
            if ($row % 500 == 0) {
                echo "⏳ Processed: $row rows<br>";
                flush();
            }
        }

        echo "<br>✅ Import Completed!";
        echo "<br>📥 Total Inserted: $inserted rows";

        $stmt->close();

    } catch (Exception $e) {
        echo "❌ Error: " . $e->getMessage();
    }
}

?>