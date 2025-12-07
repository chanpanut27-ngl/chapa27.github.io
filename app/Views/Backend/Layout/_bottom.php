<script src="<?= base_url('assets/js/plugins/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/fonts/custom-font.js'); ?>"></script>
<script src="<?= base_url('assets/js/fonts/custom-ant-icon.js'); ?>"></script>
<script src="<?= base_url('assets/js/pcoded.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/feather.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/fontawesome.v6.3.0.all.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-3.7.1.min.js'); ?>"></script>
<script>
     $(".btn-refresh").click(function() {
       
        let currentUrl = document.URL;
        $.ajax({
            cache: false,
            url: currentUrl+'/list-data',
            dataType: 'json',
            beforeSend: function() {
                $(".btn-refresh").html('<span class="fa fa-spin fa-spinner"></span>');
            },
            success: function(response) 
            {
                $(".view-data").html(response.data);
                $(".btn-refresh").html('<span class="fa-solid fa-refresh"></span>');
            },
            
        })
    })
</script>
<!-- [bottomAssets] start -->
<?= $this->renderSection('bottomAssets'); ?>
<!-- [bottomAssets] end -->

</body>
<!-- [Body] end -->
</html>