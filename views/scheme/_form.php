<?php

use app\models\Category;
use app\models\Complexity;
use yii\helpers\Html;
use yii\widgets\ActiveForm;


/** @var yii\web\View $this */
/** @var app\models\Scheme $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="scheme-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'avatarname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_category')->dropDownList(Category::find()->select(['name','id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'id_complexity')->dropDownList(Complexity::find()->select(['name','id'])->indexBy('id')->column()) ?>

    <?= $form->field($model, 'filename')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
