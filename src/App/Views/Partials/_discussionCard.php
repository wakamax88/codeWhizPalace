<!-- Model Discussion Card Blog  -->
<div class="col">
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
                    <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="25" height="25" src="/assets/img/profile/<?= e($row['commentProfileImage'] ?? 'profile_default.png') ?>" />
                    <div>
                        <p class="fw-bold mb-0">John Smith</p>
                    </div>
                    <div class="ms-auto">
                        <p class="text-muted">Date</p>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <p class="card-text"><?= e($row['commentContent'] ?? '') ?></p>
                    </div>
                </div>
            </div>

        </div>

        <div class="card-footer d-flex">
            <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="/assets/img/profile/<?= e($row['profileImage'] ?? 'profile_default.png') ?>" />
            <div>
                <p class="fw-bold mb-0"><?= e($row['profilePseudo'] ?? '') ?></p>
                <p class="text-muted mb-0">Erat netus</p>
            </div>

            <div class="ms-auto">
                <span class="me-2"><?= e($row['commentNb'] ?? '') ?></span>
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