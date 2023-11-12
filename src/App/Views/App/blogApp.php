<?php include $this->resolve('partials/_headerApp.php'); ?>
<!-- Start Main Content Area -->
<?php
if (isset($blog)) {
    extract($blog);
}
var_dump($subTitle);
?>
<section>
    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <ul class="nav nav-tabs nav-justified" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" data-bs-toggle="tab" aria-current="page" href="#tab-1">Blog</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-2">Link</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" data-bs-toggle="tab" href="#tab-3">Link</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link disabled" data-bs-toggle="tab" href="#tab-4" aria-disabled="true">Admin</a>
                    </li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="tab-content">
                <div id="tab-1" class="tab-pane active" role="tabpanel">
                    <p>Content for tab 1.</p>
                    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
                        <?php foreach ($postsView as $post) { ?>
                            <?php $tabTitle = "postsView" ?>
                            <?php include $this->resolve('partials/_postCard.php'); ?>
                        <?php } ?>
                    </div>
                </div>
                <div id="tab-2" class="tab-pane fade" role="tabpanel">
                    <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
                        <?php foreach ($posts as $post) { ?>
                            <?php $tabTitle = "posts" ?>
                            <?php include $this->resolve('partials/_postCard.php'); ?>
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
                <div id="tab-3" class="tab-pane fade" role="tabpanel">
                    <p>Content for tab 3.</p>
                </div>
                <div id="tab-4" class="tab-pane fade" role="tabpanel">
                    <p>Admin</p>
                </div>
            </div>
        </div>

    </div>
    <?php include $this->resolve('partials/_modalReadApp.php'); ?>
    <?php include $this->resolve('partials/_modalDeleteApp.php'); ?>
    <?php include $this->resolve('partials/_modalEditApp.php'); ?>
</section>


<?php include $this->resolve('partials/_footerApp.php'); ?>