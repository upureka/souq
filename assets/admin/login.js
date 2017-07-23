/* Contact Form Script */
(function ($) {
    "use strict";
    /* Login form
     ================*/
    var headLoginForm = {
        initialized: false,
        initialize: function () {
            if (this.initialized)
                return;
            this.initialized = true;
            this.build();
            this.events();
        },
        build: function () {
            this.validations();
        },
        events: function () {
        },
        validations: function () {
            var headLoginForm = $(".login-form"),
                    url = headLoginForm.attr("action");
            headLoginForm.validate({
                submitHandler: function (form) {
                    // Loading State
                    var submitButton = $(this.submitButton);

                    // submitButton.button("جاري");

                    // Ajax Submit
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            if (data.response === "success") {
                                var alertSelector = '#headLogActionSuccess';
                                var alertOpSelector = '#headLogActionError';
                            } else if (data.response === "error") {
                                var alertSelector = '#headLogActionError';
                                var alertOpSelector = '#headLogActionSuccess';
                            }
                            $(alertSelector).text(data.message);
                            $(alertSelector).hide().removeClass('hidden').fadeIn();
                            setTimeout(function () {
                                $(alertSelector).fadeOut().addClass('hidden');
                            }, 3000);
                            $(alertOpSelector).fadeOut().addClass('hidden');
                            if (data.response === "success") {
                                location.reload();
                            }
                        },
                        complete: function () {
                            submitButton.button("reset");
                        }
                    });
                },
                rules: {
                    email: {
                        required: true
                    },
                    password: {
                        required: true
                    }
                },
                messages: {
                    email: {
                        required: 'برجاء ادخال البريد الالكتروني'
                    },
                    password: {
                        required: 'برجاء ادخال الرقم السري'
                    }
                },
                highlight: function (element) {
                    $(element)
                            .parent()
                            .removeClass("has-success")
                            .addClass("has-error");
                    if (typeof $.fn.isotope !== 'undefined') {
                        $('.filter-elements').isotope('layout');
                    }
                },
                success: function (element) {
                    $(element)
                            .parent()
                            .removeClass("has-error")
                            .addClass("has-success")
                            .find("label.error")
                            .remove();
                }
            });
            $.ajaxSetup(
                    {
                        headers:
                                {
                                    'X-CSRF-Token': $('input[name="_token"]').val()
                                }
                    });
        }
    };
    headLoginForm.initialize();
})(jQuery);