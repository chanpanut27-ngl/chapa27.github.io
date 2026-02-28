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
                    
                        if (error.nama_pengirim) {
                            $('#nama-pengirim').addClass('is-invalid');
                            $('.errorNamaPengirim').html(error.nama_pengirim);
                        } else {
                            $('#nama-pengirim').removeClass('is-invalid');
                            $('.errorNamaPengirim').html('');
                        }

                        if (error.no_telp_pengirim) {
                            $('#no-telp-pengirim').addClass('is-invalid');
                            $('.errorTelpPengirim').html(error.no_telp_pengirim);
                        } else {
                            $('#no-telp-pengirim').removeClass('is-invalid');
                            $('.errorTelpPengirim').html('');
                        }

                        if (error.tanggal) {
                            $('#tanggal').addClass('is-invalid');
                            $('.errorTanggal').html(error.tanggal);
                        } else {
                            $('#tanggal').removeClass('is-invalid');
                            $('.errorTanggal').html('');
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
                $('.btn-simpan').removeAttr('disable');
                $('.btn-simpan').html('<span class="fa-solid fa-save"></span> Simpan');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
            }
        })

    })
})