(function ($) {
    "use strict";

    $("#submitForm").on("submit",function(e){
        e.preventDefault();
        $('#submitButton').text('Saving...');
        $.post({
            url: storeURL,
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
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

                $('#displayErrorMessage').fadeIn("slow");
                $('#displayErrorMessage').html(html);
                setTimeout(function() {
                    $('#displayErrorMessage').fadeOut("slow");
                }, 3000);
                $('#submitButton').text('Save');
            },
            success: function (response) {
                console.log(response);
                $('#dataListTable').DataTable().ajax.reload();
                $('#submitForm')[0].reset();
                $("#createModal").modal('hide');
                $('#generalResult').fadeIn("slow");
                $('#generalResult').addClass('alert alert-success').html(response.success);
                setTimeout(function() {
                    $('#generalResult').fadeOut("slow");
                }, 3000);
                $('#submitButton').text('Save');
            }
        });
    });

})(jQuery);
