

(function($) {

	"use strict";

	$(".role-chooser").click(function (e) {
        e.preventDefault();
        let elm = $(this);
        let role = elm.data('role');

        $(".role-chooser").removeClass('active');

        elm.addClass('active');
        $("[name='role']").val(role);
    });

    $("#loginForm").validate({
        rules: {
            password: {
                required: true,
                minlength: 8
            },
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 8 characters long"
            },
            email: "Please enter a valid email address",
        },
        errorElement : 'label',
        errorLabelContainer: '.error'
    });

    $("#submitBtn").click(function (e) {
        let elm = $(this);
        let text = elm.html();
        if ($("#loginForm").valid()) {
            elm.prop('disabled', true);
            elm.html('Please Wait... <div class="spinner-border spinner-border-sm text-light" role="status"></div>');
            $("#loginForm").submit();
        } else {
            elm.prop('disabled', false);
            elm.html(text);
        }
    });

})(window.jQuery);


