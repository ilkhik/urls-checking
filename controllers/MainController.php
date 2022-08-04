<?php

namespace app\controllers;

use Yii;
use app\jobs\CheckJob;

class MainController extends \yii\web\Controller
{

    public function actionIndex()
    {
        $model = new \app\models\CheckingUrl(['scenario' => 'submit']);

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                $model->creation_date = date('Y-m-d');
                $model->save();
                
                Yii::$app->queue->push(new CheckJob([
                    'urlId' => $model->id,
                    'attempt' => 1,
                ]));

                return $this->render('index', [
                            'model' => $model,
                            'success' => true,
                ]);
            }
        }

        return $this->render('index', [
                    'model' => $model,
        ]);
    }

}
