

(function($) {

	"use strict";

    var mobilePhone = document.querySelector("#mobile_no");
    var iti = window.intlTelInput(mobilePhone, {
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "us";
                callback(countryCode);
            });
        },
        utilsScript: "/js/intlTelInputUtils.js" // just for formatting/placeholders etc
    });

    $(document).on('click', '.iti__flag-container', function() {
        var countryCode = $('.iti__selected-flag').attr('title');
        var countryCode = countryCode.replace(/[^0-9]/g,'')
        $('#mobile_no').val("");
        $('#mobile_no').val("+"+countryCode+" "+ $('#mobile_no').val());
    });


	$(".role-chooser").click(function (e) {
        e.preventDefault();
        let elm = $(this);
        let role = elm.data('role');

        $(".role-chooser").removeClass('active');

        elm.addClass('active');
        $("[name='role']").val(role);
    });

    $.validator.addMethod( "checkNumber", function( value, element, param ) {
        // TODO: Change to API check
            return (iti.isValidNumber());

    }, "Phone number is incorrect or invalid." );

    $("#registerForm").validate({
        rules: {
            first_name: "required",
            last_name: "required",
            password: {
                required: true,
                minlength: 8
            },
            password_confirmation: {
                required: true,
                minlength: 8,
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
            mobile_no: {
                required: true,
                checkNumber: true
            },
        },
        messages: {
            first_name: "Please enter your firstname",
            last_name: "Please enter your lastname",
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            },
            password_confirmation: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long",
                equalTo: "Please enter the same password as above"
            },
            email: "Please enter a valid email address",
            mobile_no: {
                required: "Please provide a mobile no",
            },
        },
        errorElement : 'label',
        errorLabelContainer: '.error'
    });

    $("#submitBtn").click(function (e) {
        let elm = $(this);
        let text = elm.html();
        if ($("#registerForm").valid()) {
            elm.prop('disabled', true);
            elm.html('Please Wait... <div class="spinner-border spinner-border-sm text-light" role="status"></div>');
            $("#registerForm").submit();
        } else {
            elm.prop('disabled', false);
            elm.html(text);
        }
    });

})(window.jQuery);


