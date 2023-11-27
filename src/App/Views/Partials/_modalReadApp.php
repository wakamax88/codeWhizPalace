<div id="modal-read" class="modal fade cwp-hidden" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal Title</h4>
                <button class="btn-close cwp-close-modal" type="button"></button>
            </div>
            <div class="modal-body">
                <?php ($subTitle == 'Forum') && include $this->resolve('partials/_formComment.php'); ?>
            </div>
            <div class="modal-footer">
                <button class="btn btn-light cwp-close-modal" type="button">Close</button>
                <button class="btn btn-primary <?= $subTitle == 'Forum' ? '' : 'hidden' ?>  cwp-action" type="button">Send</button>
            </div>
        </div>
    </div>
</div>