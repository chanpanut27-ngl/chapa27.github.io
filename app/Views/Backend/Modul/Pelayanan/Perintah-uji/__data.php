<table id="example" class="table table-hover table-bordered">
    <thead>
        <?php
        use App\Models\PerintahUjiSampelModel;
        $arrth = ['No', 'Kode Pengantar', 'Instalasi', 'Tanggal', ''];
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
        $pus = new PerintahUjiSampelModel();
        foreach ($items as $row) :  
        $fpush = $pus->where('kode_pengantar', $row['kode_pengantar'])
        ->where('id_instalasi', $row['id_instalasi'])->first();
        ?>
        <input type="hidden" id="kp" value="<?= $row['kode_pengantar'] ?>">
            <tr id="myId-<?= $row['id_instalasi']; ?>" data-urut=<?= $no; ?>>
                <td><b><?= $no++; ?></b></td>
                <td><?= $row['kode_pengantar']; ?></td>
                <td><?= $row['nama_instalasi']; ?></td>
                <td><?= date('d/m/Y', strtotime($row['tanggal'])) ?></td>
                <td>
                    <div class="d-flex justify-content-start gap-1">
                       <!-- Button trigger modal -->
                        <?php
                        if ($fpush) {
                            ?>
                            <button type="button" class="btn btn-warning btn-sm rounded btn-edit" data-kode="<?= $row['kode_pengantar'];?>" data-katlab="<?= $row['id_kat_lab'];?>" data-id="<?= $row['id_instalasi']; ?>">
                                <span class="pc-micon"><i class="ti ti-edit"></i></span>
                            </button>
                            <button class="btn btn-info rounded btn-sm" onclick="return clickBtn('<?= strtolower($row['kode_pengantar']).'-'.$row['id_kat_lab'].'-'.$row['id_instalasi'] ?>')" title="Lihat">
                                <span class="pc-micon"><i class="ti ti-clipboard"></i></span>
                            </button>
                            <button type="button" class="btn btn-danger btn-sm rounded btn-delete" data-kode="<?= $row['kode_pengantar'];?>" data-instalasi="<?= $row['id_instalasi'];?>" data-id="<?= $row['id_instalasi']; ?>">
                                <span class="pc-micon"><i class="ti ti-trash"></i></span>
                            </button>
                            <?php
                        } else {
                            ?>
                            <button type="button" class="btn btn-primary btn-sm rounded btn-tambah" data-kode="<?= $row['kode_pengantar'];?>" data-katlab="<?= $row['id_kat_lab'];?>" data-id="<?= $row['id_instalasi']; ?>">
                                <span class="pc-micon"><i class="ti ti-square-plus"></i></span>
                            </button>
                            <?php
                        }
                        ?>
                    </div>
                </td>              
                
            </tr>
        <?php endforeach;?>
    </tbody>
</table>
<script>
    function clickBtn(id) {
        var urls = 'cetak/perintah-uji/'+id;
        var WinPrint = window.open('<?= site_url() ?>'+urls, '', 'left=0,top=0,width=1500,height=1000,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
    
    $(".btnPrint").click(function () {
        var kode_pengantar = $(this).data('kode');
        var id_kat_lab = $(this).data('katlab');
        var id_instalasi = $(this).data("id");

        var urls = 'cetak/perintah-uji/'+kode_pengantar+'-'+id_kat_lab+'-'+id_instalasi;
        var WinPrint = window.open('<?= site_url() ?>'+urls, '', 'left=0,top=0,width=1500,height=1000,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    })



    $(".btn-delete").click(function(e) {
        e.preventDefault();
      
        var kode_pengantar = $(this).data('kode');
        var id_instalasi = $(this).data('instalasi');

       var myElement = $('#myId-' + id_instalasi);
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
                    type: 'get',
                    url: '<?= site_url('pelayanan/perintah-uji-sampel/delete-data/'); ?>',
                    dataType: 'json',
                    data: {
                        kode_pengantar:kode_pengantar,
                        id_instalasi:id_instalasi
                    },
                    success: function(response) {
                        if (response.error) {
                            Swal.fire({
                                title: "Gagal!",
                                text: response.error,
                                icon: "error"
                            });
                            myElement.removeClass('bg bg-danger');
                        } else {
                            Swal.fire({
                                title: "Hapus Data !",
                                text: response.sukses,
                                icon: "success"
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

    $(".btn-tambah").click(function(e) {
        e.preventDefault();
        var id_instalasi = $(this).data("id");
        var kode_pengantar = $(this).data('kode');
        var id_kat_lab = $(this).data('katlab');

        $.ajax({
            type: "get",
            url: "<?= site_url('pelayanan/perintah-uji-sampel/add-data'); ?>",
            dataType: 'json',
            cache: false,
            data:{
                 id_instalasi:id_instalasi,
                 id_kat_lab:id_kat_lab,
                 kode_pengantar:kode_pengantar
            },
            beforeSend: function() {
                $('.btn-tambah').attr('disable', 'disabled');
                $('.btn-tambah').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.btn-tambah').removeAttr('disable');
                $('.btn-tambah').html('<span class="fa-solid fa-plus-circle"></span>');
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

    $(".btn-edit").click(function(e) {
        e.preventDefault();
        var id_instalasi = $(this).data("id");
        var kode_pengantar = $(this).data('kode');
        var id_kat_lab = $(this).data('katlab');

        $.ajax({
            type: "get",
            url: "<?= site_url('pelayanan/perintah-uji-sampel/edit-data'); ?>",
            dataType: 'json',
            cache: false,
            data:{
                 id_instalasi:id_instalasi,
                 id_kat_lab:id_kat_lab,
                 kode_pengantar:kode_pengantar
            },
            beforeSend: function() {
                $('.btn-edit').attr('disable', 'disabled');
                $('.btn-edit').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                $('.invalid-feedback').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.btn-edit').removeAttr('disable');
                $('.btn-edit').html('<span class="fa-solid fa-edit"></span>');
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
    
    $(document).ready(function() {
        new DataTable('#example', {
            responsive: true
        });
    })
</script>