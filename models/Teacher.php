<?php
/**
 * Created by PhpStorm.
 * User: maxw
 * Date: 17.01.17
 * Time: 20:40
 */

namespace app\models;


class Teacher extends Person
{
    private $position;
    const NO_TEACHERS = "There are no teachers!";
    const NO_TEACHER_WITH_SUCH_ID = "Id is not stored in base!";

    public static function homePath()
    {
        return '../data/teachers/';
    }

    /**
     * @return mixed
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * @param mixed position
     */
    public function setPosition($position)
    {
        $this->position = $position;
    }

}