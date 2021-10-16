<?php

namespace app\models;
use yii\db\ActiveRecord;

class FlowerSlice extends ActiveRecord
{
    public static function tableName()
    {
        return 'flower_slice';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['flower_id','cnt_slice'], 'required'],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'flower_id' => \Yii::t('app', 'Flower name (RU)'),
            'cnt_slice' => \Yii::t('app', 'Count'),
        ];
    }
}