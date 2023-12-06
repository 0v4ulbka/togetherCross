<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int $id_user
 * @property string $content
 * @property string $date
 * @property int $id_scheme
 *
 * @property Scheme $scheme
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content', 'id_scheme'], 'required'],
            [['id_scheme'], 'integer'],
            [['content'], 'string'],
            ['id_user', 'default', 'value' => Yii::$app->user->getId()],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_scheme'], 'exist', 'skipOnError' => true, 'targetClass' => Scheme::class, 'targetAttribute' => ['id_scheme' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Id User',
            'content' => 'Комментарий',
            'date' => 'Дата добавления',
            'id_scheme' => 'Id Scheme',
        ];
    }

    /**
     * Gets query for [[Scheme]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getScheme()
    {
        return $this->hasOne(Scheme::class, ['id' => 'id_scheme']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }
}
