/**
 * Ostium CMS
 * A content management system for Wolestech based website
 * Script.js
 * Script utama untuk mengatur interaksi user dengan aplikasi
 * Include: Ajax
 * @copyright   Copyright (c) 2017, Wolestech | Adnan Zaki (https://wolestech.com/)
 * @license     https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 * @version     OstiumCMS v0.0.3
 */

$(".buat-post").on('click', function() {
    $("#dashboard, #all-post").each(function() {
        $(this).fadeOut(300, function() {
            $("#add-post").fadeIn(400);
            runTinyMCE();
        });
    })
})

$("#tutup-post-editor").on('click', function() {
    $("#add-post").fadeOut(300, function() {
        $("#dashboard, #all-post").each(function() {
            $(this).fadeIn(400);
        })
    })
})

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
})

$(".post-edit").on('click', function() {

})

$(window).load(function() {
    runTinyMCE();
})

function runTinyMCE() {
    tinymce.init({
        selector: "textarea#editor",
        height: 400,
        plugins: [
            'advlist autolink lists link charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools image responsivefilemanager'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'responsivefilemanager print preview | forecolor backcolor emoticons',
        image_advtab: true,
        relative_urls: false,
		remove_script_host: false,
        external_filemanager_path:"assets/plugins/tinymce/plugins/filemanager/",
        filemanager_title:"File Manager" ,
        external_plugins: { "filemanager" : "plugins/filemanager/plugin.min.js"}
    });
}
