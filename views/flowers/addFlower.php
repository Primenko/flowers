<?php

/* @var $this yii\web\View */


use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap4\ActiveForm;


$this->title = \Yii::t('app','Add Flower');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Flowers'), 'url' => ['/flowers']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-lg-5 col-md-12">

        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
        <?= $form->field($model, 'name_ru')->textInput(['autofocus' => true]) ?>
        <?php //echo $form->field($model, 'name_en')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton(\Yii::t('app', 'Submit'), ['class' => 'btn btn-primary save-flower', 'name' => 'contact-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
<style>
    .help-block {color: red}
    @media (max-width: 999px) {
       .save-flower {
           width: 100%;
           font-size: 2rem;
       }
        .control-label,.form-control {
            font-size: 2rem;
        }
    }
</style>