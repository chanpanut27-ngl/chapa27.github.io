<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-square-plus fs-2"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/permintaan/create-data'); ?>" class="form-data">
                <?= csrf_field(); ?>
                <input type="hidden" name="no_telp" value="0">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nama-pengirim" class="form-label h5">Nama pelanggan</label>
                        <input type="text" name="nama_pengirim" class="form-control" id="nama-pengirim" autocomplete="off">
                        <div class="invalid-feedback errorNamaPengirim"></div>
                    </div>
                    <div class="mb-3">
                        <label for="no-telp-pengirim" class="form-label h5">No.Telp/Hp pelanggan</label>
                        <input type="text" name="no_telp_pengirim" class="form-control" id="no-telp-pengirim" autocomplete="off">
                        <div class="invalid-feedback errorTelpPengirim"></div>
                    </div>
                    <div class="mb-3">
                        <label for="instansi" class="form-label h5">Instansi</label>
                        <input type="text" name="instansi" id="instansi" class="form-control">
                        <div class="invalid-feedback errorInstansi"></div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label h5">Alamat</label>
                        <textarea name="alamat" id="alamat" class="form-control"></textarea>
                        <div class="invalid-feedback errorAlamat"></div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label h5">Spesimen/Sampel</label>
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
                        <label for="tanggal" class="form-label h5">Tanggal</label>
                        <input type="datetime-local" name="created_at" id="tanggal" class="w-50 form-control">
                        <div class="invalid-feedback errorTanggal"></div>
                    </div>
                    <div class="mb-3 d-none">
                        <label for="petugas" class="form-label h5">Petugas ambil sampel/spesimen</label>
                        <input type="text" name="petugas_ambil_sampel" class="form-control" id="petugas" autocomplete="off">
                        <div class="invalid-feedback errorPetugas"></div>
                    </div>
                    <div class="mb-3 d-none">
                        <label for="tgl-ambil-sampel" class="form-label h5">Tanggal pengambilan sampel/spesimen</label>
                        <input type="text" name="tgl_ambil_sampel" id="tgl-ambil-sampel" class="form-control" autocomplete="off">
                        <div class="invalid-feedback errorTglAmbilSampel"></div>
                    </div>
                    <div class="mb-3 d-none">
                        <label for="jam-ambil-sampel" class="form-label h5">Jam pengambilan sampel/spesimen</label>
                        <input type="time" name="jam_ambil_sampel" id="jam-ambil-sampel" class="form-control" autocomplete="off">
                        <div class="invalid-feedback errorJamAmbilSampel"></div>
                    </div>
                    <div class="mb-3 d-none">
                        <label for="lokasi-ambil-sampel" class="form-label h5">Lokasi pengambilan sampel/spesimen</label>
                        <input type="text" name="lokasi_ambil_sampel" class="form-control" id="lokasi-ambil-sampel" autocomplete="off">
                        <div class="invalid-feedback errorLokasiAmbilSampel"></div>
                    </div>
                    <div class="mb-3 d-none">
                        <label for="keterangan-tambahan" class="form-label h5">Keterangan tambahan</label>
                        <textarea name="keterangan_tambahan" id="keterangan-tambahan" class="form-control"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm rounded btn-simpan"><i class="ti ti-device-floppy"></i> Simpan</button>
                    <button type="button" class="btn btn-secondary btn-sm rounded" data-bs-dismiss="modal"><i class="ti ti-x"></i> Tutup</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/js/Pelanggan/@save_pelanggan.js') ?>"></script>

