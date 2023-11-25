<?php include $this->resolve('partials/_headerApp.php'); ?>
<!-- Start Main Content Area -->
<section>
    <div class="container-fluid">
        <!-- Tab -->
        <div class="row">
            <?php include $this->resolve('partials/_tabsApp.php'); ?>

        </div>
        <hr>

        <!-- News -->
        <div class="row">
            <div class="col text-center">
                <p>LAST </p>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php if (!empty($contents) && (!empty($contents['news']))) { ?>
                <?php foreach ($contents['news'] as $key => $row) { ?>
                    <?php ($subTitle == 'Forum') && include $this->resolve('partials/_discussionCard.php'); ?>
                    <?php ($subTitle == 'Blog') && include $this->resolve('partials/_postCard.php'); ?>
                    <?php ($subTitle == 'Resource') && include $this->resolve('partials/_linkCard.php'); ?>
                <?php } ?>
            <?php } ?>
        </div>
        <hr>

        <!-- Bests -->
        <div class="row">
            <div class="col text-center">
                <p>BEST</p>
            </div>
        </div>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php if (!empty($contents) && (!empty($contents['bests']))) { ?>
                <?php foreach ($contents['bests'] as $key => $row) { ?>
                    <?php ($subTitle == 'Forum') && include $this->resolve('partials/_discussionCard.php'); ?>
                    <?php ($subTitle == 'Blog') && include $this->resolve('partials/_postCard.php'); ?>
                    <?php ($subTitle == 'Resource') && include $this->resolve('partials/_linkCard.php'); ?>
                <?php } ?>
            <?php } ?>
        </div>
    </div>

</section>


<?php include $this->resolve('partials/_footerApp.php'); ?>