<?php
/**
 * Created by PhpStorm.
 * User: maxw
 * Date: 16.01.17
 * Time: 23:24
 */

namespace app\models;


use maxw\files\ActiveRecord;

abstract class Person extends ActiveRecord
{
    private $sex;
    private $age;

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }
}