<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "news".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property integer $__user_id
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $image
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
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'text', 'image'], 'required'],
            [['title', 'image'], 'string', 'max' => 255],
            [['text'], 'string'],
            [['__user_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'image' => 'Картинка',
            'text' => 'Текст',
            '__user_id' => 'Автор',
        ];
    }

    public function getAuthor()
    {
        return $this->hasOne(User::className(), ['id' => '__user_id']);
    }
}
