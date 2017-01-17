<?php
/**
 * Created by PhpStorm.
 * User: maxw
 * Date: 17.01.17
 * Time: 20:30
 */

namespace app\controllers;


use maxw\web\Controller;
use app\models\Teacher;

class TeacherController extends Controller
{
    public function actionIndex()
    {
        $arrTeachers = Teacher::getAllObjects();
        if ($arrTeachers === null) {
            return $this->render('index', [
                'page' => 'teacher',
                'variable' => "<div><a href=\"?r=teacher/add\" class=\"btn btn-warning btn-primary\">Add Teacher</a></div><br />" . Teacher::NO_TEACHERS,
            ]);
        } else {
            return $this->render('showAllTeachers', [
                'page' => 'teacher',
                'arrTeachers' => $arrTeachers,
            ]);
        }
    }

    public function actionAdd()
    {
        if (isset($_POST['put'])) {
            $teacher = new Teacher();
            $teacher->setName(isset($_POST['name']) ? $_POST['name'] : "no Name");
            $teacher->setAge(isset($_POST['age']) ? $_POST['age'] : "");
            $teacher->setSex(isset($_POST['sex']) ? $_POST['sex'] : "");
            $teacher->setPosition(isset($_POST['position']) ? $_POST['position'] : "");
            $teacher->setId(isset($_POST['id']) ? (int)$_POST['id'] : null);

            $teacher->putObject();
            header('Location: ?r=teacher/view&id=' . $teacher->getId());
            exit;
        } else {
            return $this->render('form', [
                'page' => 'teacher',
                'mod' => 'add',
            ]);
        }
    }

    public function actionView()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

        if ($id !== null && file_exists(Teacher::homePath() . 'ins/' . $id)) {
            $teacher = Teacher::getObjectById($id);
            return $this->render('view', [
                'page' => 'teacher',
                'teacher' => $teacher,
            ]);
        } else {
            return $this->render('index', [
                'page' => 'teacher',
                'variable' => Teacher::NO_TEACHER_WITH_SUCH_ID,
            ]);
        }

    }

    public function actionEdit()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id !== null && file_exists(Teacher::homePath() . 'ins/' . $id)) {
            $teacher = Teacher::getObjectById($id);
            return $this->render('form', [
                'teacher' => $teacher,
                'page' => 'teacher',
                'mod' => 'edit',
            ]);

        } else {
            return $this->render('index', [
                'page' => 'teacher',
                'variable' => Teacher::NO_TEACHER_WITH_SUCH_ID,
            ]);
        }
    }

    public function actionDel()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id !== null && file_exists(Teacher::homePath().'ins/'.$id))
        {
            Teacher::deleteObjectById($id);
        }
        header('Location: ?r=teacher');
        exit;
    }

}