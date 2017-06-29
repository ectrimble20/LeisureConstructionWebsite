<?php

?>
<div class="modal" id="modal-audit-filter" role="dialog">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h3>Filter Audit Log</h3>
            </div>
            <div class="modal-body">
                <form role="form" method="get" action="/audit" id="audit-filter-form">
                    <input type="hidden" name="is_filter" value="1">
                    <div class="form-group">
                        <label for="date_from">Date From</label>
                        <input type="date" name="date_from" id="date_from" class="form-control" value="<?=date('Y-m-d')?>">
                    </div>
                    <div class="form-group">
                        <label for="date_to">Date To</label>
                        <input type="date" name="date_to" id="date_to" class="form-control" value="<?=date('Y-m-d')?>">
                    </div>
                    <div class="form-group">
                        <label for="audit_level_id">Audit Level</label>
                        <select name="audit_level_id" id="audit_level_id">
                            <option value="" selected></option>
                            <option value="1">INFO</option>
                            <option value="2">NOTICE</option>
                            <option value="3">ALERT</option>
                            <option value="4">CRITICAL</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" form="audit-filter-form" type="submit"><span class="glyphicon glyphicon-ok"></span> Set Filter</button>
                <button class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
            </div>
        </div>
    </div>
</div>
