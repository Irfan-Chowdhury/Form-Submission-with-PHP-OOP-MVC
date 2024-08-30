(function($) {
    "use strict";

    $("#submitForm").on("submit",function(e){
        e.preventDefault();
        $('#submitButton').text('Submitting...');
        $.post({
            url: '/orders',
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            dataType: "json",
            error: function(response) {
                console.log(response);
                let htmlContent = prepareMessage(response);
                displayErrorMessage(htmlContent);
                $('#submitButton').text('Submit');
            },
            success: function (response) {
                console.log(response);
                displaySuccessMessage(response.message);
                $('#submitForm')[0].reset();
                $('#submitButton').text('Submit');
            }
        });
    });
})(jQuery);