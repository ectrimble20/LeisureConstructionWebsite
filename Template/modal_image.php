<?php

?>
<form role="form" method="post" action="/image" enctype="multipart/form-data">
    <div class="modal" id="modal-new-image" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Create New User</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="image-file">Image</label>
                        <input class="form-control" id="image-file" name="image-file" placeholder="Select Image" type="file" required>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input class="form-control" id="title" name="title" type="text" value="" required>
                    </div>
                    <div class="form-group">
                        <label for="caption">Caption</label>
                        <input class="form-control" id="caption" name="caption" type="text" value="">
                    </div>
                    <div class="form-group">
                        <label for="gallery_id">Gallery</label>
                        <select name="gallery_id" id="gallery_id">
                            <option value="1" selected>Commercial</option>
                            <option value="2">Residential</option>
                            <option value="3">Main Screen</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-default" value="Save">
                    <button class="btn btn-default" data-dismiss="modal"> Cancel</button>
                </div>
            </div>
        </div>
    </div>
</form>
