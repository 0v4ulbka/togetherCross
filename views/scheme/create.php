<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Scheme $model */

$this->title = 'Create Scheme';
$this->params['breadcrumbs'][] = ['label' => 'Schemes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scheme-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>