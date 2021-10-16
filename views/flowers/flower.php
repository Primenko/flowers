<?php
/**
 * @var object $flowers
 * @var object $pagination
 */

use app\models\FlowerSlice;
use yii\helpers\Html;
use yii\widgets\LinkPager;
$balance = 0
?>
    <h1><?=\Yii::t('app', 'Flowers slice')?></h1>
    <div class="row" style="text-align: center">
        <div class="col-3"><?= Yii::t('app', 'Type') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Count') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Date added') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Balance') ?></div>
        <?php foreach ($flowerRecords as $flowerRecord) { ?>
            <div class="col-3"><?= FlowerSlice::type()[$flowerRecord['type']] ?></div>
            <div class="col-3"><?= $flowerRecord['cnt'] ?></div>
            <div class="col-3"><?= $flowerRecord['date'] ?></div>
            <div class="col-3"><?= ($flowerRecord['type'] === FlowerSlice::TYPE_SLICE)?$balance += $flowerRecord['cnt'] : $balance -= $flowerRecord['cnt']?></div>
        <?php } ?>
    </div>

