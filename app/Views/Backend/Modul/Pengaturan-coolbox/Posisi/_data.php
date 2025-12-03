<table id="example" class="table table-hover table-bordered">
    <thead style="font-family: calibri;">
        <?php
        $arrth = ['No', 'Kode coolbox', 'Instansi', 'Status', 'Tgl & Jam', 'Keterangan', 'foto', ''];
        echo '<tr>';
        foreach ($arrth as $th) :
            echo '<th>' . $th . '</th>';
        endforeach;
        echo '</tr>';
        ?>
    </thead>
    <tbody style="font-family: arial;">
    </tbody>
</table>