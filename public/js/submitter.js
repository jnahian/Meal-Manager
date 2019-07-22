/**
 * Created by jnahian on 6/1/2017.
 */
submit_form = function (t, e) {
    var form = $(t).parents('form');
    var action = $(form).attr('action');
    var method = $(form).attr('method');
    var mime = $(form).attr('enctype');
    var btn = $(t).html();
    var progress = $('.progress');
    var preloader = $('.pre-loader');
    var bar = $(".progress > .determinate");
    $(form).one('submit', function (e) {
        e.preventDefault();

        var formData = new FormData(this);

        $.ajax({
            url: action,
            type: method,
            beforeSend: function () {
                $(t).attr('disabled', 'disabled');
                progress.show();
                preloader.addClass('show');
                bar.css("width", "0%");
                $('.helper-text.red-text').remove();
                $('.form-control').removeClass('invalid');
                // $(t).find('i').removeClass('ti-save').addClass('fa fa-spinner fa-spin');
            },
            data: formData,
            processData: false,
            contentType: false,
            mimeType: mime,
            dataType: 'JSON',
            xhr: function () {
                //upload Progress
                var xhr = new window.XMLHttpRequest();
                if (xhr.upload) {
                    xhr.upload.addEventListener('progress', function (event) {
                        //console.log(event);
                        var percent = 0;
                        var position = event.loaded || event.position;
                        var total = event.total;
                        if (event.lengthComputable) {
                            percent = Math.ceil(position / total * 100);
                        }
                        //update progressbar
                        bar.css("width", +percent + "%");
                        //$(progress_bar_id + " .status").text(percent +"%");
                    }, true);
                }
                return xhr;
            },
        })
            .done(function (ret) {
                // console.log(ret);
                var type = 'error';
                if (ret.success) {
                    $(form)[0].reset();
                    type = 'success';
                }

                jNotify(ret.msg, type);

                if (ret.redirect != undefined && ret.redirect) {
                    redirect(ret.redirect);
                }

                /*swal({
                    type: type,
                    title: title,
                    text: ret.msg,
                    timer: 5000
                }).then(function (res) {
                    if (ret.redirect) {
                        redirect(ret.redirect);
                    }

                }, function (dismiss) {
                    if (ret.redirect && dismiss === 'timer') {
                        redirect(ret.redirect);
                    }

                });*/

            })
            .fail(function (res) {
                // errors = JSON.parse(res.responseText);
                errors = res.responseJSON;
                // console.log(errors);

                jNotify(errors.message, 'warning');

                if (errors.errors) {
                    $.each(errors.errors, function (index, error) {
                        $("[name=" + index + "]").after('<span class="helper-text red-text">' + error + '</span>');
                        $("[name=" + index + "]").addClass('invalid');
                        $(form).find("." + index).text(error);
                    });
                }
            })
            .always(function () {
                $(t).removeAttr('disabled');
                $(t).html(btn);
                // console.log('complete');
                progress.fadeOut(300);
                preloader.removeClass('show');
            });
    });
};

function jNotify(msg, type) {

    var classes = "yellow";

    if (type == 'warning') {
        classes = "yellow";
    } else if (type == 'error') {
        classes = "deep-orange";
    } else if (type == 'success') {
        classes = "green";
    }

    M.toast({
        html: msg,
        classes: "rounded darken-2 " + classes,
    });
}

function jShowDelete(t) {
    var target = $(t).parents('.delete-wrap').find('.delete-form');
    $(target).addClass('show');
}

function jCancelDelete(t) {
    var target = $(t).parents('.delete-wrap').find('.delete-form');
    if (target.hasClass('show')) {
        target.removeClass('show');
    }
}

function jLogoutConfirm(t) {
    $('.confirm-logout').addClass('show');
}

function jLogoutCancel(t) {
    var target = $('.confirm-logout');
    if (target.hasClass('show')) {
        target.removeClass('show');
    }
}

