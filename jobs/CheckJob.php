<?php

namespace app\jobs;

use app\models\CheckingUrl;
use app\models\Check;
use Yii;

class CheckJob extends \yii\base\BaseObject implements \yii\queue\JobInterface
{

    public int $urlId;
    public int $attempt;

    public function execute($queue)
    {
        $url = CheckingUrl::findOne(['id' => $this->urlId]);

        $ch = curl_init($url->url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        
        curl_exec($ch);
        $statusCode = (curl_getinfo($ch))['http_code'];
        curl_close($ch);
        
        $check = new Check([
            'url_id' => $url->id,
            'check_date' => date('Y-m-d'),
            'status_code' => $statusCode,
            'attempt_number' => $this->attempt,
            'check_time' => date('H:i:sa'),
        ]);
        $check->save();

        if ($statusCode < 200 || $statusCode > 399) {
            if ($this->attempt >= $url->retries_number) {
                return;
            }
            Yii::$app->queue->delay(60)->push(new CheckJob([
                'urlId' => $url->id,
                'attempt' => $this->attempt + 1,
            ]));
            return;
        }
        
        Yii::$app->queue->delay(60 * $url->check_interval)->push(new CheckJob([
                'urlId' => $url->id,
                'attempt' => 1,
            ]));
    }
}
