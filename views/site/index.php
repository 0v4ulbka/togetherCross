<?php

use app\models\Scheme;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Вместе крестиком';
?>
<div class="site-index">
    <?=GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'avatarname',
            ['attribute' => 'title',
                'format'=> 'html',
                'value' => function ($data){
        return Html::a($data->title, './scheme/view/?id='.$data->id);
                }],
            'description:ntext',
            ['attribute' => 'dateadd',
                'format' => ['date', 'php:d-m-Y H:i:s']],
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
</div>