/**
 * Redirect to given url
 * @param $url
 * @returns {boolean}
 */
function redirect($url) {
    setTimeout(function () {
        window.location.replace($url);
    }, 500);
    return true;
}

/**
 * Reset Summernote
 * @returns {boolean}
 */
function resetSummernote() {
    if ($('html').find('.summernote').length > 0) {
        $('.summernote').summernote('reset');
    }
    return true;
}

/**
 * Reset Selectpicker
 * @returns {boolean}
 */
function resetSelectpicker() {
    if ($('html').find('.selectpicker').length > 0) {
        $('.selectpicker').selectpicker('reset');
    }
    return true;
}

/**
 * Reset multiselect
 * @returns {boolean}
 */
function resetMultiSelect() {
    if ($('html').find('.multi-select').length > 0) {
        $('.multi-select').multiSelect('refresh');
    }
    return true;
}

/**
 * Delete Function
 * @param t
 * @param e
 */
function deleteSwal(t, e) {
    e.preventDefault();
    swal({
        title: 'Delete?',
        text: "The item will be deleted!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d50003',
        cancelButtonColor: '#9a9a9a',
        confirmButtonText: 'Yes, delete it!'
    }).then(function () {
        // $(t).parent('form').submit();
        var form = $(t).parents('form'),
            action = $(form).attr('action'),
            method = $(form).attr('method'),
            btn = $(t).html();
        var formData = $(form).serialize();
        // console.log(form);
        // $(form).one('submit', function () {
        // e.preventDefault();

        $.ajax({
            url: action,
            type: method,
            beforeSend: function () {
                $(t).attr('disabled', 'disabled');
                $(t).html('<i class="fa fa-spinner fa-spin"></i>');
            },
            data: formData,
            dataType: 'JSON',
            success: function (res) {
                var type = 'error';
                var title = 'Sorry!';
                if (res.status) {
                    type = 'success';
                    title = 'Deleted!';
                    $(t).parents('tr').remove();
                }
                swal(
                    title,
                    res.msg,
                    type
                );
            },
            complete: function () {
                $(t).removeAttr('disabled');
            }
        });
        // });
    });
}

/**
 * Cancel Function
 * @param t
 * @param e
 */
function cancelSwal(t, e) {
    e.preventDefault();
    swal({
        title: 'Cancel?',
        text: "The Order will be Canceled!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#7b4f53',
        cancelButtonColor: '#9a9a9a',
        confirmButtonText: 'Yes, Cancel it!'
    }).then(function () {
        var action = $(t).attr('href');
        var btn = $(t).html();

        $.ajax({
            url: action,
            type: 'GET',
            beforeSend: function () {
                $(t).attr('disabled', 'disabled');
                $(t).html('<i class="fa fa-spinner fa-spin"></i>');
            },
            dataType: 'JSON',
            success: function (res) {
                var type = 'error';
                var title = 'Sorry!';
                if (res.status) {
                    type = 'success';
                    title = 'Canceled!';
                }
                swal(
                    title,
                    res.msg,
                    type
                ).then(function (res) {
                    window.location.reload();
                }, function (dismiss) {
                    if (dismiss === 'timer') {
                        window.location.reload();
                    }

                });
            },
            complete: function () {
                $(t).removeAttr('disabled').html(btn);
            }
        });
    });
}

/**
 * Suspend Function
 * @param t
 * @param e
 */
function suspendSwal(t, e) {
    e.preventDefault();
    swal({
        title: 'Suspend?',
        text: "The item will be Suspended!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#9800d5',
        cancelButtonColor: '#9a9a9a',
        confirmButtonText: 'Yes, Suspend it!'
    }).then(function () {
        var action = $(t).attr('href');
        var btn = $(t).html();

        $.ajax({
            url: action,
            type: 'GET',
            beforeSend: function () {
                $(t).attr('disabled', 'disabled');
                $(t).html('<i class="fa fa-spinner fa-spin"></i>');
            },
            dataType: 'JSON',
            success: function (res) {
                var type = 'error';
                var title = 'Sorry!';
                if (res.status) {
                    type = 'success';
                    title = 'Suspended!';
                }
                swal(
                    title,
                    res.msg,
                    type
                ).then(function (res) {
                    window.location.reload();
                }, function (dismiss) {
                    if (dismiss === 'timer') {
                        window.location.reload();
                    }

                });
            },
            complete: function () {
                $(t).removeAttr('disabled').html(btn);
            }
        });
    });
}

