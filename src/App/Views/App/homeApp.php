<?php include $this->resolve('partials/_headerApp.php'); ?>
<!-- Start Main Content Area -->
<!-- <?php var_dump($_SESSION); ?> -->
<section class="home">
    <div class="container-fluid">
        <!-- Tabs -->
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <?php foreach ($tabs as $key => $tab) { ?>
                        <!-- <?php var_dump($key) ?> -->
                        <li class="nav-item" role="presentation">
                            <a class="nav-link <?= $key == 'tab-1' ? 'active' : '' ?>" data-bs-toggle="tab" aria-current="page" href="#<?= $key ?>"><?= $tab['tabName'] ?? '' ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <hr>
        <!-- Tabs Panel -->
        <div class="row">
            <div class="tab-content">
                <?php foreach ($tabs as $key => $tab) { ?>
                    <div id="<?= $key ?>" class="tab-pane <?= $key == 'tab-1' ? 'active' : 'fade' ?>" role="tabpanel">
                        <p><?= $tab['tabName'] ?? '' ?></p>
                        <?php ($tab['tabName'] == 'Categories') && include $this->resolve('partials/_tables.php'); ?>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>
</section>
<?php include $this->resolve('partials/_footerApp.php'); ?>