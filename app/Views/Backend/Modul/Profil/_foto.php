
    <div class="card-body p-0" style="text-align: center;">
        <?php
        foreach ($items as $rows) {
            $foto = $rows['user_image'];
        }
        $pathFile = 'Uploads/Foto/'.$foto;
        if (file_exists($pathFile)) {
            $img = '<img src="'.base_url('Uploads/Foto/'.$foto).'" alt="" class="img-fluid img-foto">';
           
        }else{
            $img = '<img src="'.base_url('assets/images/default.svg').'" alt="" class="img-fluid">';

        }
        ?>
        <div class="mb-2 mt-3">
            <?php echo $img; ?>
        </div>
        <?php foreach ($profil as $rows) : ?>
        <div class="mb-2 mt-3">
            <label><b><?= $rows['nama'] ?></b></label>
        </div>
        <div class="mb-2">
            <label><?= $rows['nip'] ?></label>
        </div>
        <?php endforeach;?>
    </div>
    <div class="card-footer p-2">
        <form action="<?= base_url('profil-pegawai/upload-foto') ?>" class="form-upload" enctpype="multipart/form-data">
            <input type="file" name="user_image" id="user-image" class="form-control" accept="image/png, image/jpg, image/jpeg">
            <button type="submit" class="btn btn-sm btn-primary mt-2 btn-upload">Ubah foto</button>
        </form>
    </div>

<script>
    $(document).ready(function() {
        $(".btn-upload").click(function(e) {
            e.preventDefault();
           
            var urls = $(".form-upload").attr('action');
            var formData = new FormData();
            var foto = $("#user-image")[0];

            formData.append('user_image', foto.files[0]); 

            if (foto.files.length > 0) {
                $.ajax({
                    type: "post",
                    url: urls,
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    beforeSend: function() {
                        $('.btn-upload').attr('disable', 'disabled');
                        $('.btn-upload').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                    },
                    complete: function() {
                        $('.btn-upload').removeAttr('disable');
                        $('.btn-upload').html('Ubah foto');
                    },
                    success: function(response) {
                        var res = response.error;
                        if (res) {
                            Swal.fire({
                                title: "Gagal",
                                text: response.error,
                                icon: "error"
                            });
                        } else{
                            Swal.fire({
                                title: "Berhasil",
                                text: response.sukses,
                                icon: "success"
                            });
                            listFoto();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                    }
                })
            } else {

                Swal.fire({
                    title: "Gagal",
                    text: 'Tidak ada foto yang di pilih',
                    icon: "warning"
                });
                return; 
            }

        })
    })
</script>