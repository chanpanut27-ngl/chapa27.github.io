
    <div class="card-body" style="text-align: center;">
        <?php
        
        foreach ($items as $rows) {
            $foto = $rows['user_image'];
        }
        if ($foto != 'default.svg') {
            $img = '<img src="'.base_url('Uploads/Foto/'.$foto).'" alt="" class="img-fluid img-circle">';
        }else{
            $img = '<img src="'.base_url('assets/images/default.svg').'" alt="" class="img-fluid img-circle">';
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
    <div class="card-footer">
        <form action="<?= base_url('profil-pegawai/upload-foto') ?>" class="form-upload" enctpype="multipart/form-data">
            <input type="text" name="fullname" id="fullname" value="<?= user()->id ?>">
            <input type="file" name="user_image" id="user-image" class="form-control">
            <button type="submit" class="btn btn-sm btn-primary btn-upload">Ubah foto</button>
        </form>
    </div>

<script>
    $(document).ready(function() {
        $(".btn-upload").click(function(e) {
            e.preventDefault();
           
            var urls = $(".form-upload").attr('action');
            var formData = new FormData();
            var foto = $("#user-image")[0];
            let fullname = document.getElementById("fullname").value;

            formData.append('user_image', foto.files[0]); 
            formData.append('fullname', fullname)

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

            
            // $.ajax({
            //     type: "post",
            //     url: $(".form-upload").attr('action'),
            //     data: formData,
            //     processData: false,
            //     contentType: false,
            //     cache: false,
            //     beforeSend: function() {
            //         $('.btn-upload').attr('disable', 'disabled');
            //         $('.btn-upload').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            //     },
            //     complete: function() {
            //         $('.btn-upload').removeAttr('disable');
            //         $('.btn-upload').html('Ubah foto');
            //     },
            //     success: function(response) {
            //         var res = response.error;
            //         if (res) {
            //              Swal.fire({
            //                 title: "Gagal",
            //                 text: response.error,
            //                 icon: "error"
            //             });
            //         } else{
            //             Swal.fire({
            //                 title: "Berhasil",
            //                 text: response.sukses,
            //                 icon: "success"
            //             });
            //             listFoto();
            //         }
            //     },
            //     error: function(xhr, ajaxOptions, thrownError) {
            //         alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            //     }
            // })
        })
    })
</script>