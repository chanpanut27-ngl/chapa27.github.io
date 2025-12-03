<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class FileReader extends BaseController
{
     public function standar_pelayanan()
    {
        $data = [
            'title' => 'Standar Pelayanan'
        ];
        return view('Backend/File/_standar_pelayanan', $data);
    }

    public function tarif_pelayanan()
    {
        $data = [
            'title' => 'Tarif Pelayanan'
        ];
        return view('Backend/File/_tarif_pelayanan', $data);
    }

    public function permenkes_no2_2023()
    {
        $data = [
            'title' => 'Permenkes No.2 Tahun 2023'
        ];
        return view('Backend/File/_permenkes_no2_2023', $data);
    }

    public function menlhk_no68_2016()
    {
        $data = [
            'title' => 'MenLHK No.68 Tahun 2016'
        ];
        return view('Backend/File/_menlhk_no68_2016', $data);
    }

    public function permenlh_no11_2025()
    {
         $data = [
            'title' => 'PermenLH No.11 Tahun 2025'
        ];
        return view('Backend/File/_permenlh_no11_2025', $data);
    }

    public function permenlh_no12_2025()
    {
         $data = [
            'title' => 'PermenLH No.12 Tahun 2025'
        ];
        return view('Backend/File/_permenlh_no12_2025', $data);
    }

    public function pertek_bml_domestik()
    {
         $data = [
            'title' => 'Pertek Baku Mutu Limbah Domestik'
        ];
        return view('Backend/File/_pertek_bml_domestik', $data);
    }

    public function permenkes_no1096_2011()
    {
         $data = [
            'title' => 'Permenkes No.1096 Tahun 2011'
        ];
        return view('Backend/File/_permenkes_no1096_2011', $data);
    }

    public function permenkes_no7_aami_2019()
    {
         $data = [
            'title' => 'Permenkes No.7 Tahun 2019 AAMI'
        ];
        return view('Backend/File/_permenkes_no7_aami_2019', $data);
    }
}
