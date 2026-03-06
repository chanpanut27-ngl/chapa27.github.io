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
                    
                        if (error.kode_lab) {
                            $('#kode-lab').addClass('is-invalid');
                            $('.errorKodeLab').html(error.kode_lab);
                        } else {
                            $('#kode-lab').removeClass('is-invalid');
                            $('.errorKodeLab').html('');
                        }
                        if (error.nama_lab) {
                            $('#nama-lab').addClass('is-invalid');
                            $('.errorNamaLab').html(error.nama_lab);
                        } else {
                            $('#nama-lab').removeClass('is-invalid');
                            $('.errorNamaLab').html('');
                        }
                        if (error.lantai) {
                            $('#lantai').addClass('is-invalid');
                            $('.errorLantai').html(error.lantai);
                        } else {
                            $('#lantai').removeClass('is-invalid');
                            $('.errorLantai').html('');
                        }
                        if (error.id_kat_lab) {
                            $('#kategori').addClass('is-invalid');
                            $('.errorKategori').html(error.id_kat_lab);
                        } else {
                            $('#kategori').removeClass('is-invalid');
                            $('.errorKategori').html('');
                        }
                        if (error.kode_instalasi) {
                            $('#kode-instalasi').addClass('is-invalid');
                            $('.errorKodeInstalasi').html(error.kode_instalasi);
                        } else {
                            $('#kode-instalasi').removeClass('is-invalid');
                            $('.errorKodeInstalasi').html('');
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
                $('.btn-ubah').removeAttr('disable');
                $('.btn-ubah').html('<i class="ti ti-edit-circle"></i> Ubah');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
            }
        })

    })
})