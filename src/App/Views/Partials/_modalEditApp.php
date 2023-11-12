<div id="modal-edit" class="modal fade cwp-hidden" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Post</h4>
                <button class="btn-close cwp-close-modal" type="button"></button>
            </div>
            <div class="modal-body">
                <?php include $this->resolve('partials/_formEditPost.php'); ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light cwp-close-modal" type="button">Cancel</button>
                <button class="btn btn-primary cwp-valid" type="button">Save</button>
            </div>
        </div>
    </div>
</div>