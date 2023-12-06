<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "scheme".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $avatarname
 * @property string $filename
 * @property int $id_category
 * @property int $id_complexity
 * @property int $id_user
 * @property string $dateadd
 *
 * @property Category $category
 * @property Comment[] $comments
 * @property Complexity $complexity
 * @property User $user
 * @property User[] $users
 */
class Scheme extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'scheme';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'avatarname', 'filename'/*, 'id_category', 'id_complexity'*/], 'required'],
            [['id_category', 'id_complexity'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['description', 'avatarname', 'filename'], 'string', 'max' => 500],
            ['id_user', 'default', 'value' => Yii::$app->user->getId()],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_complexity'], 'exist', 'skipOnError' => true, 'targetClass' => Complexity::class, 'targetAttribute' => ['id_complexity' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название',
            'description' => 'Описание',
            'avatarname' => 'Аватарка',
            'filename' => 'Файл',
            'id_category' => 'Категория',
            'id_complexity' => 'Сложность',
            'id_user' => 'Пользователь',
            'dateadd' => 'Дата добавления',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['id_scheme' => 'id']);
    }

    /**
     * Gets query for [[Complexity]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComplexity()
    {
        return $this->hasOne(Complexity::class, ['id' => 'id_complexity']);
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

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'id_user'])->viaTable('comment', ['id_scheme' => 'id']);
    }
}
