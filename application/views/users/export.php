<?php
/**
 * This view builds a Spreadsheet file containing the list of users.
 * @copyright  Copyright (c) 2018 Benjamin BALET
 * @license    http://opensource.org/licenses/AGPL-3.0 AGPL-3.0
 * @link       https://github.com/bbalet/skeleton
 * @since      1.0.0
 */

require_once FCPATH . "vendor/autoload.php";

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setTitle(mb_strimwidth('Users list', 0, 28, "..."));  //Maximum 31 characters allowed in sheet title.
$sheet->setCellValue('A1', 'User ID');
$sheet->setCellValue('B1', 'Full Name');
$sheet->setCellValue('C1', 'Position');
$sheet->setCellValue('D1', 'Email');
$sheet->setCellValue('E1', 'Dinner Event');

$sheet->getStyle('A1:E1')->getFont()->setBold(true);
$sheet->getStyle('A1:E1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

$users = $this->JoinDinner_model->getFileExcel();
$line = 2;
foreach ($users as $user) {
    $sheet->setCellValue('A' . $line, $user['join_event_id']);
    $sheet->setCellValue('B' . $line, $user['user_name']);
    $sheet->setCellValue('C' . $line, $user['position']);
    $sheet->setCellValue('D' . $line, $user['email']);
    $sheet->setCellValue('E' . $line, $user['Title']);
    $line++;
}

//Autofit
foreach(range('A', 'E') as $colD) {
    $sheet->getColumnDimension($colD)->setAutoSize(TRUE);
}

$filename = 'users.' . 'xlsx';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="' . $filename . '"');
header('Cache-Control: max-age=0');
$writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
$writer->setPreCalculateFormulas(false);
$writer->save('php://output');
