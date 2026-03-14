<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-edit fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/pengantar-lab/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id'] ?>">
                <input type="hidden" name="kode_pengantar" value="<?= $items['kode_pengantar'] ?>">
                <div class="modal-body">
                    <div class="mb-1">
                        <label for="pelanggan" class="form-label h5">Pelanggan</label>
                    </div>
                    <div class="mb-3">
                        <select name="id_pelanggan" class="form-control" id="pelanggan" style="width: 100%;" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php 
                            foreach ($permintaan as $row) :
                            ?>
                            <option value="<?= $row['id'] ?>" <?= $row['id'] == $items['id_pelanggan'] ? 'selected' : '' ?>><?= $row['no_reg']; ?> - <?= $row['nama_pengirim']; ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorPelanggan"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal" class="form-label h5">Tanggal</label>
                        <input type="text" name="tanggal" value="<?= date('d-m-Y', strtotime($items['tanggal'])) ?>" id="tanggal" class="form-control" autocomplete="off">
                        <div class="invalid-feedback errorTanggal"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-ubah"><i class="ti ti-edit"></i> Ubah</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
       
        $('#pelanggan').select2({
            dropdownParent: $('#exampleModal')
        });

        var dateToday = new Date();
        $("#tanggal").datepicker(
            { 
                dateFormat: 'dd-mm-yy', 
                defaultDate: "",  inDate: dateToday
            }
        );
        
        $(".form-data").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                    $('.btn-ubah').attr('disabled', 'disabled');
                    $('.btn-ubah').html('<i class="fa fa-spin fa-spinner"></i>');
                    $('.invalid-feedback').html('<i class="fa fa-spin fa-spinner"></i>');
                },
                success: function(response) {
                    var err = response.error
                    if (err) {
                        if (err.id_pelanggan) {
                            $('#pelanggan').addClass('is-invalid');
                            $('.errorPelanggan').html(err.id_pelanggan);
                        } else {
                            $('#pelanggan').removeClass('is-invalid');
                            $('.errorPelanggan').html('');
                        }
                        if (err.tanggal) {
                            $('#tanggal').addClass('is-invalid');
                            $('.errorTanggal').html(err.tanggal);
                        } else {
                            $('#tanggal').removeClass('is-invalid');
                            $('.errorTanggal').html('');
                        }
                    } else {
                        Swal.fire({
                            title: "Berhasil",
                            text: response.sukses,
                            icon: "success",
                            timer: 2000,
                            width: '400px',
                            padding: '1em'
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                listData();
                            }
                        });

                        $("#exampleModal").modal('hide');
                        listData();
                    }
                },
                complete: function() {
                    $('.btn-ubah').removeAttr('disabled');
                    $('.btn-ubah').html('<i class="ti ti-edit"></i> Ubah');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        })
    })
</script>
