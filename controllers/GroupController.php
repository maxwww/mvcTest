<?php
/**
 * Created by PhpStorm.
 * User: maxw
 * Date: 17.01.17
 * Time: 21:37
 */

namespace app\controllers;

use app\models\Group;


use maxw\web\Controller;

class GroupController extends Controller
{
    public function actionIndex()
    {
        $arrGroups = Group::getAllObjects();
        if ($arrGroups === null) {
            return $this->render('index', [
                'page' => 'group',
                'variable' => "<div><a href=\"?r=group/add\" class=\"btn btn-warning btn-primary\">Add Group</a></div><br />" . Group::NO_GROUPS,
            ]);
        } else {
            return $this->render('showAllGroups', [
                'page' => 'group',
                'arrGroups' => $arrGroups,
            ]);
        }
    }

    public function actionAdd()
    {
        if (isset($_POST['put'])) {
            $group = new Group();
            $group->setName(isset($_POST['name']) ? $_POST['name'] : "no Name");
            $group->setId(isset($_POST['id']) ? (int)$_POST['id'] : null);

            $group->putObject();
            header('Location: ?r=group/view&id=' . $group->getId());
            exit;
        } else {
            return $this->render('form', [
                'page' => 'group',
                'mod' => 'add',
            ]);
        }
    }

    public function actionView()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;

        if ($id !== null && file_exists(Group::homePath() . 'ins/' . $id)) {
            $group = Group::getObjectById($id);
            $arrStudents = $group->getStudents();
            return $this->render('view', [
                'page' => 'group',
                'group' => $group,
                'arrStudents' => $arrStudents,
            ]);
        } else {
            return $this->render('index', [
                'page' => 'group',
                'variable' => Group::NO_GROUP_WITH_SUCH_ID,
            ]);
        }
    }

    public function actionEdit()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id !== null && file_exists(Group::homePath() . 'ins/' . $id)) {
            $group = Group::getObjectById($id);
            return $this->render('form', [
                'group' => $group,
                'page' => 'group',
                'mod' => 'edit',
            ]);

        } else {
            return $this->render('index', [
                'page' => 'group',
                'variable' => Group::NO_GROUP_WITH_SUCH_ID,
            ]);
        }
    }

    public function actionDel()
    {
        $id = isset($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id !== null && file_exists(Group::homePath().'ins/'.$id))
        {
            Group::getObjectById($id)->safeDeleteGroup();
        }
        header('Location: ?r=group');
        exit;
    }

}