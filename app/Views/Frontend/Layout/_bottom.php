<script src="<?= base_url('assets/js/plugins/popper.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/simplebar.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/bootstrap.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/fonts/custom-font.js'); ?>"></script>
<script src="<?= base_url('assets/js/fonts/custom-ant-icon.js'); ?>"></script>
<script src="<?= base_url('assets/js/pcoded.js'); ?>"></script>
<script src="<?= base_url('assets/js/plugins/feather.min.js'); ?>"></script>
<script src="<?= base_url('assets/js/fontawesome.v6.3.0.all.js'); ?>"></script>
<script src="<?= base_url('assets/js/jquery-3.7.1.js'); ?>"></script>
<script>
    $(document).ready(function () {
        const search = $(".dt-search #dt-search");
        const place = search.setAttribute('placeholder');
        place.val('xx');
    })
</script>
<!-- [bottomAssets] start -->
<?= $this->renderSection('bottomAssets'); ?>
<!-- [bottomAssets] end -->

</body>
<!-- [Body] end -->
</html>