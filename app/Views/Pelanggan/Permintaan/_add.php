<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: arial;"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelanggan/permintaan-pemeriksaan/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-pengirim" class="form-label h5">Nama pengirim</label>
                        <input type="text" name="nama_pengirim" class="form-control" id="nama-pengirim" autocomplete="off">
                        <div class="invalid-feedback errorNamaPengirim"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Nama lab</label>
                        <select name="id_lab_permintaan" class="form-control" id="nama-lab" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php 
                            foreach ($masterLab as $row) :
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['nama_lab']; ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Spesimen/Sampel</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="spesimen_atau_sampel" value="Rujukan / Kiriman" id="flexRadioDefault1" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Rujukan / Kiriman
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="spesimen_atau_sampel" value="Diambil oleh Petugas BBLKM Jakarta" id="flexRadioDefault2">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Diambil oleh Petugas BBLKM Jakarta
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="sampel_permintaan" class="form-label h5">Jenis pemeriksaan</label>
                        <select name="id_sampel_permintaan" class="form-control" id="sampel_permintaan" aria-label="Default select example">
                            <option value="">-- Pilih --</option>
                            <?php 
                            foreach ($masterSampel as $row) :
                            ?>
                            <option value="<?= $row['id'] ?>"><?= $row['jenis_sampel']; ?></option>
                            <?php endforeach;?>
                        </select>
                        <div class="invalid-feedback errorSampelPermintaan"></div>
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
                        if (err.nama_pengirim) {
                            $('#nama-pengirim').addClass('is-invalid');
                            $('.errorNamaPengirim').html(err.nama_pengirim);
                        } else {
                            $('#nama-pengirim').removeClass('is-invalid');
                            $('.errorNamaPengirim').html('');
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