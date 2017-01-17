<?php
use maxw\helpers\Html;
?>
<div class="card">
    <h3 class="card-header"><?= Html::safeHtml($teacher->getId())?></h3>
    <div class="card-block">
        <h4 class="card-title"><?= Html::safeHtml($teacher->getName())?></h4>
        <p class="card-text"><?= Html::safeHtml($teacher->getAge())?></p>
        <p class="card-text"><?= $teacher->getSex() == 1 ? 'Male' : 'Female'?></p>
        <p class="card-text"><?php?><?= Html::safeHtml($teacher->getPosition())?></p>
        <a href="?r=teacher/edit&id=<?= (int)$teacher->getId()?>" class="btn btn-warning btn-primary">Edit</a>
        <a href="?r=teacher/del&id=<?= (int)$teacher->getId()?>" class="btn btn-danger btn-primary" onclick="return confirm('Подумай!')">Delete</a>
    </div>
</div>