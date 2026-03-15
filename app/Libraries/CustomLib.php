<?php
namespace App\Libraries;

class CustomLib
{

    public function logo_kopsurat()
    {
        $base_url = base_url('assets/images/logo.webp');
        $data = '<img src='.$base_url.' class="img-fluid" alt="logo" style="height: 70px;">';
        return $data;
    }

    public function ket_kopsurat()
    {
        $data = '<p style="line-height: 13px;">
                    <label for="" style="color:#00A69A; font-weight: bold;">Kementerian Kesehatan</label> <br>
                    <b>Direktorat Jenderal Kesehatan Primer dan Komunitas</b><br>
                    BB Labkesmas Jakarta <br>
                    Jl. Bambu Apus Raya No.6 Blok C1 Jakarta Timur 13890 <br>
                    <i class="ti ti-phone"></i>Call center : 0812-9000-3610 <br>
                    <i class="ti ti-mail"></i>Email : labkesmasjakarta@gmail.com
                </p>';
        return $data;
    }
    
}
