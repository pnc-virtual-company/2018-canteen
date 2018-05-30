<?php
/**
 * This view builds a Spreadsheet file containing the list of dishes.
 * @author  Copyright (c) 2018 kimsoeng kao
 */

require_once FCPATH . "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setTitle(mb_strimwidth('Dishes List ', 0, 28, "..."));  //Maximum 31 characters allowed in sheet title.
$sheet->setCellValue('A1', 'Name');
$sheet->setCellValue('B1', 'Description');

$sheet->getStyle('A1:B1')->getFont()->setBold(true);
$sheet->getStyle('A1:B1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$dishes = $this->DishesModel->getDishes();
$line = 2;
foreach ($dishes as $dish) {
    $sheet->setCellValue('A' . $line, $dish->dish_name);
    $sheet->setCellValue('B' . $line, $dish->description);
    $line++;
}

//Autofit
foreach(range('A', 'B') as $colD) {
    $sheet->getColumnDimension($colD)->setAutoSize(TRUE);
}

$filename = 'dishes.' . 'xlsx';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->setPreCalculateFormulas(false);
$writer->save('php://output');
