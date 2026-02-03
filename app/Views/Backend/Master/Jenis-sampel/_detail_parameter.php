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
                            <th>No</th>
                            <th>Parameter</th>
                            <th>Metode</th>
                            <th>Harga per titik</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach ($items as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $row['parameter']; ?></td>
                            <td><?= $row['metode']; ?></td>
                            <td><?= number_to_currency($row['harga_per_titik'], 'IDR', 'ID', 0); ?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
               </table>
            </div>
        </div>
    </div>
</div>