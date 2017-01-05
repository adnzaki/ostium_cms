<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test tiny mce</title>
        <script src="<?php echo $asset?>plugins/tinymce_prod/tinymce.min.js"></script>

        <script type="text/javascript">
        tinymce.init({
            selector: "textarea",
            height: 400,
            plugins: [
                'advlist autolink lists link charmap print preview hr anchor pagebreak',
                'searchreplace wordcount visualblocks visualchars code fullscreen',
                'insertdatetime media nonbreaking save table contextmenu directionality jbimages',
                'emoticons template paste textcolor colorpicker textpattern imagetools'
            ],
            toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages',
            toolbar2: 'print preview | forecolor backcolor emoticons',
            image_advtab: true,

            relative_urls: false
        });
        </script>
    </head>
    <body>
        <textarea></textarea>
    </body>
</html>
