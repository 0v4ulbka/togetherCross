<?php

use app\models\Scheme;
use yii\bootstrap4\Breadcrumbs;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Мои схемы';
echo Breadcrumbs::widget([
    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [$this->title],
    'options' => ['style'=>'background-color:white; border:solid 2px #cbdde5; margin-bottom:40px'],
]);
?>
<div class="scheme-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить схему', ['create'], ['class' => 'btn btn-secondary btn-sm', 'style'=>'margin:15px 0px']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'avatarname',
            'title',
            'description',
            ['attribute' => 'dateadd',
                'format' => ['date', 'php:d-m-Y H:i:s']],
            'filename',
            //'id_category',
            //'id_complexity',
            //'id_user',

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Scheme $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>
