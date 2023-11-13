<div class="col">
    <ul class="nav nav-pills nav-justified">
        <?php foreach ($sTabs as $key => $sTab) { ?>
            <li class="nav-item">
                <a class="nav-link <?= $sTab == $tabName ? 'active' : '' ?>" href="/app/<?= strtolower($subTitle) ?>/<?= strtolower($sTab) ?>"><?= "{$subTitle} {$sTab}" ?></a>
            </li>
        <?php } ?>
    </ul>
</div>