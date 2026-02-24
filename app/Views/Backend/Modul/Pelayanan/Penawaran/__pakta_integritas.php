<style>
        .kertas-surat {
            width: 210mm; /* Ukuran A4 */
            min-height: 297mm;
            padding: 20mm;
            background-color: white;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .kop-surat {
            text-align: center;
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
        .isi-surat p { text-indent: 0px; margin-bottom: 15px; }
        
        .tanda-tangan {
            margin-top: 50px;
            float: right;
            text-align: left;
            width: 200px;
        }
        .nama-penanda { margin-top: 70px; font-weight: bold; text-decoration: underline; }
    </style>
</head>
<body>

<div class="kertas-surat">
    <!-- Kepala Surat (Kop) -->
    <div class="kop-surat">
        <h2>PAKTA INTEGRITAS <br>
ANTI GRATIFIKASI DAN PELAYANAN PRIMA</h2>
    </div>

   

    <!-- Isi Surat -->
    <div class="isi-surat">
        <p>Komitmen pejabat/pegawai Labkesmas Jakarta dan satuan kerja mitra Labkesmas Jakarta
untuk pelaksanaan Sistem Integritas dalam pelayanan pada Labkesmas Jakarta.</p>
        
        <p>
Kami pejabat / pegawai Labkesmas Jakarta dan RS Sumber Waras, bersama ini menyatakan
hal-hal sebagai berikut :
<ol>
  <li>
    Pelayanan pemeriksaan sampel dilaksanakan oleh Tim Kerja Program dan Layanan
dan Instalasi terkait di Labkesmas Jakarta ;
  </li>
  <li>
    Labkesmas Jakarta memberikan pelayanan kepada RS Sumber Waras secara cepat,
tepat, transparan dan akuntabel, dan tanpa memungut biaya (zero cost) selain tarif
sesuai dengan PMK 45 Tahun 2024;
  </li>
  <li>
RS Sumber Waras menunjukkan tempat pengambilan sampel sesuai RAB;
  </li>
  <li>
Pegawai Labkesmas Jakarta tidak menerima gratifikasi dalam bentuk apapun
  </li>
</ol>
        </p>
        <p>
            Demikian pernyataan janji ini Kami buat dengan sesungguhnya. Atas pelanggaran janji yang
Kami nyatakan dalam Pakta Integritas ini, Kami bersedia dikenakan sanksi moral, sanksi
administrasi sesuai dengan ketentuan Perundang-undangan yang berlaku.
        </p>
    </div>

    <!-- Penutup & Tanda Tangan -->
    <div class="tanda-tangan">
        Ditandatangani di : Jakarta <br>
Pada tanggal :  Februari <?= date('Y') ?><br>
        <div class="nama-penanda">_____________________</div>
    </div>
    
</div>