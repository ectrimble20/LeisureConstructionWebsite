<?php

?>
<tr>
    <td><a href="/endorse/<?=$endorse_id?>" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a></td>
    <td><?=$endorser?></td>
    <td><a href="#" title="" data-toggle="popover" data-placement="right"
           data-html="true" data-trigger="focus"
           class="btn btn-default" data-content="<?=__($body)?>">
            <span class="glyphicon glyphicon-eye-open"></span></a>
    </td>
    <td><?=$record_date?></td>
    <td><?=$username?></td>
    <td>
        <form method="post" action="/endorse/<?=$endorse_id?>" id="form_<?=$endorse_id?>">
            <input type="hidden" name="_METHOD" value="put">
            <input type="hidden" name="active" value="<?=$active?>">
            <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="right"
                    title="Click to <?=$title_text?>" form="form_<?=$endorse_id?>">
                <span class="glyphicon <?=$glyphicon?>"></span></button></form>
    </td>
    <td>
        <form method="post" action="/endorse/<?=$endorse_id?>" id="form_delete_<?=$endorse_id?>">
            <input type="hidden" name="_METHOD" value="delete">
            <button type="submit" class="btn btn-default confirm-delete" data-toggle="tooltip" data-placement="right"
                    title="Delete: Warning this is permanent" form="form_delete_<?=$endorse_id?>">
                <span class="glyphicon glyphicon-trash"></span></button></form>
    </td>
</tr>