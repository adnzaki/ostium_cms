// Main javascript file


$("#buat-post").on('click', function() {
    $("#dashboard").fadeOut(300, function() {
        $("#add-post").fadeIn(400);
        runTinyMCE();
    });
})

$("#tutup-post-editor").on('click', function() {
    $("#add-post").fadeOut(300, function() {
        $("#dashboard").fadeIn(400);
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
        external_filemanager_path:"assets/plugins/tinymce/plugins/filemanager/",
        filemanager_title:"Responsive Filemanager" ,
        external_plugins: { "filemanager" : "plugins/filemanager/plugin.min.js"}
    });
}
