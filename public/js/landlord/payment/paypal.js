$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

// Render the PayPal button into #paypal-button-container
paypal_sdk.Buttons({
    // Call your server to set up the transaction
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{
                amount: {
                    // value: ('input[name="total_amount"]').val(),
                    value: 1,
                    currency_code: "USD",
                }
            }]
        });
    },

    // Call your server to finalize the transaction
    onApprove: function(data, actions) {
        return actions.order.capture().then(function(details) {
            console.log(details);
            if (details.status=="COMPLETED") {
                $.post({
                    url: targetURL,
                    data: $('#paypalPaymentForm').serialize(),
                    success: function (response) {
                        console.log(response);
                        if (response.errors) {
                            console.log(response);
                            let html = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            ${response.errors}
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>`;
                            $('#errorMessage').html(html);
                        }else if(response.success){
                            window.location.href = redirectURL;
                        }
                    }
                });
            }
        });
    }
}).render('#paypal-button-container');

$("#payCancelBtn").click(function(e){
    e.preventDefault();

    if (confirm('Are you sure to cancel ?')) {
        window.history.back();
        // $.ajax({
        //     url: cancelURL,
        //     type: 'POST',
        //     data: {},
        //     dataType: 'JSON',
        //     success: function (data) {
        //         window.location.href = redirectURLAfterCancel;
        //     }
        // });
    }
});
