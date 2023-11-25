<!-- Model Discussion Card Blog  -->
<div class="col">
    <div class="card h-100" id="<?= $tabTitle ?? '' ?>_<?= e($row['id'] ?? '') ?>">
        <div class="card-header d-flex">
            <div>
                <p class="text-primary card-text mb-0"><?= e($row['category'] ?? '') ?></p>
                <h4 class="card-title"><?= e($row['title'] ?? '') ?></h4>
            </div>
        </div>
        <div class="card-body p-4">
            <!-- Model Comment Card -->
            <div class="card border-primary">
                <div class="card-header d-flex align-items-center">
                    <img id="commentProfileId_<?= e($row['commentProfileId'] ?? '') ?>" class="rounded-circle flex-shrink-0 me-3 fit-cover" width="30" height="30" src="/assets/img/profile/<?= e($row['commentProfileImage'] ?? 'profile_default.png') ?>" />
                    <div>
                        <p class="fw-bold mb-0"><?= e($row['commentProfilePseudo'] ?? '') ?></p>
                    </div>
                    <div class="ms-auto">
                        <p class="text-muted mb-0"><small><?= e($row['commentDate'] ?? '') ?></small></p>
                    </div>
                </div>
                <div class="card-body">
                    <div>
                        <p class="card-text <?= e($row['commentDate'] == null ? 'text-light' : '') ?>"><?= e($row['commentContent'] ?? 'Pas encore de commentaire') ?></p>
                    </div>
                </div>
            </div>
            <!-- Model Comment Card -->
        </div>

        <div class="card-footer d-flex align-items-center">
            <img id="profileId_<?= e($row['profileId'] ?? '') ?>" class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="/assets/img/profile/<?= e($row['profileImage'] ?? 'profile_default.png') ?>" />
            <div>
                <p class="fw-bold mb-0"><?= e($row['profilePseudo'] ?? '') ?></p>
                <p class="text-muted mb-0"><small><?= e($row['date'] ?? '') ?></small></p>
            </div>

            <div class="ms-auto">
                <button class="btn btn-primary">
                    <span class="me-2"><?= e($row['commentCount'] ?? '') ?></span>
                    <i class="fa-regular fa-comment"></i>
                </button>

            </div>
        </div>
        <div class="dropdown position-absolute cwp-dropdown-option">
            <button class="btn btn-primary cwp-option-btn" aria-expanded="true" data-bs-toggle="dropdown" data-bs-auto-close="true" type="button"><i class="fa-solid fa-ellipsis-vertical"></i></button>
            <div class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                <a class="dropdown-item cwp-edit-option-link" href="#">Edit Discussion</a>
                <a class="dropdown-item cwp-delete-option-link" href="#">Delete Discussion</a>
            </div>
        </div>
    </div>
</div>
<!-- Model Post Card Blog  -->