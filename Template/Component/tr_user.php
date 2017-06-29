<?php

?>
<tr>
    <td><h4><?=$username?></h4></td>
    <td>
        <form method="post" action="/user/<?=$user_id?>" id="form_<?=$user_id?>">
            <input type="hidden" name="_METHOD" value="put">
            <input type="hidden" name="active" value="<?=$active?>">
            <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="right"
                    title="Click to <?=$action_text?>" form="form_<?=$user_id?>">
                <span class="glyphicon <?=$glyphicon?>"></span>
            </button>
        </form>
    </td>
    <td>
        <form method="post" action="/user/<?=$user_id?>" id="form_pw_<?=$user_id?>" class="form-inline">
            <input type="hidden" name="_METHOD" value="put">
            <input class="form-control" type="password" name="password" placeholder="enter new password" required>
            <button form="form_pw_<?=$user_id?>" type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="right"
           title="Reset Password"><span class="glyphicon glyphicon-wrench"></span></button>
        </form>
    </td>
    <td>
        <form method="post" action="/user/<?=$user_id?>" id="form_delete_<?=$user_id?>">
            <input type="hidden" name="_METHOD" value="delete">
            <button type="submit" class="btn btn-default confirm-delete" data-toggle="tooltip" data-placement="right"
                    title="Delete: Warning this is permanent" form="form_delete_<?=$user_id?>">
                <span class="glyphicon glyphicon-trash"></span>
            </button>
        </form>
    </td>
</tr>
