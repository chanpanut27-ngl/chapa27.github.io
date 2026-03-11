<?= $this->extend('Backend/Modul/Pelayanan/Lab/index'); ?>

<?= $this->section('content_menu'); ?>
<div class="card">
    <div class="card-header p-2">
        <div class="d-flex justify-content-end align-items-center gap-1">
            <button type="button" class="btn btn-success btn-sm rounded btn-refresh-data">
                <i class="ti ti-refresh"></i>
            </button>
            <button class="btn btn-info d-none rounded btn-sm" onclick="btnPrint();" title="Lihat">
                <i class="ti ti-printer"></i>
            </button>
            <button class="btn btn-info rounded btn-sm btnPrint" data-id="<?= $kode_pengantar ?>" onclick="openWin();" title="Cetak">
                <i class="ti ti-printer"></i>
            </button>
        </div>
    </div>
    <div class="view-data"></div>
</div>
<?= $this->endSection(); ?>
<?= $this->section('bottomAssets'); ?>
<script src="<?= base_url('assets/js/custom.js'); ?>"></script>
<script>
     function listData() {
        $.ajax({
            type: "GET",
            url: "<?= site_url('pelayanan/pengantar-lab/resume/list-data'); ?>",
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.view-data').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.view-data').removeAttr('span');
            },
            data: {kode_pengantar:'<?= $kode_pengantar ?>'},
            success: function(response) {
                $(".view-data").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }
    $(document).ready(function () {
        listData();    
    })
</script>
<script>
    function btnPrint() {
        var WinPrint = window.open('<?= base_url('cetak-pdf/resume/'.strtolower($kode_pengantar)) ?>', '', 'left=0,top=0,width=1500,height=1000,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }

    function openWin() {
        var WinPrint = window.open('<?= base_url('cetak/resume/'.strtolower($kode_pengantar)) ?>', '', 'left=0,top=0,width=1500,height=1000,toolbar=0,scrollbars=0,status=0');
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>
<?= $this->endSection(); ?>
