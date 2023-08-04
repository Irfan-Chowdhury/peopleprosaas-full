(function ($) {
    "use strict";

    $(document).ready(function() {
        $("#updateForm").on("submit",function(e){
            e.preventDefault();
            let modelId = $('#modelId').val();
            $('#updateButton').text('Updating...');
            $.post({
                url: updateURL + modelId,
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                error: function(response) {
                    console.log(response);
                    let htmlContent = prepareMessage(response);
                    displayErrorMessage(htmlContent);
                    $('#updateButton').text('Update');
                },
                success: function (response) {
                    console.log(response);
                    displaySuccessMessage(response.success);
                    $('#dataListTable').DataTable().ajax.reload();
                    $('#updateForm')[0].reset();
                    $("#editModal").modal('hide');
                    $('#updateButton').text('Update');
                }
            });
        });
    });
})(jQuery);





//'<div class="alert alert-danger">';
// let htmlContent = '';
// if(response.responseJSON.errorMsg) {
//     htmlContent += '<p class="text-danger">' + response.responseJSON.errorMsg + '</p>';
// }else {
//     let dataValues = Object.values(response.responseJSON.errors);
//     for (let count = 0; count < dataValues.length; count++) {
//         htmlContent += '<p class="text-danger">' + dataValues[count] + '</p>';
//     }
// }
// htmlContent += '</div>';


// $('#displayErrorMessageEdit').fadeIn("slow");
// $('#displayErrorMessageEdit').html(htmlContent);
// setTimeout(function() {
//     $('#displayErrorMessageEdit').fadeOut("slow");
// }, 3000);



// $('#generalResult').fadeIn("slow");
// $('#generalResult').addClass('alert alert-success').html(response.success);
// setTimeout(function() {
//     $('#generalResult').fadeOut("slow");
// }, 3000);
