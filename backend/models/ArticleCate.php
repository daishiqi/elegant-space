<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "article_cate".
 *
 * @property integer $id
 * @property string $cate_name
 * @property integer $create_time
 * @property integer $update_time
 */
class ArticleCate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article_cate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_time', 'update_time'], 'integer'],
            [['cate_name'], 'string', 'max' => 128],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cate_name' => 'Cate Name',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
        ];
    }

    public function getSave($data)
    {
    }
}
