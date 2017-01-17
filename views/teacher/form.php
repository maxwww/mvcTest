<?php
use maxw\helpers\Html;
?>
<div class="container">
    <form method="post" action="?r=teacher/add">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" name="name" <?= isset($teacher) ? 'value="'.Html::safeHtml($teacher->getName()).'"': ""?>>
            </div>
        </div>

        <div class="form-group row">
            <label for="age" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-6">
                <input type="date" class="form-control" name="age" <?= isset($teacher) ? 'value="'.Html::safeHtml($teacher->getAge()).'"': ""?>>
            </div>
        </div>



        <fieldset class="form-group row">
            <legend class="col-form-legend col-sm-2">Sex</legend>
            <div class="col-sm-6">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sex" id="gridRadios1" value="1" <?php
                        if (isset($teacher))
                        {
                            echo $teacher->getSex() == 1 ? 'checked' : "";
                        } else
                        {
                            echo 'checked';
                        }
                        ?>>
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="0" <?php
                        echo isset($teacher) && $teacher->getSex() == 0 ? 'checked' : "";
                        ?>>
                        Female
                    </label>
                </div>
            </div>
        </fieldset>

        <div class="form-group row">
            <label for="course" class="col-sm-2 col-form-label">Position</label>
            <div class="col-sm-6">
                <select name="position">
                    <option value="Teacher" <?= isset($teacher) && $teacher->getPosition() == "Teacher" ? 'selected' : ""?>>Teacher</option>
                    <option value="Senior Teacher" <?= isset($teacher) && $teacher->getPosition() == "Senior Teacher" ? 'selected' : ""?>>Senior Teacher</option>
                    <option value="Director" <?= isset($teacher) && $teacher->getPosition() == "Director" ? 'selected' : ""?>>Director</option>
                </select>
            </div>
        </div>

        <input type="hidden" name="put" value="true">
        <?= isset($teacher) ? '<input type="hidden" name="id" value="'.(int)$teacher->getId().'">' : ""?>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit" class="btn btn-primary"><?= $mod == 'add' ? 'Add' : 'Save'?></button>
            </div>
        </div>
    </form>
</div>