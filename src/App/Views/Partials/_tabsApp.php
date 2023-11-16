<div class="col">
    <ul class="nav nav-pills nav-justified">
        <?php foreach ($tabs as $key => $tab) { ?>
            <li class="nav-item">
                <a class="nav-link <?= $tab == $tabName ? 'active' : '' ?>" href="/app/<?= strtolower($subTitle) ?>/<?= strtolower($tab) ?>"><?= "{$subTitle} {$tab}" ?></a>
            </li>
        <?php } ?>
    </ul>
</div>