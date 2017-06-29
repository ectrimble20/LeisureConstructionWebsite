<?php

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <button class="btn btn-default" data-toggle="modal" data-target="#modal-view-image"><span
                    class="glyphicon glyphicon-eye-open"></span> View
            </button>
            <a href="/resize/<?=$image_id?>" class="btn btn-default"><span
                    class="glyphicon glyphicon-resize-full"></span> Resize</a>
        </div>
        <div class="col-sm-6 table-bordered">
            <div class="row">
                <div class="col-sm-12"><h3>Edit Image</h3></div>
            </div>
            <div class="row">
                <div class="col-sm-12"><strong>Uploaded By: <?=$image_user?></strong></div>
            </div>
            <div class="row">
                <div class="col-sm-12"><strong>Image Date: <?=$record_date?></strong></div>
            </div>
            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
            </div>
            <form role="dialog" action="/image/<?= $image_id ?>" method="post">
                <input type="hidden" name="_METHOD" value="put">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input class="form-control" id="title" name="title" type="text"
                                   value="<?= __($img_title) ?>">
                        </div>
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input class="form-control" id="caption" name="caption" type="text"
                                   value="<?= __($caption) ?>">
                        </div>
                        <div class="form-group">
                            <label for="gallery_id">Gallery</label>
                            <select name="gallery_id" id="gallery_id">
                                <option value="1" <?=$c_selected?>>Commercial</option>
                                <option value="2" <?=$r_selected?>>Residential</option>
                                <option value="3" <?=$m_selected?>>Main Screen</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <a href="/image" class="btn btn-default"><span class="glyphicon glyphicon-arrow-left"></span> Back</a>
                        <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-ok-sign"></span> Save</button>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-sm-12">&nbsp;</div>
            </div>
        </div>
        <div class="col-sm-3">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
</div>