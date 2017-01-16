<?php
use maxw\helpers\Html;

?>
<div>
    <a href="?r=student/add" class="btn btn-warning btn-primary">Add Student</a>
</div><br>
<table width="100%">
    <tr>
        <th>ID</th>
        <th>Name</th>
    </tr>
    <?php foreach ($arrStudents as $student): ?>
        <tr>
            <td><a href="?r=student/view&id=<?= $student->getId() ?>"><?= Html::safeHtml($student->getId()) ?></a>
            </td>
            <td><?= Html::safeHtml($student->getName()) ?></td>
        </tr>
    <?php endforeach; ?>
</table>