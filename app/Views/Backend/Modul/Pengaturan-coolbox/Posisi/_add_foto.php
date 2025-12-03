<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pengaturan-coolbox/posisi-coolbox/upload-foto'); ?>" class="form-upload" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <?= $strCoolbox = str_replace("/", "_", $coolbox['kode_coolbox']); ?>
                <input type="hidden" name="id" value="<?= $items['id']; ?>">
                <input type="hidden" name="status" value="<?= $items['status']; ?>">
                <div class="modal-body">
                    <input type="text" name="kode_coolbox" readonly value="<?= $strCoolbox; ?>" class="form-control" id="kode-coolbox">
                    <input type="hidden" name="id" readonly value="<?= $items['id']; ?>" class="form-control" id="id">
                    <input type="hidden" name="file_old" readonly value="<?= $items['foto']; ?>" class="form-control" id="file-old">
                    <div class="mb-3">
                        <label for="upload-foto" class="form-label h5">Upload Foto</label>
                        <input type="file" name="upload_foto" class="form-control" id="upload-foto">
                        <div class="invalid-feedback errorFile"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-upload"><i class="fas fa-edit"></i> Upload</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".btn-upload").click(function(e) {
            e.preventDefault();
            let form = $('.form-upload')[0];
            let data = new FormData(form);
            $.ajax({
                type: "post",
                url: $('.form-upload').attr('action'),
                data: data,
                enctype: 'multipart/form-data',
                dataType: 'json',
                processData: false,
                contentType: false,
                cache: false,
                beforeSend: function() {
                    $('.btn-upload').attr('disable', 'disabled');
                    $('.btn-upload').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-upload').removeAttr('disable');
                    $('.btn-upload').html('Upload');
                },
                success: function(response) {
                    if (response.error) {

                        Swal.fire({
                            title: "Gagal",
                            text: response.error,
                            icon: "error"
                        });

                        $("#exampleModal").modal('hide');
                    } else {
                        Swal.fire({
                            title: "Berhasil",
                            text: response.sukses,
                            icon: "success"
                        });

                        $("#exampleModal").modal('hide');
                        listData();
                    }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        })
    })
</script>