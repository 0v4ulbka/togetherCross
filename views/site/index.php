<?php

use app\models\Scheme;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\web\View $this */

$this->title = 'Вместе крестиком';
?>
<div class="site-index">
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'style'=>'border:none'],
            'avatarname',
            ['attribute' => 'title',
                'format'=> 'html',
                'value' => function ($data){
        return Html::a($data->title, './scheme/view/?id='.$data->id);
                }],
            'description:ntext',
            ['attribute' => 'dateadd',
                'format' => ['date', 'php:d-m-Y H:i:s']],
            'user.firstname',
            //'id_category',
            //'id_complexity',
            //'id_user',

            /*[
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Scheme $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],*/
        ],
    ]); ?>
    <div class="card">
        <div class="image">
            <img src="" alt="превью схемы">
        </div>
        <h2 class="card-title"><?php /*var_dump($model); die();*/?></h2>
        <div class="desc">

        </div>
        <div class="caption">
            <div class="firstname"></div>
            <p class="datetime"></p>
        </div>
    </div>
</div>

