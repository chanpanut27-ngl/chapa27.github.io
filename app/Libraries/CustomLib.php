<?php
namespace App\Libraries;

class CustomLib
{
    
    public function greet($name)
    {
        return "Halo, " . $name . "!";
    }

    public function logo_kopsurat()
    {
        $base_url = base_url('assets/images/logo.webp');
        $data = '<img src='.$base_url.' class="img-fluid" alt="logo" style="height: 55px;">';
        return $data;
    }

    public function ket_kopsurat($nomor_form = null)
    {
        $data = '<label for="" class="title-kemenkes">Kementerian Kesehatan </label><br>
            <label for="" class="desc-kemenkes">
            <b>Direktorat Jenderal</b> <br>
            <b>Kesehatan Primer dan Komunitas</b> <br>
            Balai Besar Laboratorium Kesehatan Masyarakat
            Jakarta</label> <br>
            <label for="" style="font-size: 10px;"><span class="fa-solid fa-location-dot"></span> Jl.Bambu Apus Raya No.6 Blok C1 Jakarta Timur 13890<br>
            <span class="fa-solid fa-phone"></span> (021) 3871 2050 - (021) 3871 2051<br>
            <span class="fa-solid fa-globe"></span> www.bblkmjakarta.org</label><br>
            <label for="" style="font-weight: bold; font-size:9px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. Kode '.$nomor_form.'</label>';
        return $data;
    }
    
}
