(function ($) {
    "use strict";

    $(document).on("click",".delete",function(e){
        e.preventDefault();
        let languageId = $(this).data("id");
        // return console.log(destroyURL + languageId);

        if (!confirm('Are you sure you want to continue?')) {
            alert(false);
        }else{
            $.get({
                url: destroyURL + languageId,
                error: function(response) {
                    console.log(response);

                    let html = '<div class="alert alert-danger">';
                    if(response.responseJSON.exceptionMsg) {
                        html += '<p>' + response.responseJSON.exceptionMsg + '</p>';
                    }else {
                        let dataValues = Object.values(response.responseJSON.errors);
                        for (let count = 0; count < dataValues.length; count++) {
                            html += '<p>' + dataValues[count] + '</p>';
                        }
                    }
                    html += '</div>';
                    $('#generalResult').fadeIn("slow");
                    $('#generalResult').html(html);
                    setTimeout(function() {
                        $('#generalResult').fadeOut("slow");
                    }, 3000);
                },
                success: function (response) {
                    console.log(response);
                    $('#dataListTable').DataTable().ajax.reload();
                    $('#generalResult').fadeIn("slow");
                    $('#generalResult').addClass('alert alert-success').html(response.success);
                    setTimeout(function() {
                        $('#generalResult').fadeOut("slow");
                    }, 3000);
                }
            });
        }
    });

})(jQuery);
