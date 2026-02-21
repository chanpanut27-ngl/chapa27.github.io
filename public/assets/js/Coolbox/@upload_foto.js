$(document).ready(function() {
    $(".btn-upload").click(function(e) {
        e.preventDefault();
        
        let form = $('.form-upload')[0];
        let data = new FormData(form);

        // let keteranganInput = document.getElementById('keterangan');
        $.ajax({
            type: "post",
            url: $('.form-upload').attr('action'),
            data: data,
            dataType: 'json',
            processData: false,
            contentType: false,
            cache: false,
            beforeSend: function() {
                $('.btn-upload').attr('disable', 'disabled');
                $('.btn-upload').html('<i class="fa fa-spin fa-spinner"></i>');
            },
            complete: function() {
                $('.btn-upload').removeAttr('disable');
                $('.btn-upload').html('<span class="fa-solid fa-upload"></span> Upload');
            },
            success: function(response) {
                if (response.error) {
                        Swal.fire({
                        title: "Gagal",
                        text: response.status,
                        icon: "error"
                    });
                    $("#exampleModal").modal('hide');
                }else{
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
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + ' ' + xhr.responseText + ' ' + thrownError);
            }
        })
    })
})