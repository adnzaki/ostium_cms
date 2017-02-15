/**
 * OstiumCMS
 * A simple, fast and fully customizable Content Management System
 * for website made by Wolestech (Software Development Agency)
 *
 * @copyright   Copyright (c) 2016-2017, Wolestech | Adnan Zaki
 * @license     MIT License | https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 */

$(".buat-post").on('click', function() {
    $("#dashboard, #all-post").each(function() {
        $(this).fadeOut(300, function() {
            $("#add-post, .post-sidebar").each(function() {
                $(this).fadeIn(400);
            })
            runTinyMCE();
        });
    })
});

$(".tutup-post-editor").on('click', function() {
    $("#add-post, .post-sidebar").each(function() {
        $(this).fadeOut(300, function() {
            $("#dashboard, #all-post").each(function() {
                $(this).fadeIn(400);
            })
        })
    })
});

$("#simpan-draft").on('click', function(e) {
    e.preventDefault();
    var judul       = $("#judul_post").val();
    var kategori    = $("#kategori").val();
    var penulis     = $("#user").val();
    var konten      = tinymce.get('editor').getContent();
    var gambar      = $("#link-img").val();
    var data        = 'judul_post=' + judul + '&kategori=' + kategori + '&user=' + penulis + '&isi_post=' + konten + '&gambar-fitur=' + gambar;
    $.ajax({
        url: baseUrl + 'posts/add_draft',
        type: 'POST',
        dataType: 'html',
        data: data,
        success: function() {
            window.location.href = baseUrl + 'post';
        }
    })
});

// Show confirmation box to delete post
$(document).delegate('.post-delete', 'click', function() {
    var id = $(this).data('post');
    var color = $(this).data('color');
    $('#mdModal .modal-content').removeAttr('class').addClass('modal-content modal-col-' + color);
    $('#mdModal').modal('show');
    $(".btn-delete").attr('id', id);
});

// Confirm to delete post
$(".btn-delete").on('click', function() {
    var id = $(this).attr('id');
    $.ajax({
        url: baseUrl + 'post/del/' + id,
        type: 'POST',
        success: function(data) {
            $('#mdModal').modal('hide');
            $("#post-list").html(data);
            $("#delete-msg").show(400, setTimeout(function() {
                $("#delete-msg").hide();
            }, 5000));
        }
    })
});

var postAttribute = {
    kategori: "#kategori-sender",
    user: "#user-sender",
    // send category id to form input
    setKategori: function() {
        $(this.kategori).on('change', function() {
            var id = $(this).find(":selected").attr('id');
            $("#kategori").val(id);
        })
    },
    // send user id to form input
    setUser: function() {
        $(this.user).on('change', function() {
            var id = $(this).find(":selected").attr('id');
            $("#user").val(id);
        })
    },
    // default attribute selected when the page is loaded
    defaultAttribute: function() {
        var kategori    = $(this.kategori).find(":selected").attr('id'),
            user        = $(this.user).find(":selected").attr('id'),
            gambar      = $("#prev-img").attr('src');
        $("#kategori").val(kategori);
        $("#user").val(user);
        $("#link-img").val(gambar);
    }
}
// scripts running when the page is loaded
$(window).load(function() {
    runTinyMCE();
    activateScroll();
    postAttribute.setKategori();
    postAttribute.setUser();
    postAttribute.defaultAttribute();
});

$(window).resize(function () {
    activateScroll();
});

function responsive_filemanager_callback(field_id) {
    var image = $("#" + field_id).val();
    $("#prev-img").attr('src', image);
}

var $list = $('.list-setting'),
    minsHeight = 100,
    windowHeight = $(window).height(),
    scrollHeight = windowHeight - minsHeight;

function activateScroll() {
    $list.slimscroll({
        height: scrollHeight + 'px',
        scrollColor: 'rgba(0,0,0,0.5)',
        scrollWidth: '4px',
        scrollAlwaysVisible: false,
        scrollBorderRadius: '0',
        scrollRailBorderRadius: '0'
    })
}

function runTinyMCE() {
    tinymce.init({
        selector: "textarea#editor",
        height: 400,
        plugins: [
            'advlist autolink lists link charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime nonbreaking save table contextmenu directionality codesample',
            'emoticons template paste textcolor colorpicker textpattern imagetools image responsivefilemanager'
        ],
        menubar: false,
        toolbar1: 'insertfile undo redo | fontsizeselect styleselect fontselect | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify',
        toolbar2: 'bullist numlist outdent indent | link image | responsivefilemanager print preview | forecolor backcolor emoticons | codesample fullscreen',
        image_advtab: true,
        codesample_dialog_height: 200,
        fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
        relative_urls: false,
		remove_script_host: false,
        external_filemanager_path: baseUrl + "assets/plugins/tinymce/plugins/filemanager/",
        filemanager_title:"File Manager" ,
        external_plugins: { "filemanager" : "plugins/filemanager/plugin.min.js"}
    });
}
