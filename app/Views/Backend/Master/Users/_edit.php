<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel"><span class="fa-solid fa-edit"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/users/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="email" class="form-label h5">Email</label>
                        <input type="text" name="email" value="<?= $items['email']; ?>" class="form-control" id="email" autocomplete="off">
                        <div class="invalid-feedback errorEmail"></div>
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label h5">Username</label>
                        <input type="text" name="username" value="<?= $items['username']; ?>" class="form-control" id="username">
                        <div class="invalid-feedback errorUsername"></div>
                    </div>
                    <div class="mb-3">
                        <label for="is-active" class="form-label h5" style="font-family: calibri;">Status</label>
                        <select name="active" class="form-select" id="is-active" aria-label="Default select example">
                            <?php
                            $_isActive = [
                                '1' => 'Aktif', '0' => 'Tidak aktif'
                            ];
                            foreach ($_isActive as $r => $s) :
                            ?>
                                <option value="<?= $r; ?>" <?= $items['active'] == $r ? 'selected' : ''; ?>><?= $s; ?></option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                        <div class="invalid-feedback errorActive"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><span class="fas fa-edit"></span> Ubah</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><span class="fa-solid fa-close"></span> Tutup</button>
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
                    $('.btn-ubah').attr('disable', 'disabled');
                    $('.btn-ubah').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                complete: function() {
                    $('.btn-ubah').removeAttr('disable');
                    $('.btn-ubah').html('<span class="fa-solid fa-edit"></span> Ubah');
                },
                success: function(response) {
                    if (response.error) {

                        if (response.email) {
                            $('#email').addClass('is-invalid');
                            $('.errorEmail').html(response.email);
                        } else {
                            $('#email').removeClass('is-invalid');
                            $('.errorEmail').html('');
                        }
                        if (response.username) {
                            $('#username').addClass('is-invalid');
                            $('.errorUsername').html(response.username);
                        } else {
                            $('#username').removeClass('is-invalid');
                            $('.errorUsername').html('');
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