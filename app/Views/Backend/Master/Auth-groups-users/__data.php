<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        $arrth = ['No', 'User ID', 'Username', 'Email', 'Group ID', 'Group', ''];
        echo '<tr>';
        foreach ($arrth as $th) :
            echo '<th>' . $th . '</th>';
        endforeach;
        echo '</tr>';
        ?>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($items as $row) :
        ?>
            <tr>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['user_id'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= $row['group_id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td>
                    <div class="d-flex justify-content-start">
                        <button type="button" class="btn btn-danger btn-sm rounded btn-hapus" data-user=<?= $row['user_id'] ?> data-group=<?= $row['group_id'] ?> title="Hapus data">
                            <i class="ti ti-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<script>

    $(".btn-hapus").click(function (e) {
        e.preventDefault();

        var user_id = $(this).data('user');
        var group_id = $(this).data('group');

            Swal.fire({
                title: "Yakin untuk menghapus data ?",
                text: `User : ` + user_id + ` Group : ` + group_id,
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: 'get',
                        url: '<?= site_url('master-data/auth-groups-users/delete-data'); ?>',
                        dataType: 'json',
                        data : {
                            user_id : user_id,
                            group_id : group_id
                        },
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
    })

    $(document).ready(function() {
        new DataTable('#example', {
            responsive: true
        });
    })
</script>