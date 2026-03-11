<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['#', 'No. Reg', 'Kode pelanggan', 'Nama pelanggan', 'No.Telp/Hp pelanggan', 'Instansi', 'Tgl & jam permintaan', 'Actions'];
        echo '<tr>';
        foreach ($arrth as $th) :
            echo '<th>' . $th . '</th>';
        endforeach;
        echo '</tr>';
        ?>
    </thead>
    <tbody>
        <?php
        use App\Models\StatusLayananModel;
        $no = 1;
        $status_layanan = new StatusLayananModel();
        $sts = $status_layanan->findAll();

        foreach ($items as $row) :
            
        ?>
            <tr id="myId-<?= $row['id'] ?>" data-urut=<?= $no; ?>>
                <td class="text-center">
                    <b><?= $no++; ?></b>
                    <button type="button" class="btn bg-teal-500 text-light btn-sm rounded btn-sts-<?= $row['id']; ?>" onclick="statusLayanan(<?= $row['id']; ?>)" title="Status layanan">
                        <i class="ti ti-circle-check"></i>
                    </button>
                </td>
                <td>
                    <?= $row['no_reg'] ?> <br>
                    <?php
                    foreach ($sts as $key) {
                        if ($row['id'] == $key['id_pelanggan']) {
                            $sts_ket = '';
                            $bgs = '';
                            if ($key['status'] == 'Permintaan di Terima') {
                                $sts_ket = 1;
                                $bgs = 'bg-primary';
                            } else if ($key['status'] == 'Permintaan di Tolak'){
                                $sts_ket = 2;
                                $bgs = 'bg-secondary';
                            } else if ($key['status'] == 'Penawaran di Terima'){
                                $sts_ket = 3;
                                $bgs = 'bg-warning';
                            } else if ($key['status'] == 'Penawaran di Tolak'){
                                $sts_ket = 4;
                                $bgs = 'bg-danger';
                            } else if ($key['status'] == 'Distribusi sampel'){
                                $sts_ket = 5;
                                $bgs = 'bg-info';
                            } else {
                                $sts_ket = 0;
                                $bgs = '';
                            } 
                            echo '<span class="badge rounded-pill '.$bgs.'" title="'.$key['status'].'">'.$sts_ket.'</span>&nbsp;';
                        }
                    }
                    ?>
                </td>
                <td><?= $row['kode_pelanggan'] ?></td>
                <td><?= $row['nama_pengirim'] ?></td>
                <td><?= $row['no_telp_pengirim'] ?></td>
                <td><?= $row['instansi'] ?></td>
                <td class="text-center"><?= date('d/m/Y H:i', strtotime($row['created_at'])); ?></td>
                <td>
                    <div class="d-flex justify-content-start gap-1">
                        <button type="button" class="btn btn-warning border-0 btn-sm rounded btn-edit-<?= $row['id']; ?>" onclick="editData(<?= $row['id']; ?>)" title="Edit data">
                            <i class="ti ti-edit"></i>
                        </button>
                        <button type="button" class="btn btn-danger border-0 btn-sm rounded" onclick="deleteData(<?= $row['id']; ?>)" title="Hapus data">
                            <i class="ti ti-trash"></i>
                        </button>
                        <a href="<?= base_url('pelayanan/pemeriksaan/index/'.$row['no_reg']) ?>" class="btn btn-info rounded btn-sm" title="Proses Pemeriksaan">
                            Pemeriksaan
                        </a>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<p>
    <h5><span class="badge rounded-pill bg-primary">Permintaan di Terima</span>
    <span class="badge rounded-pill bg-secondary">Permintaan di Tolak</span>
    <span class="badge rounded-pill bg-warning">Penawaran di Diterima</span>
    <span class="badge rounded-pill bg-danger">Penawaran di Tolak</span></h5>
</p>

<script>
    function editData(id) 
    {
        $.ajax({
            type: 'get',
            url: '<?= site_url('pelayanan/permintaan/edit-data/'); ?>' + id,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-edit-'+id).attr('disable', 'disabled');
                $('.btn-edit-'+id).html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.btn-edit-'+id).removeAttr('disable');
                $('.btn-edit-'+id).html('<i class="ti ti-edit"></i>');
            },
            success: function(response) {
                if (response.sukses) {
                    $(".view-modal").html(response.sukses).show();
                    $("#exampleModal").modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    function deleteData(id) {
        var myElement = $('#myId-' + id);
        if (myElement.data('urut')) {
            myElement.addClass('bg bg-danger');
        }
        Swal.fire({
            title: "Yakin untuk menghapus data ?",
            text: `No.urut : ` + myElement.data('urut'),
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Ya, Hapus!",
            cancelButtonText: "Tidak",
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'delete',
                    url: '<?= site_url('pelayanan/permintaan/delete-data/'); ?>' + id,
                    dataType: 'json',
                    success: function(response) {
                        if (response.sukses) {
                            Swal.fire({
                                title: "Hapus Data !",
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
                            listData();
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
                    }
                })
            } else {
                myElement.removeClass('bg bg-danger');
            }
        });
    }

    function statusLayanan(id) 
    {
        $.ajax({
            type: 'get',
            url: '<?= site_url('pelayanan/status-layanan/index/'); ?>' + id,
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-sts-'+id).attr('disable', 'disabled');
                $('.btn-sts-'+id).html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.btn-sts-'+id).removeAttr('disable');
                $('.btn-sts-'+id).html('<i class="ti ti-circle-check"></i>');
            },
            success: function(response) {
                if (response.sukses) {
                    $(".view-modal").html(response.sukses).show();
                    $("#exampleModal").modal('show');
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }

    $(document).ready(function() {
        new DataTable('#example', {
            responsive: true
        });
    })
</script>