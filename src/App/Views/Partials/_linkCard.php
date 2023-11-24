<!-- Model Link Card Ressource  -->
<div class="col">
    <div class="card" style="height: 50px;">
        <div class="row align-items-center g-0">
            <div class="col-3 col-md-2">
                <a href="<?= e($row['url'] ?? '') ?>" target="_blank">
                    <img style="height: 46px;" class="img-fluid rounded-start w-100" src="/assets/img/link/<?= e($row['image'] ?? '') ?>" />
                </a>
            </div>
            <div class="col-8 col-md-9 text-center">
                <a href="<?= e($row['url'] ?? '') ?>" class="text-decoration-none" target="_blank">
                    <div class="card-body py-0">
                        <h5 class="fs-6 link-light"><?= e($row['name'] ?? '') ?></h5>
                    </div>
                </a>
            </div>

            <div class="col-1 col-md-1 d-flex justify-content-end">
                <button class="btn btn-primary btn-lg rounded-0" type="button" data-bs-target="#collapseExample_<?= e($row['id'] ?? '') ?>" data-bs-toggle="collapse"><i class="fa-solid fa-caret-down"></i></button>
            </div>
        </div>
    </div>
    <div id="collapseExample_<?= e($row['id'] ?? '') ?>" class="collapse">
        <div class="card card-body">
            <p><?= e($row['categoryName'] ?? '') ?></p>
            <p><small><?= e($row['date'] ?? '') ?></small></p>
            <p><?= e($row['description'] ?? '') ?></p>
            <p>
                <?php for ($star = 0; $star < 5; $star++) { ?>
                    <?php if (e($row['rating'] ?? 0) > $star) { ?>
                        <i class="fa-solid fa-star"></i>
                    <?php } else { ?>
                        <i class="fa-regular fa-star"></i>
                    <?php } ?>
                <?php } ?>
            </p>
        </div>
    </div>
</div>
<!-- Model Link Card Ressource  -->