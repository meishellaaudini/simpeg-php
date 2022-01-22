<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setCellValue('A1', 'Hello World !');

$writer = new Xlsx($spreadsheet);
$fileName = 'Contoh Laporan.xlsx';
$writer->save($fileName);

header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Length:'. filesize($fileName));
header('content-Disposition: attachment;filename="' . $fileName . '"');
readfile($fileName); //sendfile
unlink($fileName); //delete file
exit;