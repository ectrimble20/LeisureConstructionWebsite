<?php

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center lead">Content:  Customers Say</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <button id="btn-add-new" class="btn btn-default" data-toggle="modal" data-target="#modal-new-custsay"><span class="glyphicon glyphicon-plus"></span> New</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Edit</th>
                    <th>Endorser</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>User</th>
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
</div>



<!-- MODAL NEW USER -->
<form role="form" method="post" action="/content/customers">
    <div class="modal" id="modal-new-custsay" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Create New User</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="endorser">Endorser:</label>
                        <input type="text" name="endorser" id="endorser" placeholder="Endorser" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="body">Message:</label>
                        <textarea class="form-control" rows="4" name="body" id="body"></textarea>
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
<!-- END OF MODAL NEW USER -->