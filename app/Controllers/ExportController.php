<?php
namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\InstalasiModel;
class ExportController extends BaseController {
    
    public function header($fileName)
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
    }

    public function export() 
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Isi header
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nama');
        $sheet->setCellValue('C1', 'Alamat');

        // Ambil data
        // $model = new EmployeeModel();
        // $data = $model->findAll();

        // Data contoh
        $sheet->setCellValue('A2', '1');
        $sheet->setCellValue('B2', 'Budi');
        $sheet->setCellValue('C2', 'Jakarta');

        // Pengaturan Response untuk Download
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data_Pegawai.xlsx';

        $this->header($fileName);
    
        $writer->save('php://output');
        exit();
    }


    public function xls_instalasi() 
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Isi header
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Kode Instalasi');
        $sheet->setCellValue('C1', 'Nama Instalasi');

        // Ambil data
        $model = new InstalasiModel();
        $data = $model->findAll();
        $rows = 2;

        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rows, $row['id']);
            $sheet->setCellValue('B' . $rows, $row['kode_instalasi']);
            $sheet->setCellValue('C' . $rows, $row['nama_instalasi']);
            $rows++;
        }
       
        // Pengaturan Response untuk Download
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data_instalasi.xlsx';

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');


        $writer->save('php://output');
        exit();
    }
}
