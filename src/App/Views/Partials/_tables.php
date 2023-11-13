<!-- List -->
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold"><?= $tab['tabName'] . ' List' ?></p>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6 text-nowrap">
                <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable">
                    <label class="form-label">Show</label>
                    <select class="d-inline-block form-select form-select-sm">
                        <option value="10" selected>10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
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
                        <?php foreach ($tab['tableHeaders'] as $key => $tableHeader) { ?>
                            <th><?= $tableHeader ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tab['tabContent']['rows'] as $key => $row) { ?>
                        <tr>
                            <td><?= $row['name'] ?? '' ?></td>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="/assets/img/category/<?= $row['thumbnail'] ?? 'avatar.jpg' ?>" /></td>
                            <td class="text-truncate" style="max-width: 150px;"><?= $row['description'] ?? '' ?></td>
                            <td><i class="fa-regular fa-pen-to-square"></i></td>
                            <td><i class="fa-regular fa-trash-can"></i></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <tfoot>
                    <tr>
                        <?php foreach ($tab['tableHeaders'] as $key => $tableHeader) { ?>
                            <th><?= $tableHeader ?></th>
                        <?php } ?>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-md-6 align-self-center">
                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">
                    Showing <span><?= $tab['tabContent']['offset'] + 1 ?></span> to <span>10</span> of <span id="nbElement"><?= $tab['tabContent']['nbRow'] ?></span></p>
            </div>
            <div class="col-md-6">
                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">
                        <?php for ($page = 0; $page <= $tab['tabContent']['nbPage'] + 1; $page++) { ?>
                            <?php if ($page == 0) { ?>
                                <li class="page-item <?= $tab['tabContent']['currentPage'] == 1 ? 'disabled' : '' ?>">
                                    <a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a>
                                </li>
                            <?php } elseif ($page == $tab['tabContent']['nbPage'] + 1) { ?>
                                <li class="page-item <?= $tab['tabContent']['currentPage'] == $tab['tabContent']['nbPage']  ? 'disabled' : '' ?>">
                                    <a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a>
                                </li>
                            <?php } else { ?>
                                <li class="page-item <?= $tab['tabContent']['currentPage'] == $page ? 'active' : '' ?>">
                                    <a class="page-link <?= $tab['tabContent']['currentPage'] ?>" href="#"><?= $page ?></a>
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