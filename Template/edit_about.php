<?php

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center lead">Edit: About Us</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-1"><button class="btn btn-default" data-toggle="collapse" data-target="#help-section"><span class="glyphicon glyphicon-question-sign"></span></button></div>
        <div class="col-sm-11">
            <div class="collapse" id="help-section">
                <h3>Help</h3>
                Wrap paragraphs with: <code><?=htmlspecialchars("<p></p>")?></code><br>
                Add a line break: <code><?=htmlspecialchars("<br />")?></code><br>
                Bold Text: <code><?=htmlspecialchars("<strong>TEXT</strong>")?></code>, Example: <strong>TEXT</strong><br>
                Color Text: <code><?=htmlspecialchars("<span style='color:blue'>Text is blue</span>")?></code>, Example: <span style='color:blue'>Text is blue</span><br>
                <br>
                <span class="bg-info small">Note: You can use any valid HTML within the body, but keep in mind that if it
                    conflicts with the home page template/theme it can look bad or possibly break the layout<br><br>
                Size Constraints:<br>
                <strong>Header: </strong>100 characters<br>
                <strong>Lead In: </strong>255 characters<br>
                <strong>Body: </strong>No realistic limit</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12 table-bordered">
            <form method="post" action="/about">
                <div class="row">
                    <div class="col-sm-12 text-center"><h3>Edit About Us Entry</h3></div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center"><strong>Lasted Updated By: </strong><?=$update_user?></div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center"><strong>Last Update On: </strong><?=$record_date?></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="header">Header</label>
                            <input type="text" name="header" id="header" class="form-control" maxlength="100" value="<?=$header?>" required>
                        </div>
                        <div class="form-group">
                            <label for="lead_in">Lead In</label>
                            <input type="text" name="lead_in" id="lead_in" class="form-control" maxlength="255" value="<?=$lead_in?>" required>
                        </div>
                        <div class="form-group">
                            <label for="body">About Body</label>
                            <textarea class="form-control" rows="15" name="body" id="body"><?=$body?></textarea>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-sm-1">&nbsp;</div>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-default" value="Save">
                    </div>
                    <div class="col-sm-1">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-sm-12">&nbsp;</div>
                </div>
            </form>
        </div>
    </div>
</div>
