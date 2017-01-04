<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test tiny mce</title>
        <script src="<?php echo $asset?>plugins/tinymce_prod/tinymce.min.js"></script>

        <!-- <script src="<?php //echo $asset ?>plugins/tinymce/js/tinymce/tinymce.dev.js"></script>
        <script src="<?php //echo $asset ?>plugins/tinymce/js/tinymce/plugins/table/plugin.dev.js"></script>
        <script src="<?php //echo $asset ?>plugins/tinymce/js/tinymce/plugins/paste/plugin.dev.js"></script>
        <script src="<?php //echo $asset ?>plugins/tinymce/js/tinymce/plugins/wordcount/plugin.js"></script>
        <script src="<?php //echo $asset ?>plugins/tinymce/js/tinymce/plugins/spellchecker/plugin.dev.js"></script> -->
        <script type="text/javascript">
            tinymce.init({
                selector:"textarea"
            });
        </script>
    </head>
    <body>
        <textarea></textarea>
    </body>
</html>
