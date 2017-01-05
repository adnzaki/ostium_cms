<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test tiny mce</title>
        <script src="<?php echo $asset?>plugins/tinymce/tinymce.min.js"></script>

        <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            height: 400,
            plugins: [
                'advlist autolink lists link charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality',
                'emoticons template paste textcolor colorpicker textpattern imagetools image'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
            toolbar2: 'print preview | forecolor backcolor emoticons',
            image_advtab: true
        });
        </script>
    </head>
    <body>
        <textarea></textarea>
    </body>
</html>
