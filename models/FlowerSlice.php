<?php

namespace app\models;
use yii\db\ActiveRecord;

class FlowerSlice extends ActiveRecord
{

    const TYPE_SLICE = 1;
    const TYPE_SOLD = 2;

    public static function tableName()
    {
        return 'flower_slice';
    }

    public static function type()
    {
        return [
            self::TYPE_SLICE => \Yii::t('app', 'Slice'),
            self::TYPE_SOLD => \Yii::t('app', 'Sold')
        ];
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['flower_id','cnt_slice','type'], 'required'],
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
            'type' => \Yii::t('app', 'Type'),
        ];
    }
}