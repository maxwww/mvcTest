<?php
/**
 * Created by PhpStorm.
 * User: maxw
 * Date: 17.01.17
 * Time: 21:36
 */

namespace app\models;


use maxw\files\ActiveRecord;


class Group extends ActiveRecord
{
    const NO_GROUP_WITH_SUCH_ID = 'Id is not stored in base!';
    const NO_GROUPS = 'There are no groups!';

    public static function homePath()
    {
        return '../data/groups/';
    }

    public function getStudents()
    {
        $arrStudents = Student::getAllObjects();
        if (!empty($arrStudents)) {
            $students = null;
            foreach ($arrStudents as $student) {
                if ($this->getId() == $student->getGroup()) {
                    $students[] = $student;
                }
            }
            return $students;
        }
    }

    public function safeDeleteGroup()
    {
        if ($this->getStudents() != null) {
            return true;
        } else {
            Group::deleteObjectById($this->getId());
        }
    }
}