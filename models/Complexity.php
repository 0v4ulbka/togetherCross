<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "complexity".
 *
 * @property int $id
 * @property string $name
 *
 * @property Category[] $categories
 * @property Scheme[] $schemes
 */
class Complexity extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'complexity';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Сложность',
        ];
    }

    /**
     * Gets query for [[Categories]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategories()
    {
        return $this->hasMany(Category::class, ['id' => 'id_category'])->viaTable('scheme', ['id_complexity' => 'id']);
    }

    /**
     * Gets query for [[Schemes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchemes()
    {
        return $this->hasMany(Scheme::class, ['id_complexity' => 'id']);
    }
}
