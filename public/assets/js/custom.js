$(document).ready(function () {
  layout_change('light');
  change_box_container('false');
  layout_rtl_change('false');
  preset_change('preset-1');
  font_change('Public-Sans');

    $(".btn-refresh").click(function() {
        let currentUrl = document.URL;
        $.ajax({
            cache: false,
            url: currentUrl+'/list-data',
            dataType: 'json',
            beforeSend: function() {
                $(".btn-refresh").html('<span class="fa fa-spin fa-spinner"></span>');
            },
            success: function(response) 
            {
                $(".view-data").html(response.data);
                $(".btn-refresh").html('<span class="fa-solid fa-refresh"></span>');
            },
            
        })
    })


})