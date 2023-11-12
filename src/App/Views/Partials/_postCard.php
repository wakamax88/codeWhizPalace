<!-- Model Post Card Blog  -->
<div class="col">
    <div class="card" id="<?= $tabTitle ?>_<?= e($post['id'] ?? '') ?>">
        <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="<?= '/assets/img/post/webdev/' . e($post['thumbnail']) ?>" />
        <div class="card-body p-4">
            <div class="d-flex">
                <div>
                    <p class="text-primary card-text mb-0">Article</p>
                    <h4 class="card-title"><?= e($post['title'] ?? '') ?></h4>
                </div>
                <div class="ms-auto">
                    <p class="text-muted">Date</p>
                </div>
            </div>

            <p class="card-text"><?= e($post['exercpt'] ?? '') ?></p>
            <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" />
                <div>
                    <p class="fw-bold mb-0">John Smith</p>
                    <p class="text-muted mb-0">Erat netus</p>
                </div>
                <div class="ms-auto display-6">
                    <i class="fa-regular fa-thumbs-up like"></i>
                    <span><?= e($post['like'] ?? '') ?></span>
                </div>
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