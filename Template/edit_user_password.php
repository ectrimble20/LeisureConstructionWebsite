<?php

?>
<form role="dialog" method="post" action="/user/<?=$user_id?>">
    <!-- Since we're submitting from a form, we'll make this method the hacky way -->
    <input type="hidden" name="_METHOD" value="put">
    <div class="container">
        <div class="row"><div class="col-sm-12">&nbsp;</div></div>
        <div class="row">
            <div class="col-sm-4">&nbsp;</div>
            <div class="col-sm-4 table-bordered">
                <div class="row">
                    <div class="col-sm-12"><h3>Reset Password For User <?=$username?></h3></div>
                </div>
                <div class="row">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="rs-password1">Password</label>
                            <input type="password" name="rs-password1" id="rs-password1" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="rs-password2">Repeat Password</label>
                            <input type="password" name="rs-password2" id="rs-password2" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-default" value="Reset Password">
                        <a href="/user" class="btn btn-default">Cancel</a>
                    </div>
                </div>
                <div class="row"><div class="col-sm-12">&nbsp;</div></div>
            </div>
            <div class="col-sm-4">&nbsp;</div>
        </div>
        <div class="row"><div class="col-sm-12">&nbsp;</div></div>
    </div>
</form>
