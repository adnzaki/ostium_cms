<div class="menu">
    <ul class="list">
        <li class="header">MAIN NAVIGATION</li>
        <li class="<?= menu_active('home') ?>">
            <a href="<?php echo base_url('home') ?>">
                <i class="material-icons">home</i>
                <span>Home</span>
            </a>
        </li>
        <li class="<?= menu_active('post') ?>">
            <a href="<?php echo base_url('post') ?>">
                <i class="material-icons">filter_none</i>
                <span>Posts</span>
            </a>
        </li>
        <li class="<?= menu_active('category') ?>">
            <a href="<?php echo base_url('category-tag') ?>">
                <i class="material-icons">extension</i>
                <span>Kategori & Tag</span>
            </a>
        </li>
    </ul>
</div>
