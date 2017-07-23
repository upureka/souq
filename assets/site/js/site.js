var csrf = new FormData($('#csrf')[0]);
/***********************************************************************
 * Notify with a message in shape of fancy alert
 **********************************************************************/

function notify(status, title, msg, type) {
    status = (status == 'error' ? 'danger' : status);
    var callable = null;
    var template = null;
    var icons = {
        'danger': 'fa-ban',
        'success': 'fa-check',
        'info': 'fa-info',
        'warning': 'fa-warning'
    };
    if ($.isFunction(type)) {
        callable = type;
        type = 'modal';
    }

    if (!type || type == 'm') {
        type = 'modal';
    } else if (type == 'f') {
        type = 'flash';
    }

    template = $("#alert-" + type).html();
    template = template.replace(new RegExp('{icon}', 'g'), icons[status]);
    template = template.replace(new RegExp('{status}', 'g'), status);
    template = template.replace(new RegExp('{title}', 'g'), title);
    template = template.replace(new RegExp('{msg}', 'g'), msg);
    switch (type) {
        case 'modal':
            var modal = $(template).modal('toggle');
            if ($.isFunction(callable)) {
                modal.on("hidden.bs.modal", callable);
            }
            return;
        default:
            $('#alert-box').html(template);
    }

}

/*
 subscribe form
 */
(function($) {
    "use strict";
    var newsForm = {
        initialized: false,
        initialize: function() {
            if (this.initialized) return;
            this.initialized = true;
            this.build();
            this.events();
        },
        build: function() {
            this.validations();
        },
        events: function() {},
        validations: function() {
            var newsform = $(".subscribe-form"),
                url = newsform.attr("action");
            newsform.validate({
                submitHandler: function(form) {
                    var submitButton = $(this.submitButton);
                    $.ajax({
                        method: $(form).attr('method'),
                        url: url,
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function(data) {
                            if (data.response == "success") {
                                var message = data.message;
                                $("#news-alert-success").text(message);
                                $("#news-alert-success").stop().removeClass("hidden").hide().fadeIn();
                                $("#news-alert-error").stop().addClass("hidden");
                                setTimeout(function() {
                                    $("#news-alert-success").stop().fadeOut().addClass("hidden");
                                }, 3000);
                            } else if (data.response == 'error') {
                                var message = data.message;
                                $("#news-alert-error").text(message);
                                $("#news-alert-error").stop().removeClass("hidden").hide().fadeIn();
                                $("#news-alert-success").stop().addClass("hidden");
                                setTimeout(function() {
                                    $("#news-alert-error").stop().fadeOut().addClass("hidden");
                                }, 3000);
                            }
                        },
                        error: function() {
                            var message = 'Please, try again.';
                            $("#news-alert-error").text(message);
                            $("#news-alert-error").stop().removeClass("hidden").hide().fadeIn();
                            $("#news-alert-success").stop().addClass("hidden");
                            setTimeout(function() {
                                $("#news-alert-error").stop().fadeOut().addClass("hidden");
                            }, 3000);
                        },
                        complete: function() {
                            submitButton.button("reset");
                        }
                    });
                },
                rules: {
                    email: {
                        required: true
                    }
                },
                highlight: function(element) {
                    $(element).parent().removeClass("has-success").addClass("has-error");
                },
                success: function(element) {
                    $(element).parent().removeClass("has-error").addClass("has-success").find("label.error").remove();
                }
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-Token': $('input[name="_token"]').val()
                }
            });
        }
    };
    newsForm.initialize();
})(jQuery);

/**
 *  Login Site
 */
