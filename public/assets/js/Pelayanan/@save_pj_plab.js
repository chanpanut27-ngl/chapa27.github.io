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
                    
                        if (error.nama_pjb) {
                            $('#nama-petugas').addClass('is-invalid');
                            $('.errorNamaPetugas').html(error.nama_pjb);
                        } else {
                            $('#nama-petugas').removeClass('is-invalid');
                            $('.errorNamaPetugas').html('');
                        }

                        if (error.tgl_terima_sampel) {
                            $('#tgl-terima-sampel').addClass('is-invalid');
                            $('.errorTglTerimaSampel').html(error.tgl_terima_sampel);
                        } else {
                            $('#tgl-terima-sampel').removeClass('is-invalid');
                            $('.errorTglTerimaSampel').html('');
                        } 

                        if (error.penerima_sampel) {
                            $('#penerima-sampel').addClass('is-invalid');
                            $('.errorPenerimaSampel').html(error.penerima_sampel);
                        } else {
                            $('#penerima-sampel').removeClass('is-invalid');
                            $('.errorPenerimaSampel').html('');
                        } 

                        if (error.jam_terima_sampel) {
                            $('#jam-terima-sampel').addClass('is-invalid');
                            $('.errorJamTerimaSampel').html(error.jam_terima_sampel);
                        } else {
                            $('#jam-terima-sampel').removeClass('is-invalid');
                            $('.errorJamTerimaSampel').html('');
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
                $('.btn-simpan').html('<i class="ti ti-device-floppy"></i> Simpan');
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
            }
        })

    })
})