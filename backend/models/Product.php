<?php

namespace backend\models;

use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;

class Product extends ActiveRecord
{

    /*public $name;
    public $description;*/

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'updated_at',
                ],
                'value' => function () {
                    return date('Y-m-d h:i:s');
                },
            ]
        ];
    }

    public static function tableName(): string
    {
        return '{{product}}';
    }

    public function attributeLabels()
    {
        return [
            'active' => 'Ativo',
            'name' => 'Name',
            'description' => 'Description',
            'created_at' => 'Created at',
            'updated_at' => 'Updated at',
        ];
    }

    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['name', 'description'], 'string'],
            [['active'], 'boolean'],
            [['created_at', 'updated_at'], 'safe'],
        ];
    }
    /*
    public function beforeSave($insert)
    {
        parent::beforeSave($insert);
    }*/


    // validation

    // fields

    // behaviors de data e cast
}
