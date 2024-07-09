"use strict";
// Class definition
var KTparametersAdd = function () {
    // Shared variables
    const element = document.getElementById('kt_setting_creation_div');
    const form = element.querySelector('#kt_setting_form');
    // Init add schedule modal
    var initAddParameter = () => {
        $(".date_picker").flatpickr({
            enableTime: false,
            dateFormat: "Y-m-d",
        });
        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        var validator = FormValidation.formValidation(
            form,
            {
                fields: {
                    'client_name': {
                        validators: {
                            notEmpty: {
                                message: 'Full name is required'
                            }
                        }
                    },
                    'dob': {
                        validators: {
                            notEmpty: {
                                message: 'DOB is required'
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
        // Submit button handler
        const submitButton = element.querySelector('#kt_setting_submit');
        submitButton.addEventListener('click', e => {
            e.preventDefault();
            // Validate form before submit
            if (validator) {
                validator.validate().then(function (status) {
                    if (status == 'Valid') {
                        // Show loading indication
                        submitButton.setAttribute('data-kt-indicator', 'on');
                        // Disable button to avoid multiple click 
                        submitButton.disabled = true;
                     form.submit(); // Submit form
                    } 
                });
            }
        });
        // Cancel button handler
        const cancelButton = element.querySelector('#kt_kt_setting_cancel');
        cancelButton.addEventListener('click', e => {
            e.preventDefault();
            Swal.fire({
                text: "Are you sure you would like to cancel?",
                icon: "warning",
                showCancelButton: true,
                buttonsStyling: false,
                confirmButtonText: "Yes, cancel it!",
                cancelButtonText: "No, return",
                customClass: {
                    confirmButton: "btn btn-primary",
                    cancelButton: "btn btn-active-light"
                }
            }).then(function (result) {
                if (result.value) {
                    form.reset(); // Reset form				
                } else if (result.dismiss === 'cancel') {
                    Swal.fire({
                        text: "Your form has not been cancelled!.",
                        icon: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary",
                        }
                    });
                }
            });
        });
    }
    return {
        // Public functions
        init: function () {
            initAddParameter();
        }
    };
}();
// On document ready
KTUtil.onDOMContentLoaded(function () {
    KTparametersAdd.init();
});