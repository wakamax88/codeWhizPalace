<?php include $this->resolve('partials/_headerApp.php'); ?>
<section>
    <div class="container-fluid">
        <form class="" method="post">
            <?php include $this->resolve('partials/_csrf.php'); ?>
            <div class="row g-3 align-items-center mb-3">
                <div class="col-4 text-end">
                    <label for="theme">Theme</label>
                </div>
                <div class="col-6">
                    <select class="form-select" name="theme" id="theme">
                        <option value="">Select Theme</option>
                        <?php foreach ($contents['themes'] as $key => $theme) { ?>
                            <option value="<?= e($theme['id'] ?? '') ?>" <?= e($theme['id'] ?? '') == $contents['themeActive']['id'] ? 'selected' : '' ?>><?= ucfirst(e($theme['name'] ?? '')) ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary mx-3">Update</button>
            </div>
        </form>
    </div>
</section>

<?php include $this->resolve('partials/_footerApp.php'); ?>