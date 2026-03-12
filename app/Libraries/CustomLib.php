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
                    Balai Besar Laboratorium Kesehatan Masyarakat Jakarta <br>
                    Jl.Bambu Apus Raya No.6 Blok C1 Jakarta Timur 13890 <br>
                    <i class="ti ti-phone"></i>Telp : (021) 8484912, <i class="ti ti-phone"></i>Call center : 0812-9000-3610 <br>
                    <i class="ti ti-mail"> Email : labkesmasjakarta@gmail.com </i> <br> <i class="ti ti-globe"></i>Web : www.bblkmjakarta.org
                </p>';
        return $data;
    }
    
}
