<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-clipboard"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               <table id="example1" class="table table-bordered">
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
                            <td><?= $row['parameter'] ?></td>
                            <td><?= $row['metode'] ?></td>
                            <td style="text-align: right;"><?= number_to_currency($row['harga_per_titik'], 'IDR', 'ID', 0) ?></td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
               </table>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        new DataTable('#example1', {
            responsive: true
        });
    })
</script>