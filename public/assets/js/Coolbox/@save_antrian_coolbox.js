$(document).ready(function () {

    $(".form-data").submit(function (e) {
        e.preventDefault();

        $.ajax({
            type: "POST",
            url: $(this).attr('action'),
            data: $(this).serialize(),
            dataType: 'json',
            cache: false,
            beforeSend: function() {
                $('.btn-simpan').attr('disable', 'disabled');
                $('.btn-simpan').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            success: function(response) {
                var error = response.error;

                if (error) {
                    
                        if (error.kode_coolbox) {
                            $('#id-coolbox').addClass('is-invalid');
                            $('.errorKodeCoolbox').html(error.kode_coolbox);
                        } else {
                            $('#id-coolbox').removeClass('is-invalid');
                            $('.errorKodeCoolbox').html('');
                        }
                        if (error.tgl_terima_coolbox) {
                            $('#tgl-terima-coolbox').addClass('is-invalid');
                            $('.errorTglTerimaCoolbox').html(error.tgl_terima_coolbox);
                        } else {
                            $('#tgl-terima-coolbox').removeClass('is-invalid');
                            $('.errorTglTerimaCoolbox').html('');
                        }
                        if (error.jam_terima_coolbox) {
                            $('#jam-terima-coolbox').addClass('is-invalid');
                            $('.errorJamTerimaCoolbox').html(error.jam_terima_coolbox);
                        } else {
                            $('#jam-terima-coolbox').removeClass('is-invalid');
                            $('.errorJamTerimaCoolbox').html('');
                        }

                        Swal.fire({
                            title: "Gagal",
                            text: response.error,
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
            complete: function() {
                $('.btn-simpan').removeAttr('disable');
                $('.btn-simpan').html('<span class="fa-solid fa-save"></span> Simpan');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
            }
        })

    })
})