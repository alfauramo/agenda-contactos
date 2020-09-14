<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\models\Contacto;

/* @var $this yii\web\View */
/* @var $model app\models\Telefonos */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="telefonos-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'prefijo')->textInput() ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'numero')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?php echo $form->field($model, 'contacto_id')->widget(Select2::classname(), [
                'language' => 'es',
                'data' => Contacto::toDropDown(),
                'options' => [
                    'placeholder' => 'Selecciona un contacto',
                ],
                'pluginOptions' => [
                    'allowClear' => true,
                ],
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?php echo Html::a('Volver sin guardar', ['/telefonos/index'], ['class' => 'btn btn-danger']); ?>
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>