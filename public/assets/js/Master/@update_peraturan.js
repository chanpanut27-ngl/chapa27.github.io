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
                $('.btn-ubah').attr('disable', 'disabled');
                $('.btn-ubah').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            success: function(response) {
                var error = response.error;

                if (error) {
                    
                        if (error.nama_instansi) {
                            $('#nama-instansi').addClass('is-invalid');
                            $('.errorNamaInstansi').html(error.nama_instansi);
                        } else {
                            $('#nama-instansi').removeClass('is-invalid');
                            $('.errorNamaInstansi').html('');
                        }

                        if (error.alamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.errorAlamat').html(error.alamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('.errorAlamat').html('');
                        }

                        if (error.no_telp) {
                            $('#no-telp').addClass('is-invalid');
                            $('.errorNoTelp').html(error.no_telp);
                        } else {
                            $('#no-telp').removeClass('is-invalid');
                            $('.errorNoTelp').html('');
                        }
                        
                        if (error.wilayah) {
                            $('#wilayah').addClass('is-invalid');
                            $('.errorWilayah').html(error.wilayah);
                        } else {
                            $('#wilayah').removeClass('is-invalid');
                            $('.errorWilayah').html('');
                        }

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
                $('.btn-ubah').removeAttr('disable');
                $('.btn-ubah').html('<span class="fa-solid fa-edit"></span> Ubah');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
            }
        })

    })
})