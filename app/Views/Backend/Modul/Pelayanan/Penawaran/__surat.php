<style>
    
    .kertas-surat {
        width: 210mm; /* Ukuran A4 */
        min-height: 297mm;
        padding: 20mm;
        background-color: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .kop-surat {
        text-align: left;
        border-bottom: 3px double #000;
        margin-bottom: 20px;
        padding-bottom: 10px;
    }
    .kop-surat h2 { margin: 0; text-transform: uppercase; }
    .kop-surat p { margin: 0; font-size: 12px; }
    
    .info-surat {
        display: flex;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .tujuan-surat { margin-bottom: 30px; }
    .isi-surat { text-align: justify; }
    .isi-surat p { text-indent: 40px; margin-bottom: 15px; }
    
    .tanda-tangan {
        margin-top: 50px;
        float: right;
        text-align: left;
        width: 200px;
    }
    .nama-penanda { margin-top: 70px; font-weight: bold; text-decoration: underline; }
</style>
<?php
use App\Libraries\CustomLib;
?>
<div class="kertas-surat">
    <!-- Kepala Surat (Kop) -->
    <div class="kop-surat">
        <!-- <h2>PT <?= $items['instansi'] ?></h2>
        <p>Jl. Jenderal Sudirman No. 123, Jakarta Selatan</p>
        <p>Telp: (021) 555-0192 | Email: info@majujaya.com</p> -->
        <table class="table">
            <tr>
                <td width="60%">
                    <?php
                    $custom_lib = new CustomLib();
                    echo $custom_lib->logo_kopsurat();
                    ?>
                </td>
                <td>
                    <?php echo $custom_lib->ket_kopsurat2('No.Kode: LB.IV.7.1.1.3');?>
                </td>
            </tr>
        </table>
    </div>

    <!-- Tanggal & Perihal -->
    <div class="info-surat">
        <div>
            Nomor : KL.01.02/X.4/370/2025 <br>
            Lampiran : 3 Lembar<br>
            Hal : <b>Pelaksanaan Sampling dan Uji Sampel</b>
        </div>
        <div>
            Jakarta, 24 Februari 2026
        </div>
    </div>

    <!-- Alamat Tujuan -->
    <div class="tujuan-surat">
        Yang terhormat<br>
        Direktur <?= $items['instansi'] ?><br>
        <?= $items['alamat'] ?>
    </div>

    <!-- Isi Surat -->
    <div class="isi-surat">
        <p> Menindaklanjuti perihal permohonan pelaksanaan sampling dan uji sampel,bersama ini
disampaikan rencana pelaksanaan kegiatan pengujian faktor risiko penyakit dan lingkungan
sebagai berikut : <br>

1. Lokasi dan jumlah sampel uji serta biaya pelaksanaan sesuai terlampir.
2. Prosedur Pembayaran
&nbsp;&nbsp;a. Penerimaan Negara Bukan Pajak (PNBP) dipungut sesuai Peraturan Menteri
Keuangan Republik &nbsp;&nbsp;&nbsp;&nbsp;Indonesia Nomor 45 Tahun 2024 tentang Jenis dan Tarif
Atas Jenis Penerimaan Negara Bukan &nbsp;&nbsp;&nbsp;&nbsp;Pajak yang bersifat Volatil dan Kebutuhan
Mendesak yang berlaku pada Kementerian Kesehatan.
&nbsp;&nbsp;b. Biaya akomodasi, uang harian dan transportasi dibebankan kepada wajib bayar
(konsumen) sesuai dengan Standard Biaya Masukan Tahun Anggaran 2024
yang dikeluarkan oleh Kementerian Keuangan <br>
c. Jumlah dan jenis contoh uji yang telah disepakati dalam RAB (Rencana
Anggaran Biaya) mengikat kedua belah pihak dan tidak dapat dilakukan
perubahan. <br>
d. <b>Tidak menerima gratifikasi dalam bentuk apapun</b>
</p>
        
        <p>
            Sebagai bahan pertimbangan & akuntabilitas kinerja, terlampir disampaikan Rencana
            Anggaran Biaya (RAB) dan Pakta Integritas untuk di tandatangani, di stempel dan
            disampaikan kembali ke Labkesmas Jakarta. <br>
            &nbsp;&nbsp;&nbsp;&nbsp;Koordinasi dan informasi lebih lanjut melalui Sdr. Niko Sutanto di Call Center Program
            Layanan Labkesmas Jakarta 081290003610 / email prola.bblkmjkt@gmail.com
            Atas perhatian dan kerjasama yang baik, disampaikan terima kasih
        </p>
        
        <p>Atas perhatian dan kerjasama yang baik, disampaikan terima kasih</p>
    </div>

    <!-- Penutup & Tanda Tangan -->
    <div class="tanda-tangan">
        Kepala Balai Besar Laboratorium <br>
Kesehatan Masyarakat Jakarta
        <div class="nama-penanda">dr. Nida Rohmawati, MPH</div>
    </div>
</div>
