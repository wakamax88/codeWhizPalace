<!-- Model Discussion Card Blog  -->
<div class="col">
    <?php var_dump($row) ?>
    <div class="card" id="<?= $tabTitle ?? '' ?>_<?= e($row['id'] ?? '') ?>">
        <div class="card-header d-flex">
            <div>
                <p class="text-primary card-text mb-0"><?= e($row['category'] ?? '') ?></p>
                <h4 class="card-title"><?= e($row['title'] ?? '') ?></h4>
            </div>
            <div class="ms-auto">
                <p class="text-muted">Date</p>
            </div>
        </div>
        <div class="card-body p-4">
            <div class="card">
                <div class="card-header d-flex">
                    <div>
                        <p class="fw-bold mb-0">John Smith</p>
                    </div>
                    <div class="ms-auto">
                        <p class="text-muted">Date</p>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <p class="card-text"><?= e($row['lastComment'] ?? '') ?></p>
                    </div>
                </div>
            </div>

        </div>
        <div class="card-footer d-flex">
            <div>
                <p class="fw-bold mb-0"><?= e($row['discussionProfileName'] ?? '') ?></p>
                <p class="text-muted mb-0">Erat netus</p>
            </div>

            <div class="ms-auto display-6">
                <span><?= e($row['nbComment'] ?? '') ?></span>
                <i class="fa-regular fa-comment"></i>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-primary cwp-option-btn" aria-expanded="true" data-bs-toggle="dropdown" data-bs-auto-close="true" type="button"><i class="fa-solid fa-ellipsis-vertical"></i></button>
            <div class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                <a class="dropdown-item cwp-edit-option-link" href="#">First Item</a>
                <a class="dropdown-item cwp-delete-option-link" href="#">Second Item</a>
            </div>
        </div>
    </div>
</div>
<!-- Model Post Card Blog  -->