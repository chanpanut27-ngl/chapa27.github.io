<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-plus-square"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('pelayanan/laboratorium-tujuan/create-data'); ?>" class="form-data">
                <?= csrf_field();?>
                <?php
                foreach ($pengantar_lhu as $lhu) : ?>
                <input type="hidden" name="id_pelanggan" value="<?= $lhu['id_pelanggan']; ?>">
                <input type="hidden" name="id_pengantar_lab" value="<?= $lhu['id_pengantar']; ?>">
                <input type="hidden" name="kode_pengantar" value="<?= $lhu['kode_pengantar']; ?>">
                <?php endforeach;?>
                <div class="modal-body">
                    <?php
                    
                    foreach ($masterLab as $lab) :
                         
                        foreach ($cek_lab as $cl) {
                            if (@$cl['id_lab'] == $lab['id']) {
                                ?>
                                <label for="<?= $lab['id'] ?>">
                                    <input type="checkbox" name="id_laboratorium[]" value="<?= $lab['id'] ?>" id="<?= $lab['id'] ?>" checked onclick="return false;"> <?= $lab['nama_lab']; ?>
                                </label><br>
                                <?php
                                break;
                            } 

                        }
                        if (@$cl['id_lab'] != $lab['id']) {
                        ?>
                            <label for="<?= $lab['id'] ?>">
                                <input type="checkbox" name="id_laboratorium[]" value="<?= $lab['id'] ?>" id="<?= $lab['id'] ?>"> <?= $lab['nama_lab']; ?>
                            </label><br>
                            <?php
                        }

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
<script src="<?= base_url('assets/js/Pelayanan/@save_lab_tujuan.js') ?>"></script>