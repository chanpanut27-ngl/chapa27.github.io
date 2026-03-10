<?php
namespace App\Controllers;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use App\Models\InstalasiModel;
use App\Models\JenisSampelModel;
use App\Models\LaboratoriumModel;
use App\Models\PeraturanModel;

class ExportController extends BaseController {

    protected $spreadsheet;

    public function __construct()
    {
         $this->spreadsheet = new Spreadsheet();
    }
    
    public function header($fileName)
    {
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');
    }

    public function xls_instalasi() 
    {
        
        $sheet = $this->spreadsheet->getActiveSheet();

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
        $writer = new Xlsx($this->spreadsheet);
        $fileName = 'Master_instalasi.xlsx';

        $this->header($fileName);


        $writer->save('php://output');
        exit();
    }

    public function xls_laboratorium() 
    {

        $sheet = $this->spreadsheet->getActiveSheet();

        // Isi header
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Kode Laboratorium');
        $sheet->setCellValue('C1', 'Laboratorium');
        $sheet->setCellValue('D1', 'Instalasi');
        $sheet->setCellValue('E1', 'Lantai');

        // Ambil data
        $model = new LaboratoriumModel();
        $data = $model->get_data_all();
        $rows = 2;

        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rows, $row['id']);
            $sheet->setCellValue('B' . $rows, $row['kode_lab']);
            $sheet->setCellValue('C' . $rows, $row['nama_lab']);
            $sheet->setCellValue('D' . $rows, $row['nama_instalasi']);
            $sheet->setCellValue('E' . $rows, $row['lantai']);
            $rows++;
        }
       
        // Pengaturan Response untuk Download
        $writer = new Xlsx($this->spreadsheet);
        $fileName = 'Master_laboratorium.xlsx';

        $this->header($fileName);

        $writer->save('php://output');
        exit();
    }

    public function xls_jenis_sampel() 
    {
       
        $sheet = $this->spreadsheet->getActiveSheet();

        // Isi header
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Jenis Sampel');
        $sheet->setCellValue('C1', 'Peraturan');
        $sheet->setCellValue('D1', 'Keterangan');
        $sheet->setCellValue('E1', 'PNBP');
        $sheet->setCellValue('F1', 'Laboratorium');

        // Ambil data
        $model = new JenisSampelModel();
        $data = $model->get_data_all();
        $rows = 2;

        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rows, $row['id']);
            $sheet->setCellValue('B' . $rows, $row['jenis_sampel']);
            $sheet->setCellValue('C' . $rows, $row['peraturan']);
            $sheet->setCellValue('D' . $rows, $row['ket_sampel']);
            $sheet->setCellValue('E' . $rows, $row['pnbp']);
            $sheet->setCellValue('F' . $rows, $row['nama_lab']);
            $rows++;
        }
       
        // Pengaturan Response untuk Download
        $writer = new Xlsx($this->spreadsheet);
        $fileName = 'Master_Jenis_sampel.xlsx';

        $this->header($fileName);

        $writer->save('php://output');
        exit();
    }

    public function xls_peraturan() 
    {
       
        $sheet = $this->spreadsheet->getActiveSheet();

        // Isi header
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Peraturan');
        $sheet->setCellValue('C1', 'Keterangan');
        $sheet->setCellValue('D1', 'Is_Active');

        // Ambil data
        $model = new PeraturanModel();
        $data = $model->findAll();
        $rows = 2;

        foreach ($data as $row) {
            $sheet->setCellValue('A' . $rows, $row['id']);
            $sheet->setCellValue('B' . $rows, $row['peraturan']);
            $sheet->setCellValue('C' . $rows, $row['keterangan']);
            $sheet->setCellValue('D' . $rows, $row['is_active'] == 1 ? 'Aktif' : 'Tidak Aktif');
            $rows++;
        }
       
        // Pengaturan Response untuk Download
        $writer = new Xlsx($this->spreadsheet);
        $fileName = 'Master_peraturan.xlsx';

        $this->header($fileName);

        $writer->save('php://output');
        exit();
    }

    
}
