
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" id="main-style-link" >
    <title><?= $kode_pengantar.'_Pengantar_LHU' ?></title>
    
    <style media="print">
        /* Sembunyikan elemen dengan ID ci-logo dan kelas no-print saat mencetak */
        #toolbarContainer, .no-print, button {
            display: none !important;
        }
    </style>
    <script>
        // window.print();
    </script>
</head>
<body>
    <div class="d-flex justify-content-end align-items-center mt-1">
        <button class="btn btn-info rounded btn-sm" onclick="window.print()" title="Cetak" style="text-align: right;">
            <span class="fa-solid fa-print"></span> Cetak
        </button>
    </div>
    <?= $this->include('Component/_kop_surat'); ?>
    <div class="row">
        <div class="col-md-12">
            <table>
                <tr>
                    <td class="p-1 fw-bold"><b>1. Tanggal penerimaan sampel</b></td>
                    <td class="p-1">: <?= date('d-m-Y', strtotime($tgl_terima_sampel['tgl_terima_sampel'])) ?></td>
                </tr>
                <tr>
                    <td class="p-1 fw-bold"><b>2. Sifat pemeriksaan sampel</b></td>
                    <td class="p-1">: 
                        <label for="biasa">
                            <input type="checkbox" name="sifat_pemeriksaan" value="Biasa" id="biasa" <?= $search['sifat_pemeriksaan'] == 'Biasa' ? 'checked' : '' ?>> Biasa
                        </label>
                        <label for="kasus">
                            <input type="checkbox" name="sifat_pemeriksaan" value="Kasus" id="kasus" <?= $search['sifat_pemeriksaan'] == 'Kasus' ? 'checked' : '' ?>> Kasus
                        </label>
                        <label for="rutin/proyek">
                            <input type="checkbox" name="sifat_pemeriksaan" value="Rutin/Proyek" id="rutin/proyek" <?= $search['sifat_pemeriksaan'] == 'Rutin/Proyek' ? 'checked' : '' ?>> Rutin/Proyek
                        </label>
                    </td>
                </tr>
            </table>
            <table class="table-bordered" style="border: 1px solid black; width:100%;">
                <tr class="text-center">
                    <th><label for="">No</label></th>
                    <th><label for="">Kode Sampel</label></th>
                    <th><label for="">Jenis Sampel</label></th>
                    <th><label for="">Peraturan</label></th>
                    <th><label for="">Parameter Uji</label></th>
                    <th><label for="">Metode Uji</label></th>
                    <th><label for="">Keterangan</label></th>
                </tr>
                <?php $no=1; foreach ($items as $row) : ?>
                    <tr>
                        <td class="p-1"><?= $no++; ?></td>
                        <td class="text-center"><?= $row['kode_sampel']; ?></td>
                        <td class="p-1"><?= $row['jenis_sampel'].','.$row['keterangan']; ?><input type="hidden" name="id_jenis_sampel[]" value="<?= $row['id_jenis_sampel'] ?>"></td>
                        <td class="p-1"><?= $row['peraturan']; ?></td>
                        <td class="p-1"><?= $row['parameter_uji'] ?></td>
                        <td class="p-1"><?= $row['metode_uji'] ?></td>
                        <td class="p-1"><?= $row['ket_sampel'] ?></td>
                    </tr>
                <?php endforeach;?>
            </table>
        </div>
        <div class="col-md-12">
            <table>
                <tr>
                    <td class="p-2">
                        Catatan : <br>
Hasil Analisa Lab <br>
1. Semua sampel penerimaan Bakteriologi dikirm pada suhu 8C <br>
2. Batas pengiriman sampel sampai laboratorium <br>
   a. Air minum dan Air Bersih : Pemeriksaan Coliform (<= 30 jam) dan Eschericha coli (<=8 jam) <br>
3. Pengujian sampel = 15 hari kerja
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table>
                <tr class="text-center">
                    <td colspan="2"><b>Tim Kerja Program Layanan</b></td>
                </tr>
                <tr>
                    <td class="p-1"><b>Paraf</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="p-1"><b>Tanggal kirim sampel</b></td>
                    <td class="p-1">:<?= date('d-m-Y', strtotime($search['tgl_kirim_sampel'])) ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <table>
                <tr class="text-center">
                    <td colspan="2"><b><?= $instalasi['nama_instalasi']; ?></b></td>
                </tr>
                <tr>
                    <td class="p-1"><b>Paraf</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="p-1"><b>Tanggal terima sampel</b></td>
                    <td class="p-1">:<?= date('d-m-Y', strtotime($search['tgl_terima_sampel_lab'])) ?></td>
                </tr>
                <tr>
                    <td class="p-1"><b>Tanggal selesai sampel</b></td>
                    <td class="p-1">:<?= date('d-m-Y', strtotime($search['tgl_selesai_sampel'])) ?></td>
                </tr>
            </table>
        </div>
        <div class="col-md-12">
            <table>
                <tr class="text-center">
                    <td colspan="2"><b>Analisis laboratorium</b></td>
                </tr>
                <tr>
                    <td class="p-1"><b>Paraf</b></td>
                    <td></td>
                </tr>
                <tr>
                    <td class="p-1"><b>Tanggal terima sampel</b></td>
                    <td class="p-1">:<?= date('d-m-Y', strtotime($search['tgl_terima_sampel_lab'])) ?></td>
                </tr>
            </table>
        </div>
    </div>
    <script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/fontawesome.v6.3.0.all.js'); ?>"></script>
</body>
</html>
