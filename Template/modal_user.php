<?php

?>
<form role="form" method="post" action="/user">
    <div class="modal" id="modal-new-user" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>Create New User</h3>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="username" placeholder="Username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" placeholder="Password" class="form-control">
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
