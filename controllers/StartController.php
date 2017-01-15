<?php

namespace app\controllers;

use maxw\web\Controller;

/**
 * Class StartController
 */
class StartController extends Controller
{

    //public $layout = 'another';
    /**
     *
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'variable' => "Hello from StartController->actionIndex()",
        ]);
    }

    /**
     *
     */
    public function actionStart()
    {
        return $this->render('index', [
            'variable' => "Hello from StartController->actionStart()",
        ]);
    }
}