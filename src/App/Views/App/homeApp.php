<?php include $this->resolve('partials/_headerApp.php'); ?>
<!-- Start Main Content Area -->
<?php var_dump($_SESSION) ?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#tab-1">Active</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Link</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Link</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#tab-4" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade active" role="tabpanel">
                    <p>Content for tab 1.</p>
                </div>
                <div id="tab-2" class="tab-pane fade" role="tabpanel">
                    <p>Content for tab 2.</p>
                </div>
                <div id="tab-3" class="tab-pane fade" role="tabpanel">
                    <p>Content for tab 3.</p>
                </div>
                <div id="tab-4" class="tab-pane fade" role="tabpanel">
                    <p>Content for tab 4.</p>
                </div>
            </div>
        </div>

    </div>
</section>
<?php include $this->resolve('partials/_footerApp.php'); ?>