<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $name
 *
 * @property Complexity[] $complexities
 * @property Scheme[] $schemes
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
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
            'name' => 'Категория',
        ];
    }

    /**
     * Gets query for [[Complexities]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComplexities()
    {
        return $this->hasMany(Complexity::class, ['id' => 'id_complexity'])->viaTable('scheme', ['id_category' => 'id']);
    }

    /**
     * Gets query for [[Schemes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSchemes()
    {
        return $this->hasMany(Scheme::class, ['id_category' => 'id']);
    }
}
