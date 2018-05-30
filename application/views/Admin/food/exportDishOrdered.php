<?php
/**
 * export an excel file of dish which are already ordered
 * @copyright  Copyright (c) 2018 kismoeng kao
 */
require_once FCPATH . "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle(mb_strimwidth('Users list', 0, 28, "..."));  //Maximum 31 characters
$sheet->setCellValue('A1','Dish Name');
$sheet->setCellValue('B1','Quantity Ordered');
$sheet->setCellValue('C1','Total Payment');
$sheet->getStyle('A1:C1')->getFont()->setBold(true);
$sheet->getStyle('A1:C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$line = 2;
foreach ($dishPreOrder as $dish) {
    $sheet->setCellValue('A' . $line, $dish->dishName);
    $sheet->setCellValue('B' . $line, $dish->TotalQuantity);
    $sheet->setCellValue('C' . $line, $dish->TotalPayment);
    $line++;
}
//Autofit
foreach(range('A','E') as $colD) {
    $sheet->getColumnDimension($colD)->setAutoSize(TRUE);
}
$filename = 'Dishes Pre-Ordered.' . 'xlsx';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'. $filename . '"');
header('Cache-Control: max-age=0');
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->setPreCalculateFormulas(false);
$writer->save('php://output');
