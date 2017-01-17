<?php
use maxw\helpers\Html;
use app\models\Group;

?>
<div class="container">
    <form method="post" action="?r=student/add">
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control"
                       name="name" <?= isset($student) ? 'value="' . Html::safeHtml($student->getName()) . '"' : "" ?>>
            </div>
        </div>

        <div class="form-group row">
            <label for="age" class="col-sm-2 col-form-label">Age</label>
            <div class="col-sm-6">
                <input type="date" class="form-control"
                       name="age" <?= isset($student) ? 'value="' . Html::safeHtml($student->getAge()) . '"' : "" ?>>
            </div>
        </div>


        <fieldset class="form-group row">
            <legend class="col-form-legend col-sm-2">Sex</legend>
            <div class="col-sm-6">
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sex" id="gridRadios1" value="1" <?php
                        if (isset($student)) {
                            echo $student->getSex() == 1 ? 'checked' : "";
                        } else {
                            echo 'checked';
                        }
                        ?>>
                        Male
                    </label>
                </div>
                <div class="form-check">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="sex" id="gridRadios2" value="0" <?php
                        echo isset($student) && $student->getSex() == 0 ? 'checked' : "";
                        ?>>
                        Female
                    </label>
                </div>
            </div>
        </fieldset>

        <div class="form-group row">
            <label for="course" class="col-sm-2 col-form-label">Course</label>
            <div class="col-sm-6">
                <select name="course">
                    <option value="1" <?= isset($student) && $student->getCourse() == 1 ? 'selected' : "" ?>>1</option>
                    <option value="2" <?= isset($student) && $student->getCourse() == 2 ? 'selected' : "" ?>>2</option>
                    <option value="3" <?= isset($student) && $student->getCourse() == 3 ? 'selected' : "" ?>>3</option>
                    <option value="4" <?= isset($student) && $student->getCourse() == 4 ? 'selected' : "" ?>>4</option>
                    <option value="5" <?= isset($student) && $student->getCourse() == 5 ? 'selected' : "" ?>>5</option>
                </select>
            </div>
        </div>

        <div class="form-group row">
            <label for="course" class="col-sm-2 col-form-label">Group</label>
            <div class="col-sm-6">
                <select name="group">
                    <?php $groups = Group::getAllObjects();
                    if (!empty($groups))
                    {
                        foreach ($groups as $id => $group)
                        {
                            $selected = isset($student) && $student->getGroup() == $group->getId() ? 'selected' : "";
                            echo '<option value="'.$group->getId().'" '.$selected.'>'.$group->getName().'</option>';
                        }
                    }

                    ?>

                </select>
            </div>
        </div>


        <input type="hidden" name="put" value="true">
        <?= isset($student) ? '<input type="hidden" name="id" value="' . (int)$student->getId() . '">' : "" ?>
        <div class="form-group row">
            <div class="offset-sm-2 col-sm-10">
                <button type="submit"
                        class="btn btn-primary"><?= $mod == 'add' ? 'Add' : 'Save' ?></button>
            </div>
        </div>
    </form>
</div>