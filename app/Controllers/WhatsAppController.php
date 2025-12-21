<?php

namespace App\Controllers;

use App\Models\LaboratoriumModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use GuzzleHttp\Client; // Gunakan Guzzle untuk request HTTP

class WhatsAppController extends Controller
{
    public function sendWhatsAppMessagex()
    {
        $api_key = "5DmvZWjA8EmxwaBpRpKU"; // Ganti dengan API Key Anda
        $target_number = "625771753845"; // Nomor tujuan (format internasional)
        $message_text = "Halo dari CodeIgniter 4!";

        $client = new Client(); // Inisialisasi Guzzle Client

        try {
            $response = $client->post('api.fonnte.com', [ // Ganti URL API sesuai provider
                'headers' => [
                    'Authorization' => 'Bearer ' . $api_key,
                    'Content-Type' => 'application/json',
                ],
                'json' => [ // Data dalam format JSON
                    'target' => $target_number,
                    'message' => $message_text,
                    // Tambahkan parameter lain sesuai dokumentasi API (media_url, etc)
                ],
            ]);

            $statusCode = $response->getStatusCode();
            $body = $response->getBody()->getContents();

            if ($statusCode == 200) {
                return "Pesan berhasil dikirim!";
                // return $this->response->setJSON(['status' => 'success', 'message' => 'Pesan terkirim']);
            } else {
                return "Gagal mengirim pesan. Status: " . $statusCode . ", Body: " . $body;
                // return $this->response->setJSON(['status' => 'error', 'message' => 'Gagal']);
            }
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            return "Terjadi error: " . $e->getMessage();
            // return $this->response->setJSON(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function sendWhatsAppMessage()
    {

        $lab = new LaboratoriumModel();
        $data = ['1' ,'2', '3'];

        $curl = curl_init();
$part1 = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled';
$part2 = 'it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic' ;
$part3 = 'typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.fonnte.com/send',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array(
    'target' => '085771753845',
    'message' => $part1.$part2.$part3, 
    'countryCode' => '62', //optional
),
    CURLOPT_HTTPHEADER => array(
        'Authorization: 5DmvZWjA8EmxwaBpRpKU' //change TOKEN to your actual token
    ),
));

$response = curl_exec($curl);

curl_close($curl);
        $detail = json_decode($response);    
        // var_dump($detail);die;
        echo $detail->detail;
    }
}
