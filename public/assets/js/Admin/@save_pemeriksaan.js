$(document).ready(function () {
 
     $(".form-data").submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "post",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-simpan').attr('disable', 'disabled');
                $('.btn-simpan').html('<i class="fa fa-spin fa-spinner"></i>');
                $('.invalid-feedback').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btn-simpan').removeAttr('disable');
                $('.btn-simpan').html('<i class="fas fa-save"></i> Simpan');
            },
            success: function(response) {
                var error = response.error;

                if (error) {
                    
                    if (error.jumlah_sampel) {
                        $('#jumlah-sampel').addClass('is-invalid');
                        $('.errorJumlahSampel').html(error.jumlah_sampel);
                    } else {
                        $('#jumlah-sampel').removeClass('is-invalid');
                        $('.errorJumlahSampel').html('');
                    }
                    if (error.id_lab) {
                        $('#id-lab').addClass('is-invalid');
                        $('.errorIdLab').html(error.id_lab);
                    } else {
                        $('#id-lab').removeClass('is-invalid');
                        $('.errorIdLab').html('');
                    }
                    if (error.id_jenis_sampel) {
                        $('#id-jenis-sampel').addClass('is-invalid');
                        $('.errorIdJenisSampel').html(error.id_jenis_sampel);
                    } else {
                        $('#id-jenis-sampel').removeClass('is-invalid');
                        $('.errorIdJenisSampel').html('');
                    }

                    Swal.fire({
                            title: "Gagal",
                            text: response.errorMessage,
                            icon: "error",
                            timer: 2000,
                            width: '400px',
                            padding: '1em'
                        }).then((result) => {
                            if (result.dismiss === Swal.DismissReason.timer) {
                                listData();
                            }
                        });

                } else {
                    Swal.fire({
                        title: "Berhasil",
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

                    $("#exampleModal").modal('hide');
                    listData();
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    })
})