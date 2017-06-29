<?php

?>
<div class="modal" id="modal-view-image" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Image View</h3>
            </div>
            <div class="modal-body">
                <img src="<?=$image_path_thumb?>">
                <br /><br />
                <img src="<?=$image_path_full?>" class="img-responsive">
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal"> Close</button>
            </div>
        </div>
    </div>
</div>
