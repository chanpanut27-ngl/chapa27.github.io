<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel"><span class="fa-solid fa-eye"></span> <?= $title; ?></h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="fw-bold">No.</th>
                            <th class="fw-bold">Pemeriksaan</th>
                            <th class="fw-bold">Peraturan</th>
                            <th class="fw-bold">Laboratorium</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($items as $row) :?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $row['jenis_sampel'] ?></td>
                                <td><?= $row['peraturan'] ?></td>
                                <td><?= $row['nama_lab'] ?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
