<?php
/**
 * Created by PhpStorm.
 * User: daishiqi
 * Date: 2017/12/26
 * Time: 9:25
 */

namespace frontend\controllers;


use yii\base\Controller;

class ArticleListController extends Controller
{
    public function actionIndex()
    {
        return $this->renderPartial('index');
    }
}