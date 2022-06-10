const form = document.getElementById('editProfile');

var validator = FormValidation.formValidation(
    form,
    {
        fields: {
            'first_name': {
                validators: {
                    notEmpty: {
                        message: 'First name is required'
                    }
                }
            },
            'last_name': {
                validators: {
                    notEmpty: {
                        message: 'Last name is required'
                    }
                }
            },
            'dob': {
                validators: {
                    notEmpty: {
                        message: 'Date of birth is required'
                    }
                }
            },
            'gender': {
                validators: {
                    notEmpty: {
                        message: 'Please select gender'
                    }
                }
            },
            'country': {
                validators: {
                    notEmpty: {
                        message: 'Please select country'
                    }
                }
            },
            'address': {
                validators: {
                    notEmpty: {
                        message: 'Address is required'
                    }
                }
            },
            'city': {
                validators: {
                    notEmpty: {
                        message: 'City is required'
                    }
                }
            },
            'zip_code': {
                validators: {
                    notEmpty: {
                        message: 'Zip/Postal Code is required'
                    }
                }
            },
            'hotel_id': {
                validators: {
                    notEmpty: {
                        message: 'Please select hotel'
                    }
                }
            },
            'resturant_name': {
                validators: {
                    notEmpty: {
                        message: 'Resturant name is required'
                    }
                }
            },
            'resturant_address': {
                validators: {
                    notEmpty: {
                        message: 'Resturant address is required'
                    }
                }
            },
            'resturant_trade_license': {
                validators: {
                    notEmpty: {
                        message: 'Resturant trade license is required'
                    }
                }
            },
            'no_of_dept': {
                validators: {
                    notEmpty: {
                        message: 'No of departments are required'
                    }
                }
            },
        },

        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: '.fv-row',
                eleInvalidClass: '',
                eleValidClass: ''
            })
        }
    }
);

function validateBtn() {
    let firstName = $("[name='first_name']");
    let lastName = $("[name='last_name']");
    let dob = $("[name='dob']");
    let gender = $("[name='gender'] option:selected");
    let country = $("[name='country'] option:selected");
    let address = $("[name='address']");
    let city = $("[name='city']");
    let zip_code = $("[name='zip_code']");

    let hotel = $("[name='hotel_id'] option:selected");
    let resturant_name = $("[name='resturant_name']");
    let resturant_address = $("[name='resturant_address']");
    let resturant_trade_license = $("[name='resturant_trade_license']");
    let no_of_dept = $("[name='no_of_dept']");

    if (firstName.val().length > 0 && lastName.val().length > 0 && dob.val().length > 0 && gender.val().length > 0 && country.val().length > 0 && address.val().length && city.val().length > 0 && zip_code.val().length > 0 && hotel.val().length > 0 && resturant_name.val().length > 0 && resturant_address.val().length > 0 && resturant_trade_license.val().length > 0 && no_of_dept.val().length > 0) {
        $("#editProfileBtn").prop('disabled', false);
    } else {
        $("#editProfileBtn").prop('disabled', true);
    }
}

(function($) {
    initDatePicker('#dob');

    $("[name='no_of_dept']").blur(function (e) {
        let elm = $(this);

        if (elm.val().length == 0) {
            elm.val('0');
        }
    });

    $(".resturant-depts").change(function (e) {
        e.preventDefault();
        let elm = $(this);
        if (elm.is(":checked")) {
            elm.closest('.row').find('.hourly-rate').show();
        } else {
            elm.closest('.row').find('.hourly-rate input').val('');
            elm.closest('.row').find('.hourly-rate').hide();
        }

        $("[name='no_of_dept']").val($(".resturant-depts:checked").length);
    });

})(jQuery);

const submitButton = document.getElementById('editProfileBtn');

submitButton.addEventListener('click', function (e) {
    // Prevent default button action
    e.preventDefault();

    // Validate form before submit
    if (validator) {
        validator.validate().then(function (status) {
            if (status == 'Valid') {
                // Show loading indication
                submitButton.setAttribute('data-kt-indicator', 'on');

                // Disable button to avoid multiple click
                submitButton.disabled = true;

                form.submit();
            }
        });
    }
});
