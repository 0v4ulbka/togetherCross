<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Scheme $model */

$this->title = 'Отредактировать схему: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Схемы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="scheme-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
