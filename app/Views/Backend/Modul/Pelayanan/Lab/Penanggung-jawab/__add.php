<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-plus-square"></span> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <?php
            if ($jumlah > 0) {
                        ?>
                        <div class="modal-body">
                            <div class="alert alert-danger fw-bold" role="alert">
                                Penanggung jawab sudah di isi !
                            </div>
                        </div>
                        <?php
                    }else{
            ?>
            <form action="<?= base_url('pelayanan/pengantar-lab/penanggung-jawab/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="kode_pengantar" value="<?= strtoupper($kode_pengantar); ?>">
                <input type="hidden" name="id_kat_lab" value="<?= $id_kat_lab ?>">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-petugas" class="form-label h5">Nama petugas sampling</label>
                        <input type="text" name="nama_pjb" class="form-control" id="nama-petugas">
                        <div class="invalid-feedback errorNamaPetugas"></div>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp-petugas" class="form-label h5">No.Telp petugas sampling</label>
                        <input type="text" name="no_telp_pjb" class="form-control" id="no-telp-petugas">
                        <div class="invalid-feedback errorNoTelpPetugas"></div>
                    </div>
                    <div class="mb-3">
                        <label for="penerima-sampel" class="form-label h5">Penerima sampel</label>
                        <input type="text" name="penerima_sampel" class="form-control" id="penerima-sampel">
                        <div class="invalid-feedback errorPenerimaSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp-penerima" class="form-label h5">No.Telp penerima sampel</label>
                        <input type="text" name="no_telp_penerima" class="form-control" id="no-telp-penerima">
                        <div class="invalid-feedback errorTelpPenerima"></div>
                    </div>
                    <div class="mb-3">
                        <label for="tgl-terima-sampel" class="form-label h5">Tgl terima sampel</label>
                        <input type="date" name="tgl_terima_sampel" class="form-control" id="tgl-terima-sampel" autocomplete="off">
                        <div class="invalid-feedback errorTglTerimaSampel"></div>
                    </div>
                    <div class="mb-3">
                        <label for="jam-terima-sampel" class="form-label h5">Jam terima sampel</label>
                        <input type="time" name="jam_terima_sampel" class="form-control" id="jam-terima-sampel">
                        <div class="invalid-feedback errorJamTerimaSampel"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><span class="fa-solid fa-save"></span> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><span class="fa-solid fa-close"></span> Tutup</button>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<script>
    // var dateToday = new Date();
    // $("#tgl-terima-sampel").datepicker(
    //     { 
    //         dateFormat: 'dd-mm-yy', 
    //         defaultDate: "",  
    //         inDate: dateToday
    //     }
    // );
</script>
<script src="<?= base_url('assets/js/Pelayanan/@save_pj_plab.js') ?>"></script>