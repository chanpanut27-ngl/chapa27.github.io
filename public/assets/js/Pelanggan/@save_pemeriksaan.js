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

                        if (error.jumlah_sampel) {
                            $('#jumlah-sampel').addClass('is-invalid');
                            $('.errorJumlahSampel').html(error.jumlah_sampel);
                        } else {
                            $('#jumlah-sampel').removeClass('is-invalid');
                            $('.errorJumlahSampel').html('');
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