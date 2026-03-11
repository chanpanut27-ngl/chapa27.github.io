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
            complete: function() {
                $('.btn-simpan').removeAttr('disable');
                $('.btn-simpan').html('<i class="ti ti-device-floppy"></i> Simpan');
            },
            success: function(response) {

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
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError + "\n" + ajaxOptions);
            }
        })

    })
})