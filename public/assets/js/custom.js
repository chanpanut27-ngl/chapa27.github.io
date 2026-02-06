$(document).ready(function () {

    $(".btn-refresh").click(function() {
        let currentUrl = document.URL;
        $.ajax({
            cache: false,
            url: currentUrl+'/list-data',
            dataType: 'json',
            beforeSend: function() {
                $('.view-data').html('<span class="fa-solid fa-spin fa-spinner"></span>');
                $('.btn-refresh').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            complete: function() {
                $('.view-data').removeAttr('span');
            },
            success: function(response) 
            {
                $(".view-data").html(response.data);
                $(".btn-refresh").html('<span class="fa-solid fa-refresh"></span>');
            },
            
        })
    })

    $(".btn-refresh-data").click(function() {
        $.ajax({
            cache: false,
            beforeSend: function() {
                $('.btn-refresh-data').html('<span class="fa-solid fa-spin fa-spinner"></span>');
            },
            success: function() {
                listData();
                $('.btn-refresh-data').html('<span class="fa-solid fa-refresh"></span>');
            }
        })
    })
})