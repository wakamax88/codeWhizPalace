<form class="text-center">
    <?php include $this->resolve('partials/_csrf.php'); ?>
    <input type="hidden" name="content" id="content" />

    <!-- Title -->
    <div class="text-start mb-3">
        <label class="form-label text-light">Title</label>
        <input class="form-control" type="text" name="title" id="title">

        <div class="text-muted">

        </div>

    </div>
    <div>
        <select class="form-select" aria-label="Default select example" id="category">
        </select>
    </div>
    <!-- Thumbnail -->
    <div class="text-start mb-3">
        <label class="form-label text-light">Thumbnail</label>
        <input id="thumbnail" class="form-control" type="file" name="thumbnail" accept="image/png, image/jpeg">

        <div class="text-muted">

        </div>

    </div>

    <!-- Alt -->
    <div class="text-start mb-3">
        <label class="form-label text-light">Alt</label>
        <input class="form-control" type="text" name="alt" id="alt">

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
        <div id="contentVisual">

        </div>

        <div class="text-muted">

        </div>

    </div>
</form>