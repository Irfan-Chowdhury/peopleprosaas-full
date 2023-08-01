(function ($) {
    "use strict";

    $(document).ready(function() {
        $("#updateForm").on("submit",function(e){
            e.preventDefault();
            let languageId = $('#languageId').val();
            $('#updateButton').text('Updating...');
            $.post({
                url: updateURL + languageId,
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                error: function(response) {
                    console.log(response);

                    let html = '<div class="alert alert-danger">';
                    if(response.responseJSON.errorMsg) {
                        html += '<p>' + response.responseJSON.errorMsg + '</p>';
                    }else {
                        let dataValues = Object.values(response.responseJSON.errors);
                        for (let count = 0; count < dataValues.length; count++) {
                            html += '<p>' + dataValues[count] + '</p>';
                        }
                    }
                    html += '</div>';

                    $('#displayErrorMessageEdit').fadeIn("slow");
                    $('#displayErrorMessageEdit').html(html);
                    setTimeout(function() {
                        $('#displayErrorMessageEdit').fadeOut("slow");
                    }, 3000);
                    $('#updateButton').text('Update');
                },
                success: function (response) {
                    console.log(response);
                    // Swal.fire('Any fool can use a computer');

                    $('#dataListTable').DataTable().ajax.reload();
                    $('#updateForm')[0].reset();
                    $("#editModal").modal('hide');
                    $('#generalResult').fadeIn("slow");
                    $('#generalResult').addClass('alert alert-success').html(response.success);
                    setTimeout(function() {
                        $('#generalResult').fadeOut("slow");
                    }, 3000);
                    $('#updateButton').text('Update');
                }
            });
        });
    });

})(jQuery);
