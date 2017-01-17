<?php
use maxw\helpers\Html;
?>
<div class="container">
    <form method="post" action="?r=group/add">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" <?= isset($group) ? 'value="'.Html::safeHtml($group->getName()).'"': ""?>>
            </div>
        </div>

        <input type="hidden" name="put" value="true">
        <?= isset($group) ? '<input type="hidden" name="id" value="'.(int)$group->getId().'">' : ""?>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><?= $mod == 'add' ? 'Add' : 'Save'?></button>
            </div>
        </div>
    </form>
</div>