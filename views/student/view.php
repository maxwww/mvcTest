<?php
use maxw\helpers\Html;
?>
<div class="card">
    <h3 class="card-header"><?= Html::safeHtml($student->getId())?></h3>
    <div class="card-block">
        <h4 class="card-title"><?= Html::safeHtml($student->getName())?></h4>
        <p class="card-text"><?= Html::safeHtml($student->getAge())?></p>
        <p class="card-text"><?= $student->getSex() == 1 ? 'Male' : 'Female'?></p>
        <p class="card-text"><?= Html::safeHtml($student->getCourse())?> course</p>
        <p class="card-text"><?= $student->getGroup()?> group</p>
        <a href="?r=student/edit&id=<?= (int)$student->getId()?>" class="btn btn-warning btn-primary">Edit</a>
        <a href="?r=student/del&id=<?= (int)$student->getId()?>" class="btn btn-danger btn-primary" onclick="return confirm('Подумай!')">Delete</a>
    </div>
</div>