<?php

/* @var $this yii\web\View */


use app\models\Flowers;
use app\models\FlowerSlice;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
//use yii\bootstrap4\ActiveForm;


$this->title = \Yii::t('app','Add flower slice');
$this->params['breadcrumbs'][] = ['label' => \Yii::t('app', 'Flowers'), 'url' => ['/flowers']];
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="row">
    <div class="col-lg-5 col-md-12">

        <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
        <?= $form->field($model, 'flower_id')->dropDownList($flowersAr, ['autofocus' => true]) ?>
        <?= $form->field($model, 'type')->dropDownList(FlowerSlice::type()) ?>
        <?= $form->field($model, 'cnt_slice')->textInput() ?>

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