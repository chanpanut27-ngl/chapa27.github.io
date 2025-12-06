<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-3" id="exampleModalLabel" style="font-family: calibri;"><i class="fa-solid fa-edit"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan-pemeriksaan/penanggung-jawab-lhu/update-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="id" value="<?= $items['id']; ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Nama</label>
                        <input type="text" name="nama_pjb" value="<?= $items['nama_pjb'] ?>" class="form-control" id="nama-lab">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">No.Telepon Petugas</label>
                        <input type="text" name="no_telp_pjb" value="<?= $items['no_telp_pjb'] ?>" class="form-control" id="nama-lab">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">Penerima</label>
                        <input type="text" name="penerima_sampel" value="<?= $items['penerima_sampel'] ?>" class="form-control" id="nama-lab">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="nama-lab" class="form-label h5">No.Telepon Penerima</label>
                        <input type="text" name="no_telp_penerima" value="<?= $items['no_telp_penerima'] ?>" class="form-control" id="nama-lab">
                        <div class="invalid-feedback errorNamaLab"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tgl-terima-sampel" class="form-label h5" style="font-family: calibri;">Tanggal terima sampel</label>
                        <input type="text" name="tgl_terima_sampel" value="<?= date('d-m-Y', strtotime($items['tgl_terima_sampel'])); ?>" class="form-control" id="tgl-terima-sampel">
                        <div class="invalid-feedback errorTglTerimaSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jam-terima-sampel" class="form-label h5" style="font-family: calibri;">Tanggal terima sampel</label>
                        <input type="time" name="jam_terima_sampel" value="<?= $items['jam_terima_sampel']; ?>" class="form-control" id="jam-terima-sampel">
                        <div class="invalid-feedback errorJamTerimaSampel"></div>
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-ubah"><i class="fas fa-edit"></i> Ubah</button>
                    <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa-solid fa-close"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $( "#tgl-terima-sampel" ).datepicker({ dateFormat: 'dd-mm-yy' });

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
                    $('.btn-ubah').html('Ubah');
                },
                success: function(response) {
                    var err = response.error
                    Swal.fire({
                        title: "Berhasil",
                        text: response.sukses,
                        icon: "success"
                    });
                    $("#exampleModal").modal('hide');
                    listData();
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                }
            })
        })
    })
</script>