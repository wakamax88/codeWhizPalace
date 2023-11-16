<?php include $this->resolve('partials/_headerApp.php'); ?>

<!-- Start Main Content Area -->
<section>
    <div class="container-fluid">
        <!-- Tab -->
        <div class="row">
            <?php include $this->resolve('partials/_tabsApp.php'); ?>
        </div>
        <hr>
        <!-- Headers -->
        <div class="row justify-content-between py-3"> </div>
        <!-- Body -->
        <div class="row">
            <div class="col">
                <?php ($tabName !== 'Home') && include $this->resolve('partials/_tables.php'); ?>
            </div>
        </div>
        <div class="p-3 row justify-content-between align-items-center">
        </div>
    </div>
</section>
<?php include $this->resolve('partials/_footerApp.php'); ?>