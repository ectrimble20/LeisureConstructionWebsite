<?php

?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center lead">Edit Endorsement</div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-1"><button class="btn btn-default" data-toggle="collapse" data-target="#help-section"><span class="glyphicon glyphicon-question-sign"></span></button></div>
        <div class="col-sm-11">
            <div class="collapse" id="help-section">
            <h3>Help</h3>
                Add a line break: <code><?=htmlspecialchars("<br />")?></code><br>
                Bold Text: <code><?=htmlspecialchars("<strong>TEXT</strong>")?></code>, Example: <strong>TEXT</strong><br>
                Color Text: <code><?=htmlspecialchars("<span style='color:blue'>Text is blue</span>")?></code>, Example: <span style='color:blue'>Text is blue</span><br>
                <br>
                <span class="bg-info small">Note: You can use any valid HTML within the body, but keep in mind that if it
                    conflicts with the home page template/theme it can look bad or possibly break the layout<br><br>
                Size Constraints:<br>
                <strong>Endorser: </strong>75 characters<br>
                <strong>Body: </strong>255 characters</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">&nbsp;</div>
    </div>
    <div class="row">
        <div class="col-sm-12 table-bordered">
            <form method="post" action="/endorse/<?=$endorse_id?>">
                <input type="hidden" name="_METHOD" value="put">
                <div class="row">
                    <div class="col-sm-12 text-center"><h3>Edit Endorsement</h3></div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center"><strong>Created By:</strong> <?=$create_user?></div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-center"><strong>Created On:</strong> <?=$create_date?></div>
                </div>
                <div class="row">
                    <div class="col-sm-2">&nbsp;</div>
                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="endorser">Endorser</label>
                            <input class="form-control" id="endorser" name="endorser" type="text"
                                   value="<?= __($endorser) ?>">
                        </div>
                        <div class="form-group">
                            <label for="body">Message Body</label>
                            <textarea rows="10" class="form-control" name="body" id="body"><?= $body ?></textarea>
                        </div>
                    </div>
                    <div class="col-sm-2">&nbsp;</div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" class="btn btn-default" value="Save">
                        <a href="/endorse" class="btn btn-default">Cancel</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">&nbsp;</div>
                </div>
            </form>
        </div>
    </div>
</div>
