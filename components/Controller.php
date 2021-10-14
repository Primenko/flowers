<?php

namespace app\components;

class Controller extends \yii\web\Controller
{
    public function beforeAction($action)
    {
        \Yii::$app->language = 'ru-RU';

        return true;
    }
}