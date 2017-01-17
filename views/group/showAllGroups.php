<?php
use maxw\helpers\Html;
?>
<div>
    <a href="?r=group/add" class="btn btn-warning btn-primary">Add Group</a>
</div>
<table width="100%">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php foreach ($arrGroups as $group): ?>
        <tr>
            <td><a href="?group/view&id=<?= $group->getId()?>"><?= Html::safeHtml($group->getId())?></a></td>
            <td><?= Html::safeHtml($group->getName())?></td>
        </tr>
    <?php endforeach; ?>
</table>