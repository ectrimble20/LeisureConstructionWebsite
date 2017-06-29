<?php

?>
    <div class="modal" id="image_<?=$image_id?>" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h3><?=$image_title?></h3>
                    <h4><?=$image_caption?></h4>
                </div>
                <div class="modal-body">
                    <img src="<?=$image_path?>" class="img-responsive" alt="<?=$image_title?>">
                </div>
                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal"> Close</button>
                </div>
            </div>
        </div>
    </div>
