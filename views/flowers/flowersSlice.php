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
        <div class="col-3"><?= Yii::t('app', 'Flower name (RU)') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Count') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Sold') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Balance') ?></div>
        <?php foreach ($flowersSlice as $flowerSlice) { ?>
            <div class="col-3"><?= $flowersAr[$flowerSlice->flower_id] ?></div>
            <div class="col-3"><?= Html::encode($flowerSlice->cnt_slice) ?></div>
            <div class="col-3">100</div>
            <div class="col-3">224</div>
        <?php } ?>
    </div>

<?= LinkPager::widget(['pagination' => $pagination]) ?>