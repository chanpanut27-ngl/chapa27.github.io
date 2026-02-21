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
                    
                        if (error.id_coolbox) {
                            $('#id-coolbox').addClass('is-invalid');
                            $('.errorIdCoolbox').html(error.id_coolbox);
                        } else {
                            $('#id-coolbox').removeClass('is-invalid');
                            $('.errorIdCoolbox').html('');
                        }
                        if (error.status) {
                            $('#status-coolbox').addClass('is-invalid');
                            $('.errorStatusCoolbox').html(error.status);
                        } else {
                            $('#status-coolbox').removeClass('is-invalid');
                            $('.errorStatusCoolbox').html('');
                        }
                        if (error.tanggal) {
                            $('#tanggal').addClass('is-invalid');
                            $('.errorTanggal').html(error.tanggal);
                        } else {
                            $('#tanggal').removeClass('is-invalid');
                            $('.errorTanggal').html('');
                        }

                        if (error.jam) {
                            $('#jam').addClass('is-invalid');
                            $('.errorJam').html(error.jam);
                        } else {
                            $('#jam').removeClass('is-invalid');
                            $('.errorJam').html('');
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