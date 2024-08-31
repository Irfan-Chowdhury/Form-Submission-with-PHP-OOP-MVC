(function($) {
    "use strict";


        $("#submitForm").on("submit",function(e){
            e.preventDefault();

            isAlreadySubmission();
            amountValidation($("#submitForm input[name='amount']").val());
            buyerValidation($("#submitForm input[name='buyer']").val());
            receiptIdValidation($("#submitForm input[name='receipt_id']").val());
            buyerEmailValidation($("#submitForm input[name='buyer_email']").val());
            cityValidation($("#submitForm input[name='city']").val());
            phoneValidation($("#submitForm input[name='phone']").val());
            entryByValidation($("#submitForm input[name='entry_by']").val());
            noteValidation($("#submitForm textarea[name='note']").val());

            $('#submitButton').text('Submitting...');
            $.post({
                url: '/store',
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                dataType: "json",
                error: function(response) {
                    let htmlContent = prepareMessage(response);
                    displayErrorMessage(htmlContent);
                    $('#submitButton').text('Submit');
                },
                success: function (response) {
                    displaySuccessMessage(response.message);
                    $('#submitForm')[0].reset();
                    $('#submitButton').text('Submit');
                }
            });
        });
    
    
    $(document).on('click', '#add-invoice-item', function(){
        var item_id = parseInt($('#item-list .item:last').attr('id'))+1;
        let html =
        `<div id="item-list">
            <div id="${item_id}" class="item row">
                <div class="col-md-11">
                    <label>Items</label> <span class="text-danger">*</span>
                    <input type="text" name="items[]" class="form-control" placeholder="Enter Items">
                </div>
                <div class="col-md-1">
                    </br>
                    <button type="button" class="mt-2 btn icon-btn btn-danger btn-sm remove-invoice-item" data-repeater-delete=""> <span class="fa fa-trash"></span></button>
                </div>
            </div>
        </div>
        `;
        $('#item-list').append(html);
    });


    $(document).on('click', '.remove-invoice-item', function(){        
        let item_id = $(this).parent().parent().attr('id');
        $('#'+item_id).remove();
    });

    let isAlreadySubmission = () => {
        if (document.cookie.indexOf('form_submitted') !== -1) {
            let errorMessage =  '<p class="text-danger">You have already submitted the form today.</p>';
            displayErrorMessage(errorMessage);
        }
    }

    let amountValidation = value => {
        if (value === '') {
            $('#amountError').text('This field is required.');
        } 
        else if (isNaN(value)) {
            $('#amountError').text('Please enter only numbers.');
        } 
        else {
            $('#amountError').text('');
        }
    }

    let buyerValidation = value => {
        var isValid = /^[a-zA-Z0-9\s]*$/.test(value);

        if (value === '') {
            $('#buyerError').text('This field is required.');
        } 
        else if (value.length > 20) {
            $('#buyerError').text('Not more than 20 characters.');
        } 
        else if (!isValid) {
            $('#buyerError').text('Only letters, numbers, and spaces are allowed.');
        } 
        else {
            $('#buyerError').text('');
        }
    }

    let receiptIdValidation = value => {
        var isValid = /^[a-zA-Z]+$/.test(value);

        if (value === '') {
            $('#receiptIdError').text('This field is required.');
        } 
        else if (!isValid) {
            $('#receiptIdError').text('It must be a word');
        } 
        else {
            $('#receiptIdError').text('');
        }
    }

    let buyerEmailValidation = value => {
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/

        if (value === '') {
            $('#buyerEmailError').text('This field is required.');
        } 
        else if (!emailRegex.test(value)) {
            $('#buyerEmailError').text('It must be a valid email address.');
        } 
        else {
            $('#buyerEmailError').text('');
        }
    }

    let cityValidation = value => {
        var cityRegex = /^[a-zA-Z\s]+$/

        if (value === '') {
            $('#cityError').text('This field is required.');
        } 
        else if (!cityRegex.test(value)) {
            $('#cityError').text('Invalid data. Must be a string');
        } 
        else {
            $('#cityError').text('');
        }
    }

    let phoneValidation = value => {
        let trimmedValue = value.substring(3); // Get part after "880"

        if (value === '') {
            $('#phoneError').text('This field is required.');
        } 
        else if (isNaN(value) || value.trim() === '') {
            $('#phoneError').text('Please enter only numeric digits.');
        } 
        // If the value does not start with "880", prepend "880"
        else if (!value.startsWith('880')) {
            $("#submitForm input[name='phone']").val('880' + value);
            $('#phoneError').text(''); // Clear error if prepend happens
        }
        // Validate if the remaining part is numeric after "880"
        else if (isNaN(trimmedValue) || trimmedValue.trim() === '') {
            $('#phoneError').text('Please enter only numeric digits after 880.');
        }
        else {
            $('#phoneError').text('');
        }
    }

    let entryByValidation = value => {
        if (value === '') {
            $('#entryByError').text('This field is required.');
        } 
        else if (isNaN(value) || value.trim() === '') {
            $('#entryByError').text('Please enter only numbers.');
        } 
        else {
            $('#entryByError').text('');
        }
    }
    
    let noteValidation = value => {
        let wordCount = value.trim().split(/\s+/).length;
        if (value.trim() === '' ) {
            $('#noteError').text('This field is required.');
        } 
        else if (wordCount > 30) {
            $('#noteError').text('Data cannot exceed  more than 30 words.');
        } 
        else {
            $('#noteError').text('');
        }
    }

})(jQuery);