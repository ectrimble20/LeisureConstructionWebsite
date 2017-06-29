<?php

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center lead">Manage Images</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-1">
            <button id="image-btn-add-new" class="btn btn-default" data-toggle="modal" data-target="#modal-new-image"><span class="glyphicon glyphicon-plus"></span> New</button>
        </div>
        <div class="col-sm-4">
            <form role="dialog" id="search-by-gallery" class="form-inline">
                <label for="gallery_id">List By Gallery</label>
                <select class="form-control" name="gallery_id" id="gallery_id">
                    <option value="" selected></option>
                    <option value="1">Commercial</option>
                    <option value="2">Residential</option>
                    <option value="3">Main Screen</option>
                </select>
                <button type="submit" form="search-by-gallery" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div>
        <div class="col-sm-7">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>Title</th>
                <th>Caption</th>
                <th>Create Date</th>
                <th>Gallery</th>
                <th>Edit</th>
                <th>Active</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?=$content?>
            </tbody>
        </table>
    </div>
</div>