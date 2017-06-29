<?php

?>
<tr>
    <td><?=$title?></td>
    <td><?=$caption?></td>
    <td><?=$record_date?></td>
    <td><?=$gallery_label?></td>
    <td>
        <a href="/image/<?=$image_id?>" data-toggle="tooltip" data-placement="right"
           title="Edit Image Data" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a>
    </td>
    <td>
        <form method="post" action="/image/<?=$image_id?>" id="form_<?=$image_id?>">
            <input type="hidden" name="_METHOD" value="put">
            <input type="hidden" name="active" value="<?=$active?>">
            <button type="submit" class="btn btn-default" data-toggle="tooltip" data-placement="right"
                    title="Click to <?=$title_text?>" form="form_<?=$image_id?>">
                <span class="glyphicon <?=$glyphicon?>"></span></button></form>
    </td>
    <td>
        <form method="post" action="/image/<?=$image_id?>" id="form_delete_<?=$image_id?>">
            <input type="hidden" name="_METHOD" value="delete">
            <button type="submit" class="btn btn-default confirm-delete" data-toggle="tooltip" data-placement="right"
                    title="Delete: Warning this is permanent" form="form_delete_<?=$image_id?>">
                <span class="glyphicon glyphicon-trash"></span></button></form>
    </td>
</tr>

