<?php

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center lead">Audit Log</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-3">
            <button class="btn btn-default" data-toggle="modal" data-target="#modal-audit-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
        </div>
        <div class="col-sm-3">
            <form method="get" action="/audit" role="dialog" id="search-box" class="form-inline">
                <input type="hidden" name="is_search" value="1">
                <input type="text" class="form-control" data-toggle="tooltip" data-placement="top"
                       title="Search on one or more key words, separate with a space" name="search_for" placeholder="Search..." required>
                <button type="submit" class="form-control btn btn-default" form="search-box" data-toggle="tooltip" title="Search On">
                    <span class="glyphicon glyphicon-search"></span>
                </button>
            </form>
        </div>
        <div class="col-sm-6">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Alert Level</th>
                </tr>
                </thead>
                <tbody>
                <?=$content?>
                </tbody>
            </table>
        </div>
    </div>
</div>