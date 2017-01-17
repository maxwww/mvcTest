<?php
use maxw\helpers\Html;
use app\models\Student;
?>
<div class="card">
    <h3 class="card-header"><?= Html::safeHtml($group->getId())?></h3>
    <div class="card-block">
        <h4 class="card-title"><?= Html::safeHtml($group->getName())?></h4>
        <a href="?r=group/edit&id=<?= (int)$group->getId()?>" class="btn btn-warning btn-primary">Edit</a>
        <?php if (isset($arrStudents) && !empty($arrStudents)): ?>
        <?php else:?>
            <a href="?r=group/del&id=<?= (int)$group->getId()?>" class="btn btn-danger btn-primary" onclick="return confirm('Подумай!')">Delete</a>
        <?php endif;?>
        <div>
            <?php if(isset($arrStudents) && !empty($arrStudents)): ?>
                <table width="100%">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                    </tr>
                    <?php foreach ($arrStudents as $student): ?>
                        <tr>
                            <td><a href="?r=student/view&id=<?= $student->getId()?>"><?= Html::safeHtml($student->getId())?></a></td>
                            <td><?= Html::safeHtml($student->getName())?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            <?php else:?>
                <?= Student::NO_STUDENTS?>
            <?php endif;?>
        </div>
    </div>
</div>