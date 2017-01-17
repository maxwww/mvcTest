<?php
/**
 * Created by PhpStorm.
 * User: maxw
 * Date: 16.01.17
 * Time: 23:10
 */

namespace app\controllers;


use app\models\Student;
use maxw\web\Controller;

class StudentController extends Controller
{
    public function actionIndex()
    {
        $arrStudents = Student::getAllObjects();
        if ($arrStudents === null) {
            return $this->render('index', [
                'page' => 'student',
                'variable' => "<div><a href=\"?r=student/add\" class=\"btn btn-warning btn-primary\">Add Student</a></div><br />" . Student::NO_STUDENTS,
            ]);
        } else {
            return $this->render('showAllStudents', [
                'page' => 'student',
                'arrStudents' => $arrStudents,
            ]);
        }

    }

    public function actionAdd()
    {
        if (isset($_POST['put'])) {
            $student = new Student();
            $student->setName(isset($_POST['name']) ? $_POST['name'] : "no Name");
            $student->setAge(isset($_POST['age']) ? $_POST['age'] : "");
            $student->setSex(isset($_POST['sex']) ? $_POST['sex'] : "");
            $student->setCourse(isset($_POST['course']) ? $_POST['course'] : "");
            $student->setGroup(isset($_POST['group']) ? $_POST['group'] : "");
            $student->setId(isset($_POST['id']) ? (int)$_POST['id'] : null);

            $student->putObject();
            header('Location: ?r=student/view&id=' . $student->getId());
            exit;
        }

        return $this->render('form', [
            'page' => 'student',
            'mod' => 'add',
        ]);
    }

    public function actionView()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id !== null && file_exists(Student::homePath() . 'ins/' . $id)) {
            $student = Student::getObjectById($id);
            return $this->render('view', [
                'student' => $student,
                'page' => 'student',
            ]);
        } else {
            return $this->render('index', [
                'page' => 'student',
                'variable' => Student::NO_STUDENT_WITH_SUCH_ID,
            ]);
        }
    }

    public function actionEdit()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id !== null && file_exists(Student::homePath() . 'ins/' . $id)) {
            $student = Student::getObjectById($id);
            return $this->render('form', [
                'student' => $student,
                'page' => 'student',
                'mod' => 'edit',
            ]);

        } else {
            return $this->render('index', [
                'page' => 'student',
                'variable' => Student::NO_STUDENT_WITH_SUCH_ID,
            ]);
        }
    }

    public function actionDel()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id !== null && file_exists(Student::homePath().'ins/'.$id))
        {
            Student::deleteObjectById($id);
        }
        header('Location: ?r=student');
        exit;

    }


}