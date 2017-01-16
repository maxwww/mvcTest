<?php

namespace maxw\files;

abstract class ActiveRecord
{
    protected $id = null;
    private $name;
    abstract public static function homePath();

    public function putObject()
    {
        $path = static::homePath();
        if(!file_exists($path))
        {
            mkdir($path.'ins/', 0700, true);
        }

        if($this->id === null)
        {
            $this->id = $this->getIdForCreating($path);
            file_put_contents($path.'ins/'.$this->id,  serialize($this));
        } else
        {
            file_put_contents($path.'ins/'.$this->id,  serialize($this));
        }



    }

    public static function getObjectById($id)
    {
        $path = static::homePath();
        if (file_exists($path.'ins/'.$id))
        {
            return unserialize(file_get_contents($path.'ins/'.$id));
        } else
        {
            return null;
        }
    }

    public static function getAllObjects()
    {
        $path = static::homePath();
        if(file_exists($path.'ins/'))
        {
            $arrObjectsInString = scandir($path.'ins/');
            $arrObjectsInString = array_diff($arrObjectsInString, ['.', '..']);

            if(!empty($arrObjectsInString))
            {
                foreach ($arrObjectsInString as $object)
                {
                    $arrObjects[] = unserialize(file_get_contents($path.'ins/'.$object));
                }
                return $arrObjects;
            }
            else
            {
                return null;
            }

        }else
        {
            return null;
        }
    }

    public static function deleteObjectById($id)
    {
        $path = static::homePath();
        if (file_exists($path.'ins/'.$id))
        {
            unlink($path.'ins/'.$id);
        }


    }

    private function getIdForCreating($path)
    {
        if(!file_exists($path.'cid'))
        {
            $cid = 1;
        } else
        {
            $cid = (int)file_get_contents($path.'/cid')+1;
        }
        file_put_contents($path.'cid', $cid);
        return $cid;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }


    public function setName($name)
    {
        $this->name = $name;
    }
    public function getName()
    {
        return $this->name;
    }

}