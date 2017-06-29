<?php

?>
<div class="modal" id="modal-resize-image" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Resize Image</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-8">Current Width: <?=$image_size_width?></div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-8">Current Width: <?=$image_size_height?></div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-sm-12">&nbsp;</div>
                </div>
                <form method="post" action="/image" id="resize_form">
                    <input type="hidden" name="_METHOD" value="put">
                    <div class="row">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="image_width">New Width</label>
                                <input type="text" name="image_width" id="image_width" class="form-control" size="8" value="<?=$image_size_width?>">
                            </div>
                        </div>
                        <div class="col-sm-2">&nbsp;</div>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">&nbsp;</div>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <label for="image_height">New Height</label>
                                <input type="text" name="image_height" id="image_height" class="form-control" size="8" value="<?=$image_size_height?>">
                            </div>
                        </div>
                        <div class="col-sm-2">&nbsp;</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button form="resize_form" class="btn btn-default"> Resize</button>
                <button class="btn btn-default" data-dismiss="modal"> Cancel</button>
            </div>
        </div>
    </div>
</div>
