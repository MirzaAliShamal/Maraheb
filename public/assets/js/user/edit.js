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
            }
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
    let specialise = $("[name='specialise[]'] option:selected");

    if (firstName.val().length > 0 && lastName.val().length > 0 && dob.val().length > 0 && gender.val().length > 0 && country.val().length > 0 && address.val().length && city.val().length > 0 && zip_code.val().length > 0 && specialise.length > 0) {
        $("#editProfileBtn").prop('disabled', false);
    } else {
        $("#editProfileBtn").prop('disabled', true);
    }
}

(function($) {
    initDatePicker('#dob');

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

var slider = document.querySelector("#experience_slider");
var valueMin = document.querySelector("[name='experience_min']");
var valueMax = document.querySelector("[name='experience_max']");
noUiSlider.create(slider, {
    start: [0, 5],
    connect: true,
    tooltips: [true, true],
    range: {
        "min": 0,
        "max": 20
    }
});

slider.noUiSlider.on("update", function (values, handle) {
    if (handle) {
        valueMax.value = values[handle];
    } else {
        valueMin.value = values[handle];
    }
});
