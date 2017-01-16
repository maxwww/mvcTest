<?php
/**
 * Created by PhpStorm.
 * User: maxw
 * Date: 16.01.17
 * Time: 23:04
 */

namespace app\controllers;


use maxw\web\Controller;

class SiteController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index', [
            'variable' => "Home page",
            'page' => 'home',
        ]);
    }
}