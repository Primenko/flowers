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

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['name_en','name_ru'], 'required'],
            [['name_en','name_ru'],  'string', 'max' => 60],
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
        ];
    }
}
