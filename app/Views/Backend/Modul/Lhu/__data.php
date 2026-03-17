<table class="table table-bordered">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama lab</th>
            <th>Jenis sampel</th>
            <th>Peraturan</th>
            <th>Parameter</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($items as $row) :
            $id_pelanggan = $row['id_pelanggan'];
        ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama_lab'] ?></td>
            <td><?= $row['jenis_sampel'] ?></td>
            <td><?= $row['peraturan'] ?></td>
            <td><?= $row['keterangan'] ?></td>
            <td>
                <a class="btn btn-primary btn-tambah text-white" data-id="<?= $row['id_jenis_sampel'] ?>"><i class="ti ti-pencil"></i></a>
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
<div class="view-modal" style="display: none;"></div>

<script>
    $(document).ready(function () {
        $(".btn-tambah").click(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?= site_url('pelayanan/lembar-hasil-uji/add-data'); ?>",
                dataType: 'json',
                cache: false,
                data: {
                    id_jenis_sampel : $(this).data("id"),
                    id_pelanggan: '<?= $id_pelanggan ?>'
                },
                beforeSend: function() {
                    $('.btn-tambah').attr('disable', 'disabled');
                    $('.btn-tambah').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                },
                complete: function() {
                    $('.btn-tambah').removeAttr('disable');
                    $('.btn-tambah').html('<i class="ti ti-pencil"></i>');
                },
                success: function(response) {
                    $(".view-modal").html(response.data).show();
                    $("#exampleModal").modal('show');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })
    })
</script>
