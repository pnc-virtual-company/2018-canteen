<?php
/**
 * This view builds a Spreadsheet file containing the list of users pre ordered.
 * @author  Copyright (c) 2018 kimsoeng kao
 */
require_once FCPATH . "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle(mb_strimwidth('Users list', 0, 28, "..."));  //Maximum 31 characters
$sheet->setCellValue('A1','Card ID');
$sheet->setCellValue('B1','User Name');
$sheet->setCellValue('C1','Department Name');
$sheet->setCellValue('D1','Total Quantity');
$sheet->setCellValue('E1','Total Payment');
$sheet->getStyle('A1:E1')->getFont()->setBold(true);
$sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$line = 2;
foreach ($userPreOrder  as $user) {
    $sheet->setCellValue('A' . $line, $user->userId);
    $sheet->setCellValue('B' . $line, $user->userName);
    $sheet->setCellValue('C' . $line, $user->class_name);
    $sheet->setCellValue('D' . $line, $user->totalQuanttiy);
    $sheet->setCellValue('E' . $line, $user->TotalPayment);
    $line++;
}
//Autofit
foreach(range('A','E') as $colD) {
    $sheet->getColumnDimension($colD)->setAutoSize(TRUE);
}
$filename = 'Users Pre-Ordered.' . 'xlsx';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'. $filename . '"');
header('Cache-Control: max-age=0');
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->setPreCalculateFormulas(false);
$writer->save('php://output');
