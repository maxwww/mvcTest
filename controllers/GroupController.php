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
        if ($arrGroups === null)
        {
            return $this->render('index', [
                'page' => 'group',
                'variable' => "<div><a href=\"?r=group/add\" class=\"btn btn-warning btn-primary\">Add Group</a></div><br />" . Group::NO_GROUPS,
            ]);
        } else
        {
            return $this->render('showAllGroups', [
                'page' => 'group',
                'arrGroups' => $arrGroups,
            ]);
        }
    }

}