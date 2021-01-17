// Variable to hold request
var request;

// Bind to the submit event of our form
$("#contact-form").submit(function(event){

    // Prevent default posting of form - put here to work in case of errors
    event.preventDefault();

    // Abort any pending request
    if (request) {
        request.abort();
    }
    // setup some local variables
    var $form = $(this);

    // Let's select and cache all the fields
    var $inputs = $form.find("input, select, button, textarea");

    // Serialize the data in the form
    var serializedData = $form.serialize();

    // Let's disable the inputs for the duration of the Ajax request.
    // Note: we disable elements AFTER the form data has been serialized.
    // Disabled form elements will not be serialized.
    $inputs.prop("disabled", true);

    // Fire off the request to /form.php
    request = $.ajax({
        url: "./mail/mail.php",
        type: "post",
        data: serializedData
    });

    // Callback handler that will be called on success
    request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        let data = JSON.parse( response );
        if( 'validation_error' === data.status ) {
            $.each(data.errors, function(index, value){
                $('#' + value ).css({border: "1px solid red"}); 
            });
        }
        else if ( 'error' == data.status ) {
            $('#form-messages').append(`<p  class='col' style='color:red'>${data.errorMsg}</p>`);
        }
        else if ( 'success' == data.status ) {
            $('#form-messages').append(`<p  class='col' style='color:green'>${data.message}</p>`);
        }
    });

    // Callback handler that will be called on failure
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        console.error(
            "The following error occurred: "+
            textStatus, errorThrown
        );
    });

    // Callback handler that will be called regardless
    // if the request failed or succeeded
    request.always(function () {
        // Reenable the inputs
        $inputs.prop("disabled", false);
    });

});