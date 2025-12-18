<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use TCPDF;

class Cetak extends BaseController
{
    public function index()
    {
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetCreator(PDF_CREATOR);

        $pdf->SetAuthor('Nama Anda');
        $pdf->SetTitle('TCPDF Example 011');
        $pdf->SetSubject('TCPDF Tutorial');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');
        // set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 011', PDF_HEADER_STRING);

        $pdf->AddPage();

        $pdf->SetFont('helvetica', '', 12);
        $pdf->Cell(0, 10, 'Halo, Ini adalah Laporan TCPDF!', 0, 1, 'C');
        $pdf->Cell(0, 10, 'Halaman Pertama', 0, 1, 'L');
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan_pertama.pdf', 'I');

    }
}
