<!-- Model Post Card Blog  -->
<div class="col">

    <div class="card shadow" id="<?= strtolower($type) ?>_<?= e($row['id'] ?? '') ?>">
        <img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="/assets/img/post/<?= capitalizeFirstLetter(e($row['categoryName'] ?? ''))  ?>/<?= e($row['thumbnail']) ?>" />
        <div class="card-body p-4">
            <div class="d-flex">
                <div>
                    <p class="text-primary card-text mb-0"><?= e($row['categoryName'] ?? '') ?></p>
                    <h4 class="card-title"><?= e($row['title'] ?? '') ?></h4>
                </div>
                <div class="ms-auto">
                    <p class="text-muted">Date</p>
                </div>
            </div>

            <p class="card-text" style="text-align: justify;"><?= e($row['excerpt'] ?? '') ?></p>
            <div class="d-flex">
                <img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" />
                <div>
                    <p class="fw-bold mb-0"><?= e($row['profilePseudo'] ?? '') ?></p>
                    <p class="text-muted mb-0">Erat netus</p>
                </div>
                <div class="ms-auto display-6">
                    <button class="btn btn-primary btn-lg <?= $_SESSION['profile']['id'] != null && $_SESSION['profile']['id'] != e($row['profileId'] ?? '') ? '' : 'disabled' ?> like">
                        <span><?= e($row['voteNb'] ?? '') ?></span>
                        <i class="<?= e($row['hasVoted'] ?? '') == 1 ? 'fa-solid' : 'fa-regular' ?>  fa-thumbs-up ms-2"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="dropdown">
            <button class="btn btn-primary cwp-option-btn <?= $_SESSION['profile']['id'] != null ? '' : 'disabled' ?>" aria-expanded="true" data-bs-toggle="dropdown" data-bs-auto-close="true" type="button"><i class="fa-solid fa-ellipsis-vertical"></i></button>
            <div class="dropdown-menu dropdown-menu-end" data-bs-popper="none">
                <a class="<?= $_SESSION['profile']['id'] == e($row['profileId'] ?? '') ? '' : 'disabled' ?> dropdown-item cwp-edit-option-link" href="#">Post Edit</a>
                <a class="<?= $_SESSION['profile']['id'] == e($row['profileId'] ?? '') ? '' : 'disabled' ?> dropdown-item cwp-delete-option-link" href="#">Post Delete</a>
            </div>
        </div>
    </div>
</div>
<!-- Model Post Card Blog  -->