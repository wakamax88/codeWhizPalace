<div>
    <ul id="commentUl">

    </ul>
</div>
<form class="text-center">
    <?php include $this->resolve('partials/_csrf.php'); ?>
    <div class="text-start mb-3">
        <label class="form-label text-light">Comment</label>
        <textarea class="form-control" name="comment" id="comment" rows="3" require></textarea>

        <div class="text-muted">

        </div>

    </div>
</form>