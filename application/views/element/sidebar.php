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

    <!-- POST SETTING -->
    <aside id="post-attribute" class="sidebar post-sidebar">
       <?php $this->view('element/post-setting') ?>
    </aside>
    <?php $this->view('content/popup/filemanager') ?>
    <!-- #END POST SETTING -->

    <!-- Right Sidebar -->
    <?php $this->view('element/right_sidebar') ?>
    <!-- #END# Right Sidebar -->
</section>
