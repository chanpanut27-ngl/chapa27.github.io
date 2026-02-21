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
                    
                        if (error.id_peraturan) {
                            $("#id-peraturan").addClass('is-invalid');
                            $('.errorIdPeraturan').html(error.id_peraturan);
                        } else {
                            $('#id-peraturan').removeClass('is-invalid');
                            $('.errorIdPeraturan').html('');
                        }
                        if (error.jenis_sampel) {
                            $("#jenis-sampel").addClass('is-invalid');
                            $('.errorJenisSampel').html(error.jenis_sampel);
                        } else {
                            $('#jenis-sampel').removeClass('is-invalid');
                            $('.errorJenisSampel').html('');
                        }
                        if (error.pnbp) {
                            $('#pnbp').addClass('is-invalid');
                            $('.errorPnbp').html(error.pnbp);
                        } else {
                            $('#pnbp').removeClass('is-invalid');
                            $('.errorPnbp').html('');
                        }
                        if (error.id_lab) {
                            $('#id-lab').addClass('is-invalid');
                            $('.errorIdLab').html(error.id_lab);
                        } else {
                            $('#id-lab').removeClass('is-invalid');
                            $('.errorIdLab').html('');
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