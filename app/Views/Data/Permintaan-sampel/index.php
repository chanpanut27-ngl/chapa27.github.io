<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel"><i class="ti ti-clipboard-list"></i> <?= $title; ?></h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="view-periksa-sampel"></div>
            </div>
        </div>
    </div>
</div>
<div class="view-modals" style="display: none;"></div>

<script>

    function listData() {
        $.ajax({
            type: 'get',
            url: '<?= site_url('pelanggan/permintaan-pemeriksaan/periksa-sampel'); ?>',
            dataType: 'json',
            cache: false,
            data: {id_pelanggan:'<?= $id_pelanggan ?>'},
            beforeSend: function() {
                $('.view-periksa-sampel').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.view-periksa-sampel').removeAttr('span');
            },
            success: function(response) {
                $(".view-periksa-sampel").html(response.data);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    }
    $(document).ready(function() {
        listData();
    })
</script>