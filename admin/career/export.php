<?php
date_default_timezone_set('Asia/Kolkata');
include_once('../includes/conn.php');
require_once __DIR__ .  "/../../vendor/autoload.php";
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

$spreadsheet = new Spreadsheet();  /* ----Spreadsheet object----- */
$spreadsheet->setActiveSheetIndex(0);
//$Excel_writer = new Xls($spreadsheet);  /*----- Excel (Xls) Object*/
$spreadsheet->getProperties()
        ->setCreator("Disseminare")
        ->setLastModifiedBy("Disseminare Admin")
        ->setTitle("Disseminare")
        ->setDescription("Disseminare Job Application Details")
        ->setKeywords("Job Application Details")
        ->setCategory("Job Application Details");

//$objPHPExcel->setActiveSheetIndex(0);

$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, 1, '#');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, 1, 'Job Title');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, 1, 'Name');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, 1, 'Phone');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, 1, 'Email');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(6, 1, 'Qualification');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(7, 1, 'Job Exp. (In Years)');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(8, 1, 'Lang. Proficiency');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(9, 1, 'About');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(10, 1, 'CV url');
$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(11, 1, 'Date Applied');
//$spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(6, 1, $proj_id);



$qry_data =     "SELECT
                applications.id,
                job.title AS job_title,
                applications.`name`,
                applications.phone,
                applications.email,
                applications.qualification,
                applications.job_experience,
                applications.language_p,
                applications.`comment`,
                applications.cv,
                applications.date
                FROM
                applications
                INNER JOIN job ON applications.job = job.id";
$res_data = mysqli_query($con, $qry_data);
$index = 1;
$row_next = 2;
while ($row_data = mysqli_fetch_array($res_data)) {
    $download_link = $base_url.$document_cv_path . $row_data['cv'];
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(1, $row_next, $index);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(2, $row_next, $row_data['job_title']);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(3, $row_next, $row_data['name']);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(4, $row_next, $row_data['phone']);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(5, $row_next, $row_data['email']);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(6, $row_next, $row_data['qualification']);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(7, $row_next, $row_data['job_experience']);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(8, $row_next, $row_data['language_p']);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(9, $row_next, $row_data['comment']);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(10, $row_next, $download_link);
    $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow(11, $row_next, $row_data['date']);
    
//    foreach ($row_data as $key => $value) {
//        
//        $spreadsheet->getActiveSheet()->setCellValueByColumnAndRow($col, 1, $value);
//        $col++;
//    }
    $row_next++;
    $index++;
}



$spreadsheet->setActiveSheetIndex(0);
$spreadsheet->getActiveSheet()->setTitle("Application Downloadble");
$spreadsheet->getActiveSheet()->getStyle(
        'A1:' . $spreadsheet->getActiveSheet()->getHighestColumn() . $spreadsheet->getActiveSheet()->getHighestRow()
)->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);

//$spreadsheet->getDefaultStyle()->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);



$spreadsheet->getActiveSheet()->getStyle('A1:' . $spreadsheet->getActiveSheet()->getHighestColumn() . $spreadsheet->getActiveSheet()->getHighestRow())->getFont()->setBold(false)->setName('Arial')->setSize(10)->getColor()->setRGB('000000');
$spreadsheet->getActiveSheet()->getStyle('A1:' . $spreadsheet->getActiveSheet()->getHighestColumn() . $spreadsheet->getActiveSheet()->getHighestRow())->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$spreadsheet->getActiveSheet()->getStyle('A1:' . $spreadsheet->getActiveSheet()->getHighestColumn() . $spreadsheet->getActiveSheet()->getHighestRow())->getFill()->getStartColor()->setRGB('FFFFFF');
$spreadsheet->getActiveSheet()->getStyle('A1:' . $spreadsheet->getActiveSheet()->getHighestColumn() . $spreadsheet->getActiveSheet()->getHighestRow())->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

for ($col = 'A'; $col <= $spreadsheet->getActiveSheet()->getHighestColumn(); $col++) {
    $spreadsheet->getActiveSheet()->getColumnDimension($col)->setAutoSize(true);
}


//$cell_name = "A1";
//$objPHPExcel->getActiveSheet()->getStyle( $cell_name )->getFont()->setBold( true );
//$spreadsheet->getActiveSheet()->getStyle("A1:FF1" )->getFont()->setBold( true );

$spreadsheet->getActiveSheet()->getStyle("A1:j1" )->getAlignment()->setWrapText(true);

//$spreadsheet->getActiveSheet()
//    ->getStyle( $spreadsheet->getActiveSheet()->calculateWorksheetDimension() )
//    ->getAlignment()
//    ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);  



##############  Saving Excel file   ###################
$time = date("Y_m_d_H_i_s");
$objWriter = new Xlsx($spreadsheet);
ob_start();
//$filename = "disseminare" . "_" . $time . ".xlsx";
//$file = __DIR__ . "/../../downloadable/$filename";
//$objWriter->save(str_replace('download-format.php', $filename, $file));
$objWriter->save("php://output");
$xlsData = ob_get_contents();
ob_end_clean();
$response =  array(
        'op' => 'ok',
        'file' => "data:application/vnd.ms-excel;base64,".base64_encode($xlsData)
    );

die(json_encode($response));

/**
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename=' . basename($file));
    header("Content-Transfer-Encoding: binary");
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    readfile($file);
   // Response . redirect("add-project.php");
     exit;
}
**/

