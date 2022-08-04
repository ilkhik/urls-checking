<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checks".
 *
 * @property int $id
 * @property int $url_id
 * @property string $check_date
 * @property int $status_code
 * @property int $attempt_number
 */
class Check extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'checks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url_id', 'check_date', 'status_code', 'attempt_number'], 'required'],
            [['url_id', 'status_code', 'attempt_number'], 'integer'],
            [['check_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url_id' => 'Url ID',
            'check_date' => 'Check Date',
            'status_code' => 'Status Code',
            'attempt_number' => 'Attempt Number',
        ];
    }
}
