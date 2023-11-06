<div class="col">

    <?php if (array_key_exists('info', $alert)) { ?>
        <div class="alert alert-info alert-dismissible d-flex align-items-center" role="alert">
            <span class="me-3"><i class="fa-solid fa-circle-info"></i></span>
            <span class="text-uppercase"><?= e($alert['info']) ?></span>
            <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>

    <?php if (array_key_exists('danger', $alert)) { ?>
        <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
            <span class="me-3"><i class="fa-solid fa-skull-crossbones"></i></span>
            <span class="text-uppercase"><?= e($alert['danger']) ?></span>
            <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>

    <?php if (array_key_exists('warning', $alert)) { ?>
        <div class="alert alert-warning alert-dismissible d-flex align-items-center" role="alert">
            <span class="me-3"><i class="fa-solid fa-triangle-exclamation"></i></span>
            <span class="text-uppercase"><?= e($alert['warning']) ?></span>
            <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>

    <?php if (array_key_exists('success', $alert)) { ?>
        <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
            <span class="me-3"><i class="fa-solid fa-circle-check"></i></span>
            <span class="text-uppercase"><?= e($alert['success']) ?></span>
            <button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="alert"></button>
        </div>
    <?php } ?>
</div>