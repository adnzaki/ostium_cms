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
    var kategori    = $("#kategori").find(":selected").attr('id');
    var penulis     = $("#user").find(":selected").attr('id');
    var konten      = tinymce.get('editor').getContent();
    var data        = 'judul_post=' + judul + '&kategori=' + kategori + '&user=' + penulis + '&isi_post=' + konten;
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

$(window).load(function() {
    runTinyMCE();
});

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
        toolbar1: 'insertfile undo redo | fontsizeselect styleselect fontselect | bold italic underline | alignleft aligncenter alignright alignjustify',
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