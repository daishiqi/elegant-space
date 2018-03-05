<?php
/**
 * Created by PhpStorm.
 * User: daishiqi
 * Date: 2018/2/13
 * Time: 15:02
 */

namespace frontend\models;


use yii\db\ActiveRecord;

class VisitRecord extends ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'visit_record';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [

        ];
    }
}