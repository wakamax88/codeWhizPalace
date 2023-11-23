<!-- Model Link Card Ressource  -->
<div class="col">
    <div class="card" style="height: 50px;">
        <div class="row align-items-center g-0">
            <div class="col col-md-2">
                <a href="<?= e($row['url'] ?? '') ?>" target="_blank">
                    <img style="height: 46px;" class="img-fluid rounded-start" src="/assets/img/link/<?= e($row['image'] ?? '') ?>" />
                </a>
            </div>
            <div class="col col-md-9 text-center">
                <div class="card-body py-0">
                    <h5><?= e($row['name'] ?? '') ?></h5>
                </div>
            </div>

            <div class="col col-md-1 d-flex justify-content-end">
                <button class="btn btn-primary btn-lg rounded-0" type="button" data-bs-target="#collapseExample" data-bs-toggle="collapse"><i class="fa-solid fa-caret-down"></i></button>
            </div>
        </div>
    </div>
    <div id="collapseExample" class="collapse">
        <div class="card card-body">
            <p><small><?= e($row['date'] ?? '') ?></small></p>
            <p><?= e($row['description'] ?? '') ?></p>
        </div>
    </div>
</div>
<!-- Model Link Card Ressource  -->