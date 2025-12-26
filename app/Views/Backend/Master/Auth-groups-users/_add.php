<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('master-data/auth-groups-users/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="group-id" class="form-label h5">Group</label>
                        <select class="form-select" name="group_id" aria-label="Default select example" id="group-id">
                            <?php foreach ($groups as $row) : ?>
                             <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorGroupId"></div>
                    </div>
                    <div class="mb-3">
                        <label for="user-id" class="form-label h5">Username</label>
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="user_id" aria-label="Default select example" id="user-id" style="width: 100%;">
                            <?php foreach ($users as $row) : ?>
                             <option value="<?= $row['id'] ?>"><?= $row['username'] ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorUserId"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><span class="fa-solid fa-save"></span> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><span class="fa-solid fa-close"></span> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#user-id').select2({
            dropdownParent: $('#exampleModal')
        });

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
                    $('.btn-simpan').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                    $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                },
                complete: function() {
                    $('.btn-simpan').removeAttr('disable');
                    $('.btn-simpan').html('<span class="fa-solid fa-save"></span> Simpan');
                },
                success: function(response) {
                    var err = response.error
                    if (err) {
                        if (err.group_id) {
                            $('#group-id').addClass('is-invalid');
                            $('.errorGroupId').html(err.group_id);
                        } else {
                            $('#group-id').removeClass('is-invalid');
                            $('.errorGroupId').html('');
                        }
                        if (err.user_id) {
                            $('#user-id').addClass('is-invalid');
                            $('.errorUserId').html(err.user_id);
                        } else {
                            $('#user-id').removeClass('is-invalid');
                            $('.errorUserId').html('');
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