<!-- List -->
<div class="card shadow">
    <?php include $this->resolve('partials/_csrf.php'); ?>
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold"><?= $tabName . ' List' ?></p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 text-nowrap">
                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                    <label class="form-label">Show
                        <select id="show" class="d-inline-block form-select form-select-sm">
                            <?php foreach ($shows as $key => $show) { ?>
                                <option value="<?= $show ?>" <?= $show == $limit ? 'selected' : '' ?>><?= $show ?></option>
                            <?php } ?>
                        </select>
                    </label>
                </div>
            </div>
            <div class="col-md-6">
                <div id="dataTable_filter" class="text-md-end dataTables_filter"><label class="form-label"><input class="form-control form-control-sm" type="search" aria-controls="dataTable" placeholder="Search" /></label></div>
            </div>
        </div>
        <div id="dataTable" class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
            <table id="dataTable" class="table my-0">
                <thead>
                    <tr>
                        <?php foreach ($tableHeaders as $key => $tableHeader) { ?>
                            <th><?= $tableHeader ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php ($type == 'account') && include $this->resolve('partials/_accountTable.php'); ?>
                    <?php ($type == 'category') && include $this->resolve('partials/_categoryTable.php'); ?>



                </tbody>
                <tfoot>
                    <tr>
                        <?php foreach ($tableHeaders as $key => $tableHeader) { ?>
                            <th><?= $tableHeader ?></th>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 align-self-center">
                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                    Showing <span><?= $offset + 1 ?></span> to <span><?= $limit * $pageActive ?></span> of <span><?= $numberRow ?></span></p>
                </p>
            </div>
            <div class="col-md-6">
                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
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
                                    <a class="page page-link" href="/app/admin/<?= strtolower($tabName) ?>/?page=<?= $page ?>"><?= $page ?></a>
                                </li>
                            <?php } ?>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- List -->