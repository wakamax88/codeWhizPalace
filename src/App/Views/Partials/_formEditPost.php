<form class="text-center" method="post">
    <?php include $this->resolve('partials/_csrf.php'); ?>
    <input type="hidden" name="contenu_wysiwyg" id="contenu_wysiwyg" />

    <!-- Title -->
    <div class="text-start mb-3">
        <label class="form-label text-light">Title</label>
        <input value="<?= e($oldFormData['title'] ?? '') ?>" class="form-control" type="text" name="title" id="title">

        <div class="text-muted">

        </div>

    </div>

    <!-- Thumbnail -->
    <div class="text-start mb-3">
        <label class="form-label text-light">Thumbnail</label>
        <input class="form-control" type="file" name="thumbnail" accept="image/png, image/jpeg">

        <div class="text-muted">

        </div>

    </div>

    <!-- Alt -->
    <div class="text-start mb-3">
        <label class="form-label text-light">Alt</label>
        <input class="form-control" type="text" name="alt">

        <div class="text-muted">

        </div>

    </div>

    <!-- Exercpt -->
    <div class="text-start mb-3">
        <label class="form-label text-light">Exercpt </label>
        <textarea class="form-control" name="exercpt" id="exercpt" rows="3"></textarea>

        <div class="text-muted">

        </div>

    </div>
    <!-- Content -->
    <div class="text-start mb-3">
        <div id="content">

        </div>

        <div class="text-muted">

        </div>

    </div>


    <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit">S'inscrire</button></div>
</form>