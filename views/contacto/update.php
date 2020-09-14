<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contacto */

$this->title = 'Modificar contacto: ' . $model->nombre . ' ' . $model->apellidos;
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre . ' ' . $model->apellidos, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Modificar';
?>
<div class="contacto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
