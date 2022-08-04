<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "checking_urls".
 *
 * @property int $id
 * @property string $url
 * @property int $check_interval
 * @property int $retries_number
 * @property string $creation_date
 */
class CheckingUrl extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'checking_urls';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'check_interval', 'retries_number', 'creation_date'], 'required'],
            [['check_interval'], 'in', 'range' => [1, 5, 10]],
            [['retries_number'], 'integer', 'min' => 0, 'max' => 10],
            [['creation_date'], 'safe'],
            [['url'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['url'], 'url'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'check_interval' => 'Check Interval',
            'retries_number' => 'Retries Number',
            'creation_date' => 'Creation Date',
        ];
    }

    public function scenarios()
    {
        $scenarios = parent::scenarios();
        $scenarios['submit'] = ['url', 'check_interval', 'retries_number'];
        return $scenarios;
    }

}
