<?php

?>
<form role="dialog" action="/resize/<?=$image_id ?>" method="post" id="preview_form">
<input type="hidden" name="_METHOD" value="put">
<input type="hidden" name="preview" value="<?=$image_preview?>">
<div class="container">
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-3">&nbsp;</div>
        <div class="col-sm-6 table-bordered">
            <div class="row">
                <div class="col-sm-12"><h3>Re-Size Image</h3></div>
            </div>
            <div class="row">
                <div class="col-sm-12"><strong>Image ID: <?=$image_guid?></strong></div>
            </div>
            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-sm-2">&nbsp;</div>
                <div class="col-sm-4">
                    <label for="image_width">Width:</label>
                    <input type="number" value="<?=$image_width?>" name="image_width" id="image_width" class="form-control">
                </div>
                <div class="col-sm-4">
                    <label for="image_height">Height:</label>
                    <input type="number" value="<?=$image_height?>" name="image_height" id="image_height" class="form-control">
                </div>
                <div class="col-sm-2">&nbsp;</div>
            </div>
            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
            </div>
        </div>
        <div class="col-sm-3">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-3">&nbsp;</div>
        <div class="col-sm-6 text-center">
            <a href="/image/<?=$image_id?>" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
            <button form="preview_form" type="submit" class="btn btn-default" name="action_preview" value="1">
                <span class="glyphicon glyphicon-eye-open"></span> Preview</button>
            <button form="preview_form" type="submit" class="btn btn-default <?=$hide_save?>" name="action_save" value="1">
                <span class="glyphicon glyphicon-ok-circle"></span> Save</button>
        </div>
        <div class="col-sm-3">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
</div>
</form>
<div class="container-fluid text-center"><img src="<?=$image_path_full?>"></div>
    