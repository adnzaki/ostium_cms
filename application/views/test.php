<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test tinymce</title>
        <script src="<?php echo $asset?>plugins/tinymce/tinymce.min.js"></script>

        <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            height: 400,
            plugins: [
                'advlist autolink lists link charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools image responsivefilemanager'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'responsivefilemanager | print preview | forecolor backcolor emoticons | code',
            image_advtab: true,
            external_filemanager_path:"assets/plugins/tinymce/plugins/filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : "plugins/filemanager/plugin.min.js"}
        });
        </script>
    </head>
    <body>
        <textarea></textarea>
    </body>
</html>