(function ($) {
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
            var headLoginForm = $(".login-ajax"),
                url = headLoginForm.attr("action");
            headLoginForm.validate({
                submitHandler: function (form) {
                console.log(url);
                    // Ajax Submit
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            if (data.response === "success") {
                                console.log('success');

                                var alertSelector = '#success';
                                var alertOpSelector = '#error';
                            } else if (data.response === "error") {
                                console.log('error');

                                var alertSelector = '#error';
                                var alertOpSelector = '#success';
                            }
                            $(alertSelector).text(data.message);
                            $(alertSelector).hide().removeClass('hidden').fadeIn();
                            setTimeout(function () {
                                $(alertSelector).fadeOut().addClass('hidden');
                            }, 3000);
                            $(alertOpSelector).fadeOut().addClass('hidden');
                            if (data.response === "success") {
                                if (data.url){
                                    window.location.replace(data.url);
                                }
                                else{
                                    location.reload();
                                }
                            }
                        }
                    });
                },
                rules: {
                    username: {
                        required: true
                    },
                    password: {
                        required: true,
                    }
                },
                messages: {
                    username: {
                        required: 'من فضلك ادخل اسم المستخدم او رقم الهاتف او البريد الالكترونى'
                    },
                    password: {
                        required: 'من فضلك ادخل كلمه المرور',
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
/**
 *  Register Site
 */
(function ($) {
    var headRegisterForm = {
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
            var headRegisterForm = $(".register-ajax"),
                url = headRegisterForm.attr("action");
            headRegisterForm.validate({
                submitHandler: function (form) {
                    // Ajax Submit
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            if (data.response === "success") {
                                console.log('success');

                                var alertSelector = '#success';
                                var alertOpSelector = '#error';
                            } else if (data.response === "error") {
                                console.log('error');

                                var alertSelector = '#error';
                                var alertOpSelector = '#success';
                            }
                            $(alertSelector).text(data.message);
                            $(alertSelector).hide().removeClass('hidden').fadeIn();
                            setTimeout(function () {
                                $(alertSelector).fadeOut().addClass('hidden');
                            }, 3000);
                            $(alertOpSelector).fadeOut().addClass('hidden');
                            if (data.response === "success") {
                                window.location.replace(data.url);
                            }
                        }
                    });
                },
                rules: {
                    username: {
                        required: true
                    },
                    email: {
                        required: true,
                        email:true
                    },
                    phone: {
                        required: true
                    },
                    password: {
                        required: true,
                    }
                },
                messages: {
                    username: {
                        required: 'من فضلك ادخل اسم المستخدم '
                    },
                    email: {
                        required: 'من فضلك ادخل البريد الالكترونى',
                    },
                    phone: {
                        required: 'من فضلك ادخل رقم الهاتف '
                    },
                    password: {
                        required: 'من فضلك ادخل كلمه المرور',
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
    headRegisterForm.initialize();
})(jQuery);
/**
 *  Code Confirm Site
 */
(function ($) {
    var headConfirmForm = {
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
            var headConfirmForm = $(".confirm-code-ajax"),
                url = headConfirmForm.attr("action");
            headConfirmForm.validate({
                submitHandler: function (form) {
                    // Ajax Submit
                    $.ajax({
                        method: "POST",
                        url: url,
                        data: $(form).serialize(),
                        dataType: "json",
                        success: function (data) {
                            if (data.response === "success") {
                                console.log('success');

                                var alertSelector = '#success';
                                var alertOpSelector = '#error';
                            } else if (data.response === "error") {
                                console.log('error');

                                var alertSelector = '#error';
                                var alertOpSelector = '#success';
                            }
                            $(alertSelector).text(data.message);
                            $(alertSelector).hide().removeClass('hidden').fadeIn();
                            setTimeout(function () {
                                $(alertSelector).fadeOut().addClass('hidden');
                            }, 3000);
                            $(alertOpSelector).fadeOut().addClass('hidden');
                            if (data.response === "success") {
                                if (data.url){
                                    window.location.replace(data.url);
                                }
                                else{
                                    location.reload();
                                }
                            }
                        }
                    });
                },
                rules: {
                    code: {
                        required: true,
                        minlength:'5'
                    }
                },
                messages: {
                    code: {
                        required: 'من فضلك ادخل رقم التاكيد',
                        minlength: 'رقم التاكيد لا يزيد عن 5 ارقام'
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
    headConfirmForm.initialize();
})(jQuery);
/*
Select types for category
 */
/* Dynamic sub category select
 =================================*/
(function ($) {
    $('#main-category').on('change', function () {
        // alert('change');
        var selectedVal = parseInt($(this).val());
        $('.subcat_select').addClass('hidden');
        $('#subCat' + selectedVal).removeClass('hidden');
    });
})(jQuery);


/*
 Add to wishlist
 */
$('.WishlistBTN').on('click' ,function (e) {
    e.preventDefault();

    var url = $(this).data('url');
    var adID = $(this).data('id');
    var button = $(this);
    // console.log(productID);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    $.ajax({
        url: url,
        data: {ad_id : adID},
        dataType: 'json',
        method: 'POST',
        success: function (response) {

            // console.log(x);
            if(response.response == 'success'){

                button.find('.button-text').text('حذف من المفضله');
                noty({
                    text: response.msg,
                    type: response.status,
                    layout: 'topRight',
                    timeout: 200,
                    closeWith: ['click'],
                    maxVisible: 10,
                    animation: {
                        // open: 'animated bounceInLeft',
                        // close: 'animated bounceOutLeft',
                        open: {height: 'toggle'},
                        close: {height: 'toggle'},
                        easing: 'swing',
                        speed: 2000 // opening & closing animation speed
                    }
                });
            }else{
                button.find('.button-text').text('اضافه للمفضله');
                noty({
                    text: response.msg,
                    type: response.status,
                    layout: 'topRight',
                    timeout: 200,
                    closeWith: ['click'],
                    maxVisible: 10,
                    animation: {
                        // open: 'animated bounceInLeft',
                        // close: 'animated bounceOutLeft',
                        open: {height: 'toggle'},
                        close: {height: 'toggle'},
                        easing: 'swing',
                        speed: 2000 // opening & closing animation speed
                    }
                });
            }
        }
    });

    return false;
});

////// contact the users form
$('.contact-form').on('submit' ,function (e) {
    e.preventDefault();

    var form = $(this);
    var url = $(this).attr('action');

    $.ajax({
        url: url,
        dataType: 'json' ,
        method: 'POST',
        data: form.serialize(),
        success: function (response) {
            if(response.response == 'success'){
                noty({
                    text: response.msg,
                    type: response.status,
                    layout: 'topRight',
                    timeout: 200,
                    closeWith: ['click'],
                    maxVisible: 10,
                    animation: {
                        // open: 'animated bounceInLeft',
                        // close: 'animated bounceOutLeft',
                        open: {height: 'toggle'},
                        close: {height: 'toggle'},
                        easing: 'swing',
                        speed: 2000 // opening & closing animation speed
                    }
                });
                form.get(0).reset();
            }else {
                noty({
                    text: response.msg,
                    type: response.status,
                    layout: 'topRight',
                    timeout: 200,
                    closeWith: ['click'],
                    maxVisible: 10,
                    animation: {
                        // open: 'animated bounceInLeft',
                        // close: 'animated bounceOutLeft',
                        open: {height: 'toggle'},
                        close: {height: 'toggle'},
                        easing: 'swing',
                        speed: 2000 // opening & closing animation speed
                    }
                });
            }

        }
    });
   return false;
});