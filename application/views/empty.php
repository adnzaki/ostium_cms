<?php
/**
 * Ostium CMS
 * A content management system for Wolestech based website
 * View:: main
 * Halaman ini adalah halaman utama yang digunakan untuk menampilkan beberapa informasi seputar website
 * @copyright   Copyright (c) 2017, Wolestech | Adnan Zaki (https://wolestech.com/)
 * @license     https://github.com/adnzaki/ostium_cms/blob/master/LICENSE
 * @author      Adnan Zaki
 * @link        http://wolestech.com
 * @version     OstiumCMS v0.0.3
 */
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php echo $main_title ?></title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <?php $this->view('element/style') ?>
</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <?php $this->view('content/loader') ?>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->

    <!-- Top Section -->
    <?php $this->view('element/top_section') ?>
    <!-- # END Top Section -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <?php $this->view('element/user_info') ?>
            <!-- #User Info -->
            <!-- Menu -->
            <?php $this->view('element/menu') ?>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <?php $this->view('element/footer') ?>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->
        <?php $this->view('element/right_sidebar') ?>
        <!-- #END# Right Sidebar -->
    </section>

    <section class="content" id="message">
        <h3>Maaf halaman yang anda cari tidak ditemukan</h3>
        <h4>Kesalahan: Argumen "<?php echo $param ?>" tidak ada, silakan cek url yang anda masukkan</h4>
    </section>

    <?php $this->view('element/script') ?>
</body>

</html>
