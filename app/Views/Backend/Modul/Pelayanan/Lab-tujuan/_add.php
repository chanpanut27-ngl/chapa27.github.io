<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: arial;"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('laboratorium-tujuan/create-data'); ?>" class="form-data">
                <?= csrf_field();?>
                <?php foreach ($pengantar_lhu as $lhu) : ?>
                <input type="hidden" name="id_pelanggan" value="<?= $lhu['id_pelanggan']; ?>">
                <input type="hidden" name="id_pengantar_lhu" value="<?= $lhu['id_pengantar']; ?>">
                <input type="hidden" name="kode_pengantar" value="<?= $lhu['kode_pengantar']; ?>">
                <?php endforeach;?>
                <div class="modal-body">
                    <?php 
                        foreach ($masterLab as $lb) : 
                            ?>
                            <label for="<?= $lb['id'] ?>">
                                <input type="checkbox" name="id_laboratorium[]" value="<?= $lb['id'] ?>" id="<?= $lb['id'] ?>"> <?= $lb['nama_lab']; ?>
                            </label> <br>
                            <?php
                        endforeach;
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><span class="fa-solid fa-save"></span> Simpan</button>
                    <button type="button" class="btn btn-secondary rounded btn-sm" data-bs-dismiss="modal"><span class="fa-solid fa-close"></span> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $(".form-data").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('.btn-simpan').attr('disable', 'disabled');
                    $('.btn-simpan').html('<i class="fa fa-spin fa-spinner"></i>');
                    $('.invalid-feedback').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-simpan').removeAttr('disable');
                    $('.btn-simpan').html('<i class="fas fa-save"></i> Simpan');
                },
                success: function(response) {
                    var err = response.error
                    if (err) {
                        if (err.nama_lab) {
                            $('#nama-lab').addClass('is-invalid');
                            $('.errorNamaLab').html(err.nama_lab);
                        } else {
                            $('#nama-lab').removeClass('is-invalid');
                            $('.errorNamaLab').html('');
                        }
                        if (err.lantai) {
                            $('#lantai').addClass('is-invalid');
                            $('.errorLantai').html(err.lantai);
                        } else {
                            $('#lantai').removeClass('is-invalid');
                            $('.errorLantai').html('');
                        }
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