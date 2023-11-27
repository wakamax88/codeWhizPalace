<form class="text-center">
    <?php include $this->resolve('partials/_csrf.php'); ?>

    <!-- Title -->
    <div class="text-start mb-3">
        <label class="form-label text-light">Title</label>
        <input class="form-control" type="text" name="title" id="title" require>

        <div class="text-muted">

        </div>

    </div>

    <!-- Category -->
    <div class="text-start mb-3">
        <label class="form-label text-light" for="category">Category</label>
        <select class="form-select cwp-category" aria-label="Default select example" id="category" require>
        </select>
    </div>

    <!-- Content -->
    <div class="text-start mb-3">
        <label class="form-label text-light">Content </label>
        <textarea class="form-control" name="content" id="content" rows="3" require></textarea>

        <div class="text-muted">

        </div>

    </div>
</form>