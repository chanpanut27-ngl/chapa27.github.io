<div class="row">
    <div class="col-sm-3"><b>No.Registrasi</b></div>
    <div class="col-sm-3">: <?= $items['no_reg'] ?></div>
    <div class="col-sm-3"><b>No.Telp/Hp Pengirim</b></div>
    <div class="col-sm-3">: <?= $items['no_telp_pengirim'] ?></div>
</div>
<div class="row">
    <div class="col-sm-3"><b>Nama pengirim</b></div>
    <div class="col-sm-3">: <?= $items['nama_pengirim'] ?></div>
    <div class="col-sm-3 d-none"><b>Tgl & jam pengambilan sampel</b></div>
    <div class="col-sm-3 d-none">: <?= date('d-m-Y', strtotime($items['tgl_ambil_sampel'])).' '.date('H:i', strtotime($items['jam_ambil_sampel'])) ?></div>
    <div class="col-sm-3"><b>Instansi</b></div>
    <div class="col-sm-3">: <?= $items['instansi'] ?></div>
</div>    
<div class="row">
    <div class="col-sm-3"><b>Spesimen/sampel</b></div>
    <div class="col-sm-3">: <?= $items['spesimen_atau_sampel'] ?></div>
    <div class="col-sm-3 d-none"><b>Lokasi pengambilan sampel/spesimen	</b></div>
    <div class="col-sm-3 d-none">: <?= $items['lokasi_ambil_sampel'] ?></div>
    <div class="col-sm-3"><b>Alamat</b></div>
    <div class="col-sm-3">: <?= $items['alamat'] ?></div>
</div>  
<div class="row">
    <div class="col-sm-3 d-none"><b>Petugas pengambilan sampel</b></div>
    <div class="col-sm-3 d-none">: <?= $items['petugas_ambil_sampel'] ?></div>
    <div class="col-sm-3 d-none"><b>Keterangan tambahan</b></div>
    <div class="col-sm-3 d-none">: <?= $items['keterangan_tambahan'] ?></div>
</div>   
<div class="row d-none">
    <div class="col-sm-3"><b>Instansi</b></div>
    <div class="col-sm-9">: <?= $items['instansi'] ?></div>
</div>