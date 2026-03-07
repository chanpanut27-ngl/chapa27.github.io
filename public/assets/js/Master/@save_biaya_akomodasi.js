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
                    
                        if (error.uraian) {
                            $("#uraian").addClass('is-invalid');
                            $('.errorUraian').html(error.uraian);
                        } else {
                            $('#uraian').removeClass('is-invalid');
                            $('.errorUraian').html('');
                        }

                        if (error.transport) {
                            $("#transport").addClass('is-invalid');
                            $('.errorTransport').html(error.transport);
                        } else {
                            $('#transport').removeClass('is-invalid');
                            $('.errorTransport').html('');
                        }
                        
                        if (error.uang_harian) {
                            $("#uang-harian").addClass('is-invalid');
                            $('.errorUangHarian').html(error.uang_harian);
                        } else {
                            $('#uang-harian').removeClass('is-invalid');
                            $('.errorUangHarian').html('');
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