<?php
/**
 * @var object $flowers
 * @var object $pagination
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
    <h1><?=\Yii::t('app', 'Flowers slice')?></h1>
    <div class="row" style="text-align: center">
        <div class="col-4"><?= Yii::t('app', 'Flower name (RU)') ?></div>
        <div class="col-4"><?= Yii::t('app', 'Count') ?></div>
        <div class="col-4"><?= Yii::t('app', 'Date added') ?></div>
        <?php foreach ($flowersSlice as $flowerSlice) { ?>
            <div class="col-4"><?= $flowersAr[$flowerSlice->flower_id] ?></div>
            <div class="col-4"><?= Html::encode($flowerSlice->cnt_slice) ?></div>
            <div class="col-4"><?= Html::encode(date('d',strtotime($flowerSlice->date_added)).' '.Yii::t('app', date('F',strtotime($flowerSlice->date_added))).' '.date('Y H:i',strtotime($flowerSlice->date_added))) ?></div>
        <?php } ?>
    </div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>