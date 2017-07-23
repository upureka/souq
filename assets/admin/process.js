(function () {
//console.log('ajax');
    /***************************************************************************
     * AJAX Setup for processing
     ***************************************************************************/
    //var baseUrl = '/tourism';
    var csrf = new FormData($('#csrf')[0]);
    var loading = $('#loading').html();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
    });

    //make main Category
    $('.MainCategory').on('click' ,function (e) {
        e.preventDefault();
        // console.log($(this).data('url'));
        var isMain = $(this).data('main');
        var categoryId = $(this).data('id');

        if(isMain != '0'){
            $.ajax({
                url: $(this).data('url'),
                dataType: 'json',
                method: 'POST',
                data: {id: $(this).data('id'),_token: $(this).data('token')},
                success: function (response) {
                    if (response.status) {
    //               $('#loadmodel').show();
                        swal({title: " نجاح", text: response.data, type: "success"}, function () {
                            location.reload(true);
                        });
                    } else {
    //                $('#loadmodel').show();
                        swal('خطا.', response.data, 'error');
                    }
                }
            });

        }else{
            $(this).attr('href' ,'#mainCategory');
            $(this).attr('data-toggle' ,'modal');
            $('#productID').val(categoryId);
        }
    });

    //Activate member code
    $('.activateBTN').on('change' ,function (e) {
        e.preventDefault();
        // console.log($(this).closest('tr'));
        var url = $(this).data('url');
        var Type = $(this).val();
        var button = $(this);

        $.ajax({
            url: url ,
            dataType: 'json',
            method: "POST",
            data: {id: $(this).data('id') ,type: $(this).val(),_token: $(this).data('token')},
            success: function (response) {
                if (response.status == 'success') {

                   if(Type == '0'){
                       button.closest('tr').css("background-color","yellow");
                   }else if(Type == '-1'){
                       button.closest('tr').css("background-color","red");
                   }else if (Type == '1'){
                       button.closest('tr').css("background-color","white");
                   }
                }
            }
        });
        return false;
    });

    // --------------------------Trigger File upload browsing Section ---------------------------
    $(document).on('click', '.btn-product-image', function () {
        var btn = $(this);
        var uploadInp = btn.next('input[type=file]');
        uploadInp.change(function () {
            if (validateImgFile(this)) {
                btn.html('');
                previewURL(btn, this);
            }
        }).click();
    });

    function previewURL(btn, input) {
        if (input.files && input.files[0]) {
            // collecting the file source
            var file = input.files[0];
            // preview the image
            var reader = new FileReader();
            reader.onload = function (e) {
                var src = e.target.result;
                btn.attr('src', src);
            };
            reader.readAsDataURL(file);
        }
    }
    //validating the file
    function validateImgFile(input) {
        if (input.files && input.files[0]) {
            // collecting the file source
            var file = input.files[0];
            // validating the image name
            if (file.name.length < 1) {
                alert("The file name couldn't be empty");
                return false;
            }
            // validating the image size
            else if (file.size > 2000000) {
                alert("The file is too big");
                return false;
            }
            // validating the image type
            else if (file.type != 'image/png' && file.type != 'image/jpg' && file.type != 'image/gif' && file.type != 'image/jpeg') {
                alert("The file does not match png, jpg or gif");
                return false;
            }
            return true;
        }
    }

    /***************************************************************************
     * Modal View Modal
     **************************************************************************/

    $(document).on('click', '.btn-modal-view', function () {
        var $this = $(this);
        var url = $this.data('url');
        var data_lang = "lang=" + $this.data('lang');
        if ($this.find('.tiny-editor').length) {
            for (var i = 0; i < tinymce.editors.length; i++) {
                formData.append('editor' + (i + 1), tinymce.editors[i].getContent());
            }
        }

        var originalHtml = $this.html();
        //$this.prop('disabled', true).html('loading...');
        request(url, data_lang, function (data) {
            $this.prop('disabled', false).html(originalHtml);
            $('#common-modal').html(data).modal('toggle');
        }, function () {
            alert('Error');
        }, 'get');
    });

    //////////////////////////////////
    /***************************************************************************
     * Custom logging function
     * @param mixed data
     * @returns void
     **************************************************************************/
    function _(data) {
        console.log(data);
    }
    //////////////////// for send subscribtion messege //////////////////////////////
    $(document).on("submit", ".new-form", function (e) {
        e.preventDefault();
        // var $this = $(this);
//        $('#loadmodel').show();
        var url = $(this).attr('action');
        var ajaxSubmit = $(this).find('.new-submit');
        ajaxSubmit.html(loading);
        var ajaxSubmitHtml = ajaxSubmit.html();
        var altText = loading;
        var notification = 'm';
        if (ajaxSubmit.data('loading') !== undefined) {
            altText = ajaxSubmit.data('loading');
        }
        //ajaxSubmit.prop('disabled', true).html(altText);
        var formData = new FormData(this);
        if ($(this).find('.tiny-editor').length) {
            for (var i = 0; i < tinymce.editors.length; i++) {
                formData.append('editor' + (i + 1), tinymce.editors[i].getContent());
            }
        }
        if ($(this).data('url') !== undefined) {
            url = $(this).data('url');
        }
        if ($(this).data('notification') !== undefined) {
            notification = $(this).data('notification');
        }
        request(url, formData, function (result) {
            // altText.show();
            if (result.status) {
//                $('#loadmodel').show();
                swal({title: " نجاح", text: result.data, type: "success"}, function () {
                    location.reload(true);
                });
            } else {
//                $('#loadmodel').show();
                swal('خطا.', result.data, 'error');
            }
        });
    });
    var AddModalBtn = $('.addBTN');
    // var modelName = $('.add').attr('href');
    AddModalBtn.on('click', function () {
        var AddModalForm = $(this).closest('form');
        var formData = new FormData(AddModalForm[0]);

        if (typeof tinymce !== "undefined" && tinymce.editors.length) {
            for (var i = 0; i < tinymce.editors.length; i++) {
                formData.append('desc' + (i + 1), tinymce.editors[i].getContent());
            }
        }
        request(AddModalForm.attr('action'), formData,
                // on request success handler
                        function (result) {
                            if (result.status) {
                                swal({title: "نجاح", text: result.data, type: "success"}, function () {
                                    location.reload(true);
                                });
                            } else {
                                swal('خطا', result.data, 'error');
                            }
                        },
                        // on request failure handler
                                function () {
                                    alert('Internal Server Error.');
                                }, function (e) {

                            var videoProgress = $('.progress-bar');

                            var progress = Math.round(e.loaded / e.total * 100);
                            videoProgress.css('width', progress + '%');
                        });
                    });

    var AddModalBtn = $('.transBTN');
    // var modelName = $('.add').attr('href');
    AddModalBtn.on('click', function () {
        var AddModalForm = $(this).closest('form');
        var formData = new FormData(AddModalForm[0]);

        if (typeof tinymce !== "undefined" && tinymce.editors.length) {
            for (var i = 0; i < tinymce.editors.length; i++) {
                formData.append('desc' + (i + 1), tinymce.editors[i].getContent());
            }
        }
        request(AddModalForm.attr('action'), formData,
            // on request success handler
            function (result) {
                if (result.status) {
                    swal({title: "نجاح", text: result.data, type: "success"}, function () {
                        location.reload(true);
                    });
                } else {
                    swal('خطا', result.data, 'error');
                }
            },
            // on request failure handler
            function () {
                alert('Internal Server Error.');
            }, function (e) {

                var videoProgress = $('.progress-bar');

                var progress = Math.round(e.loaded / e.total * 100);
                videoProgress.css('width', progress + '%');
            });
    });

            $('.btndelet').click(function (e) {

                var txt = $('#template-modal').html();
                var url = $(this).attr('data-url');
                txt = txt.replace(new RegExp('{url}', 'g'), url);
                $('#delete-modal .modal-dialog').html(txt);
                $('#delete-modal').modal('show');
                e.preventDefault()
            });

            /***************************************************************************
             * Search input events for filtered table
             **************************************************************************/
            var tableData = $('#ajax-table');
            $(document).on('click', '#ajax-table .pagination a', function (e) {
                var $this = $(this);
                tableData.html(loading);
                $.ajax({
                    url: $this.attr('href'),
                }).done(function (data) {
                    tableData.html(data);
                }).fail(function () {
                    alert('Internal Server Error.');
                });
                e.preventDefault();
            });
            var inputSearch = $('#input-search');
            $(document).on('click', '.btn-search', function () {
                var form = $(this).closest('form');
                var search = (inputSearch.val().length) ? "/" + inputSearch.val() : "";
                tableData.html(loading);
                request(form.attr('action') + "/search" + search, null, function (data) {
                    tableData.html(data);
                }, function () {
                    alert('Internal Server Error');
                }, 'get');
            });
            /**************************************************************************
             * Actions Of Filters Buttons
             ***************************************************************************/

            $(document).on('change', '.btn-filter', function () {
                var $this = $(this);
                var filter = $this.data('filter');
                tableData.html(loading);
                var form = $this.closest('form');
                request(form.attr('action') + "/filter/" + filter, null, function (data) {
                    tableData.html(data);
                }, function () {
                    alert('Internal Server Error.');
                }, 'get');
            });
            /**************************************************************************
             * Events Action Buttons for the tables
             **************************************************************************/

            $(document).on('click', '.btn-action', function (e) {
                var $this = $(this);
                var action = $this.data('action');
                var form = $this.closest('form');
                request(form.attr('action') + "/action/" + action, new FormData(form[0]), function (data) {
                    if (data.status === 'success') {
                        notify(data.status, data.title, data.msg, function () {
                            $('input[data-filter=all]').change();
                        });
                    } else {
                        notify(data.status, data.title, data.msg);
                    }
                }, function () {
                    alert('Internal Server Error.');
                });
                e.preventDefault();
            });

            /***************************************************************************
             * Check ALL Button For Table Rows
             ***************************************************************************/

            $(document).on('click', '#chk-all', function () {
                $('.chk-box').prop('checked', this.checked);
            });

            ///////////////////////////////////// End Admin Panel Ajax  ////////////////////////////////////////

            //////////////////////////////////////// Site Ajax  //////////////////////////////////////////////////


            /***************************************************************************
             * Custom Ajax request function
             * @param string url
             * @param mixed|FormData data
             * @param callable(data) completeHandler
             * @param callable errorHandler
             * @param callable progressHandler
             * @returns void
             **************************************************************************/
            function _(data) {
                console.log(data);
            }

            function request(url, data, completeHandler, errorHandler, progressHandler) {
                if (typeof progressHandler === 'string' || progressHandler instanceof String) {
                    method = progressHandler;
                } else {
                    method = "POST"
                }

                $.ajax({
                    url: url, //server script to process data
                    type: method,
                    xhr: function () {  // custom xhr
                        myXhr = $.ajaxSettings.xhr();
                        if (myXhr.upload && $.isFunction(progressHandler)) { // if upload property exists
                            myXhr.upload.addEventListener('progress', progressHandler, false); // progressbar
                        }
//                                console.log(myXhr);
                        return myXhr;
                    },
                    // Ajax events
                    success: completeHandler,
                    error: errorHandler,
                    // Form data
                    data: data,
                    // Options to tell jQuery not to process data or worry about the content-type
                    cache: false,
                    contentType: false,
                    processData: false
                }, 'json');
            }

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
            /***************************************************************************
             * identify Tinymce
             **************************************************************************/
            if (typeof tinymce !== "undefined") {
                /*Text area Editors
                 =========================*/

                tinymce.init({
                    selector: '.tiny-editor',
                    height: 350,
                    theme: 'modern',
                    menubar: false,
                    plugins: [
                        'advlist autolink lists link image charmap print preview anchor',
                        'searchreplace visualblocks code fullscreen',
                        'insertdatetime media table contextmenu paste code'
                    ],
                    toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                    content_css: '//www.tinymce.com/css/codepen.min.css'
                });

            }
        })();

