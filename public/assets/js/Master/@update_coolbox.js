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
                    
                        if (error.id_instansi) {
                            $("#id-instansi").addClass('is-invalid');
                            $('.errorAsalInstansi').html(error.id_instansi);
                        } else {
                            $('#id-instansi').removeClass('is-invalid');
                            $('.errorAsalInstansi').html('');
                        }
                        if (error.keterangan) {
                            $("#keterangan").addClass('is-invalid');
                            $('.errorKeterangan').html(error.keterangan);
                        } else {
                            $('#keterangan').removeClass('is-invalid');
                            $('.errorKeterangan').html('');
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