/**
 * Publish Function
 * @param t
 * @param e
 */
function publishSwal(t, e) {
    e.preventDefault();
    var title = $(t).data('original-title');

    swal({
        title: title + '?',
        text: "The item will be " + title + "ed!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#55a350',
        cancelButtonColor: '#9a9a9a',
        confirmButtonText: 'Yes, ' + title + ' it!'
    }).then(function () {
        var action = $(t).attr('href');
        var btn = $(t).html();

        $.ajax({
            url: action,
            type: 'GET',
            beforeSend: function () {
                $(t).attr('disabled', 'disabled');
                $(t).html('<i class="fa fa-spinner fa-spin"></i>');
            },
            dataType: 'JSON',
            success: function (res) {
                var type = 'error';
                if (res.status) {
                    type = 'success';
                }
                swal(
                    title,
                    res.msg,
                    type
                ).then(function (res) {
                    window.location.reload();
                }, function (dismiss) {
                    if (dismiss === 'timer') {
                        window.location.reload();
                    }

                });
            },
            complete: function () {
                $(t).removeAttr('disabled').html(btn);
            }
        });
    });
}

/**
 * Publish Function
 * @param t
 * @param e
 */
function completeSwal(t, e) {
    e.preventDefault();
    var title = $(t).data('original-title');

    swal({
        title: title + '?',
        text: "The item will be " + title + "!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#55a350',
        cancelButtonColor: '#9a9a9a',
        confirmButtonText: 'Yes, ' + title + ' it!'
    }).then(function () {
        var action = $(t).attr('href');
        var btn = $(t).html();

        $.ajax({
            url: action,
            type: 'GET',
            beforeSend: function () {
                $(t).attr('disabled', 'disabled');
                $(t).html('<i class="fa fa-spinner fa-spin"></i>');
            },
            dataType: 'JSON',
            success: function (res) {
                var type = 'error';
                if (res.status) {
                    type = 'success';
                }
                swal(
                    title,
                    res.msg,
                    type
                ).then(function (res) {
                    window.location.reload();
                }, function (dismiss) {
                    if (dismiss === 'timer') {
                        window.location.reload();
                    }

                });
            },
            complete: function () {
                $(t).removeAttr('disabled').html(btn);
            }
        });
    });
}

/**
 * Costom Notification
 * @param type
 * @param msg
 */
/*
 jNotify = function (type = '', msg = '', hide = true) {
 if (type != '' && msg != '') {
 var heading, class_name, icon;
 if (type == 'success') {
 heading = 'Successfull!';
 class_name = 'success';
 icon = 'fa-check-square-o';
 }
 else if (type == 'error') {
 heading = 'Failed!';
 class_name = 'danger';
 icon = 'fa-warning';
 }

 var msg = '<div class="alert alert-' + class_name + ' fade in"><button data-dismiss="alert" class="close close-sm" type="button"><i class="fa fa-times"></i></button><h4><i class="fa ' + icon + '"></i>' + heading + '</h4><p>' + msg + '</p></div>';

 $('body').prepend(msg);
 }

 $('.alert').animate({
 'top': '15%',
 'opacity': '1',
 }, 200);

 if (hide == true) {
 setTimeout(function () {
 $('.alert').animate({
 'top': '-100%',
 'opacity': '0',
 }, {
 easing: 'swing',
 duration: 500,
 complete: function () {
 $('.alert').remove();
 }
 });
 }, 5000);
 }
 };*/

