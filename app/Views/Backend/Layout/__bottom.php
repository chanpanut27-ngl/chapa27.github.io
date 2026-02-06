<script src="<?= base_url('assets/js/plugins/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/fonts/custom-font.js'); ?>"></script>
<script src="<?= base_url('assets/js/pcoded.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/feather.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/fontawesome.v6.3.0.all.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-3.7.1.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/sweetalert2.all.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
<script src="<?= base_url('assets/js/mantis.js'); ?>"></script>

<script>
    function checkConnectionAjax(url) 
    {
        const xhr = new XMLHttpRequest();
        const startTime = new Date().getTime();
        const timeout = 3000; // 3 detik

        xhr.open('GET', url, true);
        xhr.setRequestHeader('Cache-Control', 'no-cache');
        xhr.onload = function () {
            if (xhr.status >= 200 && xhr.status < 300) {
                console.log("Status Koneksi AJAX: AKTIF");

            } else {
            // console.log(`Status Koneksi AJAX: TIDAK AKTIF (Kode Status: ${xhr.status})`);
            // alert('tidak aktif');
            Swal.fire({
                title: `Kode Status: ${xhr.status}`,
                text: 'Koneksi internet terputus',
                icon: "error",
                timer: 3000
            });  
        }
    };

    xhr.onerror = function () {
        // Status 0 biasanya menunjukkan kegagalan jaringan atau CORS
        if (xhr.status === 0) {
           console.log("Status Koneksi AJAX: TIDAK AKTIF (Gagal terhubung ke jaringan)");
            
        }
    };
    
    xhr.ontimeout = function() {
        console.log("Status Koneksi AJAX: Waktu permintaan habis (Timeout)");
    };

    xhr.send();
}

// Contoh penggunaan:
// Cek setiap 5 detik
setInterval(() => checkConnectionAjax('http://google.com/'), 15000);

</script>
<!-- [bottomAssets] start -->
<?= $this->renderSection('bottomAssets'); ?>
<!-- [bottomAssets] end -->
 
</body>
<!-- [Body] end -->
</html>