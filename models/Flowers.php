<?php

namespace app\models;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * ContactForm is the model behind the contact form.
 */
//class Flowers extends Model
class Flowers extends ActiveRecord
{

    const TYPE_SLICE = 1;
    const TYPE_SOLD = 2;
//    public $id;
//    public $name_ru;
//    public $name_en;
//    public $date_added;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flowers';
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
            [['name_ru'], 'required'],
            [['name_en','name_ru'],  'string', 'max' => 60],
            [['cnt_slice','name_ru'],  'integer', 'max' => 10],
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'name_ru' => \Yii::t('app', 'Flower name (RU)'),
            'name_en' => \Yii::t('app', 'Flower name (EN)'),
            'cnt_slice' => \Yii::t('app', 'Count'),
            'type' => \Yii::t('app', 'Type'),
        ];
    }
}
