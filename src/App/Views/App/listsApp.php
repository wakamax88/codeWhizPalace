<?php include $this->resolve('partials/_headerApp.php'); ?>
<!-- Start Main Content Area -->
<section>
    <div class="container-fluid">
        <!-- Tab -->
        <div class="row">
            <?php include $this->resolve('partials/_tabsApp.php'); ?>

        </div>
        <hr>
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php foreach ($contents as $key => $row) { ?>
                <?php ($subTitle == 'Forum') && include $this->resolve('partials/_discussionCard.php'); ?>
                <?php ($subTitle == 'Blog') && include $this->resolve('partials/_postCard.php'); ?>
            <?php } ?>
        </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</section>
<?php include $this->resolve('partials/_footerApp.php'); ?>