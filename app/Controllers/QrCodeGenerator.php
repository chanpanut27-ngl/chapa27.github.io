<?php

namespace App\Controllers;
use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Output\QROutputInterface;
use chillerlan\QRCode\QROptions;

class QrCodeGenerator extends BaseController
{
    public function generate()
    {

        $data = 'This is the data to be encoded into the QR Code';

        // Generate the QR code Data URI
        $qrcode = (new QRCode())->render($data);
        
        // Pass the Data URI to the view
        return view('qr_view', ['qrCodeImage' => $qrcode, 'title' => 'qr-code']);
       
    }
}
