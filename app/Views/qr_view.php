<?= $this->extend('Backend/Layout/__main'); ?>
<?= $this->section('topAssets'); ?>
<link rel="stylesheet" href="<?= base_url('assets/css/plugins/dataTables.bootstrap5.css'); ?>">
<style>
   .qr-code {
    width: 80px;
    height: 90px;
} 
</style>
<style>
    /* 1. Container Utama */
    .qr-container {
        position: relative; /* Wajib: agar logo bisa diatur absolute terhadap ini */
        width: 150px;
        height: 150px;
    }

    /* 2. Styling Gambar QR Code */
    .qr-code {
        width: 100%;
        height: 100%;
        display: block;
    }

    /* 3. Styling Logo/Gambar di Tengah */
    .qr-logo {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%); /* Trik untuk benar-benar di tengah */
        
        width: 70px; /* Ukuran logo (jangan terlalu besar) */
        height: 35px;
        border-radius: 2px; /* Opsional: membuat logo melingkar/rounded */
        background-color: white; /* Opsional: memberi background putih di belakang logo */
        padding: 2px; /* Opsional: memberi jarak antara logo dan kode QR */
        box-shadow: 0 0 5px rgba(0,0,0,0.3); /* Opsional: agar logo lebih menonjol */
    }
</style>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="pc-container">
    <div class="pc-content">
    <!-- Embed the Data URI directly into the src attribute -->

     <div class="qr-container">
       <img src="<?= esc($qrCodeImage) ?>" alt="QR Code" class="qr-code">
    </div>
    </div>
</div>
<?= $this->endSection(); ?>
