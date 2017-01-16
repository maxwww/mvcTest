<?php

namespace app\models;


class Student extends Person
{
    private $course;
    private $group;
    const NO_STUDENT_WITH_SUCH_ID = "Id is not stored in base!";
    const NO_STUDENTS = "There are no students!";

    public static function homePath()
    {
        return __DIR__ . '/../data/students/';
    }

    /**
     * @return mixed
     */
    public function getCourse()
    {
        return $this->course;
    }

    /**
     * @param mixed $course
     */
    public function setCourse($course)
    {
        $this->course = $course;
    }

    /**
     * @return mixed
     */
    public function getGroup()
    {
        return $this->group;
    }

    /**
     * @param mixed $group
     */
    public function setGroup($group)
    {
        $this->group = $group;
    }

}