<?php

namespace app\models;

use common\models\User;
use Yii;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $__user_id
 * @property integer $published
 */
class News extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text'], 'required'],
            [['text'], 'string'],
            [['__user_id', 'published'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'text' => 'Text',
            '__user_id' => 'User ID',
            'published' => 'Published',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['__user_id' => 'id']);
    }
}
