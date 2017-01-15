<?php

namespace app\controllers;

use maxw\web\Controller;

/**
 * Class DefaultController
 */
class DefaultController extends Controller
{
    /**
     *
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'variable' => "Hello from DefaultController->actionIndex()",
        ]);


    }

    /**
     *
     */
    public function actionStart()
    {
        return $this->render('index', [
            'variable' => "Hello from DefaultController->actionStart()",
        ]);

    }
}