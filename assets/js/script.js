// Main javascript file


$("#buat-post").on('click', function() {
    $("#dashboard").fadeOut(300, function() {
        $("#add-post").fadeIn(400);
        runTinyMCE();
    });
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
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link',
        toolbar2: 'print preview | forecolor backcolor emoticons',
        image_advtab: true
    });
}
