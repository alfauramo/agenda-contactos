<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

use function PHPSTORM_META\map;

/* @var $this yii\web\View */
/* @var $model app\models\Telefonos */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Teléfonos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="telefonos-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Modificar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Está seguro de eliminar este elemento?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'prefijo',
            'numero',
            [
                'attribute' => 'contacto_id',
                'value' => function ($model) {
                    return $model->contacto->getFullName();
                }
            ]
        ],
    ]) ?>

</div>
