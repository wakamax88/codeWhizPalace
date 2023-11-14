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
        <div class="row justify-content-between py-3">
            <div class="col-auto text-nowrap">
                <label class="form-label">Show
                    <select class="d-inline-block form-select form-select-sm">
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </label>
            </div>
            <div class="col-auto">
                <label class="form-label">
                    <input class="form-control form-control-sm" type="search" placeholder="Search" />
                </label>
            </div>
            <div class="col-auto">
                <button id="add" class="btn btn-primary <?= $_SESSION['profile']['id'] != null ? '' : 'disabled' ?>" type="button"><i class="fa-solid fa-plus"></i></button>
            </div>
        </div>
        <!-- Body -->
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php foreach ($contents as $key => $row) { ?>
                <?php ($subTitle == 'Forum') && include $this->resolve('partials/_discussionCard.php'); ?>
                <?php ($subTitle == 'Blog') && include $this->resolve('partials/_postCard.php'); ?>
            <?php } ?>
        </div>
        <!-- Footer -->
        <nav class="py-3">
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
    <?php include $this->resolve('partials/_modalCreateApp.php'); ?>
    <?php include $this->resolve('partials/_modalReadApp.php'); ?>
    <?php include $this->resolve('partials/_modalDeleteApp.php'); ?>
    <?php include $this->resolve('partials/_modalEditApp.php'); ?>


</section>
<?php include $this->resolve('partials/_footerApp.php'); ?>