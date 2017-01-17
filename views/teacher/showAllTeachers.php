<?php
use maxw\helpers\Html;
?>

<div>
    <a href="?r=teacher/add" class="btn btn-warning btn-primary">Add Teacher</a>
</div>
<table width="100%">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php foreach ($arrTeachers as $teacher): ?>
        <tr>
            <td><a href="?r=teacher/view&id=<?= $teacher->getId()?>"><?= Html::safeHtml($teacher->getId())?></a></td>
            <td><?= Html::safeHtml($teacher->getName())?></td>
        </tr>
    <?php endforeach; ?>
</table>