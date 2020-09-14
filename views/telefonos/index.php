<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TelefonosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Teléfonos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="telefonos-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Crear teléfono', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'prefijo',
            'numero',
            'contacto_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
