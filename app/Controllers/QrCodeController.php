<?php namespace App\Controllers;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Label\LabelAlignment;
use Endroid\QrCode\Label\Font\OpenSans;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;

class QrCodeController extends BaseController
{
    public function index()
    {

        $builder = new Builder(
    writer: new PngWriter(),
    writerOptions: [],
    validateResult: false,
    data: 'Custom QR code contents',
    encoding: new Encoding('UTF-8'),
    errorCorrectionLevel: ErrorCorrectionLevel::High,
    size: 300,
    margin: 10,
    roundBlockSizeMode: RoundBlockSizeMode::Margin,
    logoPath: __DIR__.'/assets/images/logo-2.png',
    logoResizeToWidth: 50,
    logoPunchoutBackground: true,
    labelText: 'This is the label',
    labelFont: new OpenSans(20),
    labelAlignment: LabelAlignment::Center
);

$result = $builder->build();

    }
}
