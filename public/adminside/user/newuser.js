// Class definition
var KTFormControls = function () {
    // Private functions
    var _initDemo1 = function () {
        FormValidation.formValidation(
            document.getElementById('kt_form_1'),
            {
                fields: {
                    email: {
                        validators: {
                            notEmpty: {
                                message: 'Email is required'
                            },
                            emailAddress: {
                                message: 'The value is not a valid email address'
                            },
                            remote: {
                                message: 'Email is Already Exist !',
                                method: 'GET',
                                url: '/newuseremail',
                            }
                        }
                    },
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Name is required'
                            },
                        }
                    },
                    password: {
                        validators: {
                            notEmpty: {
                                message: 'Password is required'
                            },

                        }
                    },


                    phone: {
                        validators: {
                            notEmpty: {
                                message: 'phone number is required'
                            },
                            phone: {
                                country: '*',
                                message: 'The value is not a valid phone number'
                            }
                        }
                    },
                    address: {
                        validators: {
                            notEmpty: {
                                message: 'Address is required'
                            },

                        }
                    },








                },




                plugins: { //Learn more: https://formvalidation.io/guide/plugins
                    trigger: new FormValidation.plugins.Trigger(),
                    // Bootstrap Framework Integration
                    bootstrap: new FormValidation.plugins.Bootstrap(),
                    // Validate fields when clicking the Submit button
                    submitButton: new FormValidation.plugins.SubmitButton(),
                    // Submit the form when all fields are valid
                    defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                }
            }
        );
    }



    return {
        // public functions
        init: function() {
            _initDemo1();

        }
    };
}();

jQuery(document).ready(function() {
    KTFormControls.init();
});
