<?php


namespace app\controllers;


use yii\rest\ActiveController;

class TodoController extends ActiveController
{
    public $modelClass = 'app\models\Todo';

}