<?php
/**
 * @var object $flowers
 * @var object $pagination
 */

use app\models\FlowerSlice;
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
    <h1><?=\Yii::t('app', 'Flowers slice')?></h1>
    <div class="row" style="text-align: center">
        <div class="col-3"><?= Yii::t('app', 'Flower name (RU)') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Count') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Sold') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Balance') ?></div>
        <?php foreach ($flowersArData as $flower => $typeCnt) { ?>
            <div class="col-3"><?= Html::a(Html::encode($flowersAr[$flower]),'#') ?></div>
            <div class="col-3"><?= Html::encode($sliceCnt = $typeCnt[FlowerSlice::TYPE_SLICE]['cnt']) ?></div>
            <div class="col-3"><?= Html::encode($soldCnt = $typeCnt[FlowerSlice::TYPE_SOLD]['cnt']) ?></div>
            <div class="col-3"><?= $sliceCnt - $soldCnt?></div>
        <?php } ?>
    </div>

<?php //echo LinkPager::widget(['pagination' => $pagination]) ?>