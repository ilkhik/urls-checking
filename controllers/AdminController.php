<?php

namespace app\controllers;

use app\models\CheckingUrl;
use app\models\Check;

class AdminController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $checkingUrls = CheckingUrl::find()->all();
        return $this->render('index', [
            'checkingUrls' => $checkingUrls,
        ]);
    }
    
    public function actionChecks(int $urlId)
    {   
        $checks = Check::find()->where(['url_id' => $urlId])->orderBy(['id' => SORT_DESC])->all();
        $checkingUrl = CheckingUrl::findOne(['id' =>$urlId]);
        return $this->render('checks', [
            'checks' => $checks,
            'checkingUrl' => $checkingUrl,
        ]);
    }
}
