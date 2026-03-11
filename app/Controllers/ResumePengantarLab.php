<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\LaboratoriumTujuanModel;
use App\Models\PengantarLabModel;

use TCPDF;

class ResumePengantarLab extends BaseController
{
    protected $title;
    protected $modelPengantarLhu;
    protected $modelLabTujuan;

    public function __construct()
    {
        $this->title = 'Resume';
        $this->modelPengantarLhu = new PengantarLabModel();
        $this->modelLabTujuan = new LaboratoriumTujuanModel();
    }

    public function index($id = null)
    {
        $kode_pengantar = $id;
        $data = [
            'title' => 'Resume',
            'kode_pengantar' => $kode_pengantar,
            'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar),
            'data_pelanggan' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'group_lab_tujuan' => $this->modelLabTujuan->get_data_by_group_kat_lab($kode_pengantar)
        ];
        return view('Backend/Modul/Pelayanan/Lab/Resume/index', $data);
    }

    public function list($id = null)
    {
        if ($this->request->isAJAX()) {
            $kode_pengantar = $this->request->getVar('kode_pengantar');

            $data = [
                'title' => 'Resume',
                'kode_pengantar' => $kode_pengantar,
                'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
                'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar),
                'data_pelanggan' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
                'group_lab_tujuan' => $this->modelLabTujuan->get_data_by_group_kat_lab($kode_pengantar)
            ];

            $msg = [
                'data' => view('Backend/Modul/Pelayanan/Lab/Resume/__data', $data)
            ];

            echo json_encode($msg);
        } else {
            exit('Not Process');
        }    

    }

    public function cetak($id = null)
    {
        $kode_pengantar = $id;
        
        $data = [
            'title' => 'Resume',
            'kode_pengantar' => $kode_pengantar,
            'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar),
            'data_pelanggan' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'group_lab_tujuan' => $this->modelLabTujuan->get_data_by_group_kat_lab($kode_pengantar),
            'nomor_form' => 'LB IV 7.1.1.1'
        ];
        return view('Backend/Modul/Pelayanan/Lab/Resume/__cetak', $data);
    }

    public function cetak_pdf($id = null)
    {
        $kode_pengantar = $id;

        $data = [
            'title' => 'Resume',
            'kode_pengantar' => $kode_pengantar,
            'items' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'menu_lab' => $this->modelLabTujuan->get_data($kode_pengantar),
            'data_pelanggan' => $this->modelPengantarLhu->get_data_by_kode_pengantar($kode_pengantar),
            'group_lab_tujuan' => $this->modelLabTujuan->get_data_by_group_kat_lab($kode_pengantar),
            'nomor_form' => 'LB IV 7.1.1.1'
        ];
        
        $html = view('Backend/Modul/Pelayanan/Lab/Resume/__pdf', $data);
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetPrintHeader(false);
        // Mengatur margin: Kiri=15mm, Atas=10mm, Kanan=15mm
        $pdf->SetMargins(5, 1, 5, 2);
        $pdf->AddPage();
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);
        // Tentukan isi data untuk QR Code
        $qrcode = strtoupper($kode_pengantar).'.'.date('dmY').'.'.'BBLKM_Jakarta';

        // Tentukan gaya (opsional)
        $style = array(
            'border' => 0,
            'vpadding' => 'auto',
            'hpadding' => 'auto',
            'fgcolor' => array(0,0,0),
            'bgcolor' => false, // array(255,255,255)
            'module_width' => 1, 
            'module_height' => 1
        );
        $pdf->write2DBarcode($qrcode, 'QRCODE,H', '', 8, 10, 10, $style, 'N');
        
        $this->response->setContentType('application/pdf');
        $pdf->Output('example_001.pdf', 'I');
    }
}
