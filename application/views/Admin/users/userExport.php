<?php
/**
 * This view builds a Spreadsheet file containing the list of users.
 * @author  Copyright (c) 2018 kimsoeng kao
 */
require_once FCPATH . "vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();
$sheet->setTitle(mb_strimwidth('Users list', 0, 28, "..."));  //Maximum 31 characters
$sheet->setCellValue('A1','Card ID');
$sheet->setCellValue('B1','Firstname');
$sheet->setCellValue('C1','Lastname');
$sheet->setCellValue('D1','Email');
$sheet->getStyle('A1:D1')->getFont()->setBold(true);
$sheet->getStyle('A1:D1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$line = 2;
foreach ($users as $user) {
    $sheet->setCellValue('A' . $line, $user->card_id);
    $sheet->setCellValue('B' . $line, $user->firstname);
    $sheet->setCellValue('C' . $line, $user->lastname);
    $sheet->setCellValue('D' . $line, $user->email);
    $line++;
}
//Autofit
foreach(range('A','D') as $colD) {
    $sheet->getColumnDimension($colD)->setAutoSize(TRUE);
}
$filename = 'users.' . 'xlsx';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'. $filename . '"');
header('Cache-Control: max-age=0');
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->setPreCalculateFormulas(false);
$writer->save('php://output');
