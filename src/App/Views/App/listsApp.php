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
                    <select id="show" class="d-inline-block form-select form-select-sm">
                        <?php foreach ($shows as $key => $show) { ?>
                            <option value="<?= $show ?>" <?= $show == $limit ? 'selected' : '' ?>><?= $show ?></option>
                        <?php } ?>
                    </select>
                </label>
            </div>
            <div class="col-auto">
                <label class="form-label">
                    <input class="form-control form-control-sm" type="search" placeholder="Search" />
                </label>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary <?= $_SESSION['profile']['id'] != null ? '' : 'disabled' ?> cwp-add" type="button"><i class="fa-solid fa-plus"></i></button>
            </div>
        </div>
        <!-- Body -->
        <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
            <?php if (!empty($contents)) { ?>
                <?php foreach ($contents as $key => $row) { ?>
                    <?php ($subTitle == 'Forum') && include $this->resolve('partials/_discussionCard.php'); ?>
                    <?php ($subTitle == 'Blog') && include $this->resolve('partials/_postCard.php'); ?>
                    <?php ($subTitle == 'Resource') && include $this->resolve('partials/_linkCard.php'); ?>
                <?php } ?>
            <?php } ?>

        </div>
        <!-- Footer -->
        <div class="p-3 row justify-content-between align-items-center">
            <div class="col-auto">
                <p>
                    Showing <span><?= $offset + 1 ?></span> to <span><?= $limit * $pageActive ?></span> of <span><?= $numberRow ?></span></p>
            </div>
            <div class="col-auto">
                <nav class="d-flex ">
                    <ul class="pagination">
                        <?php for ($page = 0; $page <= $pageMax + 1; $page++) { ?>
                            <?php if ($page == 0) { ?>
                                <li class="page-item <?= $pageActive == 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a>
                                </li>
                            <?php } elseif ($page == $pageMax + 1) { ?>
                                <li class="page-item <?= $pageActive == $pageMax  ? 'disabled' : '' ?>">
                                    <a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a>
                                </li>
                            <?php } else { ?>
                                <li class="page-item <?= $pageActive == $page ? 'active' : '' ?>">
                                    <a class="page page-link" href="/app/<?= strtolower(e($subTitle ?? '')) ?>/lists/?page=<?= $page ?>"><?= $page ?></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <?php include $this->resolve('partials/_modalReadApp.php'); ?>
    <?php include $this->resolve('partials/_modalDeleteApp.php'); ?>
    <?php include $this->resolve('partials/_modalEditApp.php'); ?>


</section>
<?php include $this->resolve('partials/_footerApp.php'); ?>