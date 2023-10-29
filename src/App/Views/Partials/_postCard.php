<!-- Model Post Card Blog  -->
<div class="col">
    <?php var_dump($post) ?>
    <div class="card"><img class="card-img-top w-100 d-block fit-cover" style="height: 200px;" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" />
        <div class="card-body p-4">
            <p class="text-primary card-text mb-0">Article</p>
            <h4 class="card-title"><?= e($post['title'] ?? '') ?></h4>
            <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
            <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="https://cdn.bootstrapstudio.io/placeholders/1400x800.png" />
                <div>
                    <p class="fw-bold mb-0">John Smith</p>
                    <p class="text-muted mb-0">Erat netus</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Model Post Card Blog  -->