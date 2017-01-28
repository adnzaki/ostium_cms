<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Test Post</title>

    </head>
    <body>
        <?php
        foreach ($all_post->result() as $post) {
            echo $post->id_post." - ".$post->judul_post."<br>";
        }
        ?>
    </body>
</html>
