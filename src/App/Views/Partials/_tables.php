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
                    <?php foreach ($tab['tabContent'] as $key => $content) { ?>
                        <tr>
                            <td><?= $content['name'] ?? '' ?></td>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="/assets/img/category/<?= $content['thumbnail'] ?? 'avatar.jpg' ?>" /></td>
                            <td class="text-truncate" style="max-width: 150px;"><?= $content['description'] ?? '' ?></td>
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
                <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Showing 1 to 10 of 27</p>
            </div>
            <div class="col-md-6">
                <nav class="d-lg-flex justify-content-lg-end dataTables_paginate paging_simple_numbers">
                    <ul class="pagination">
                        <li class="page-item disabled">
                            <a class="page-link" aria-label="Previous" href="#"><span aria-hidden="true">«</span></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" aria-label="Next" href="#"><span aria-hidden="true">»</span></a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- List -->