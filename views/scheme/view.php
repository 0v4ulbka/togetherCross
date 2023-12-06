<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Scheme $model */
/** @var app\models\Comment $comment */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Схемы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="scheme-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <!--<p>
        <?php /*= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) */?>
        <?php /*= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) */?>
    </p>-->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'description',
            'avatarname',
            'filename',
            'category.name',
            'complexity.name',
            ['attribute' => 'dateadd',
                'format' => ['date', 'php:d-m-Y H:i:s']],
        ],
    ]) ?>
    <div class="comment-form">

        <?php $form = ActiveForm::begin(['action'=>'../../comment/create']); ?>

        <?= $form->field($comment, 'content')->textarea(['rows' => 6]) ?>

        <?= $form->field($comment, 'id_scheme')->hiddenInput(['value'=>$model->id])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Оставить комментарий', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'user.firstname',
            'content',
            ['attribute' => 'date',
                'format' => ['date', 'php:d-m-Y H:i:s']],
        ],
    ]); ?>

</div>
