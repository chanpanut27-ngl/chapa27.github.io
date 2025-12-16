<?= $this->extend('Backend/Layout/_main'); ?>
<?= $this->section('content'); ?>
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row p-0">
                <!-- [ sample-page ] start -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>
                                <span class="fa-solid fa-home"></span> BB Labkesmas JAKARTA Balai Besar Laboratorium Kesehatan Masyarakat Jakarta
                            </h5>
                        </div>
                        <img src="<?= base_url('assets/images/kantor-bblkm-jakarta.jpg');?>" style="height:220px;">
                        <div class="card-body">
                        Jl. Bambu Apus Raya No.6, RT.12/RW.3, Bambu Apus, Kec. Cipayung, Kota Jakarta Timur, <br> 
                                    Daerah Khusus Ibukota Jakarta 13890 <br>

                                    Telp : (021) 8484912 Hunting <br>

                                    Call center : +62 812 9000 3610 <br>

                                    Faksimilie : (021) 22106603 <br>

                                    Email : labkesmasjakarta@gmail.com <br>

                                    Website : bblkmjakarta.org <br>
                        </div>
                    </div>
                </div>
                <!-- [ sample-page ] end -->
            </div>
        </div>
    </div>
<?= $this->endSection(); ?>

    

