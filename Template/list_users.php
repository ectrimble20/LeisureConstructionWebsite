<?php

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center lead">Manage Users</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <button id="pageUser-btn-add-new" class="btn btn-default" data-toggle="modal" data-target="#modal-new-user"><span class="glyphicon glyphicon-plus"></span> New</button>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <table class="table table-responsive">
            <thead>
            <tr>
                <th>Username</th>
                <th>Active</th>
                <th>Password</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            <?=$content?>
            </tbody>
        </table>
    </div>
</div>