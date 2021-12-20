<?php
/**
 * @var object $flowers
 * @var object $pagination
 */

use app\models\FlowerSlice;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
    <h1><?=\Yii::t('app', 'Flowers slice')?></h1>
    <div class="row" style="text-align: center">
        <div class="col-3"><?= Yii::t('app', 'Flower name (RU)') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Count') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Sold') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Balance') ?></div>
        <?php foreach ($flowersArData as $flower => $typeCnt) { $sliceCnt = 0;$soldCnt = 0;?>
            <?php if (array_key_exists($flower, $flowersAr)) { ?>
                <div class="col-3"><?= Html::a(Html::encode($flowersAr[$flower]),Url::toRoute(['flowers/flower', 'id' => $flower])) ?></div>
                <div class="col-3"><?= $sliceCnt = (array_key_exists(FlowerSlice::TYPE_SLICE, $typeCnt)?Html::encode($typeCnt[FlowerSlice::TYPE_SLICE]['cnt']):0) ?></div>
                <div class="col-3"><?= $soldCnt = (array_key_exists(FlowerSlice::TYPE_SOLD, $typeCnt)?Html::encode( $typeCnt[FlowerSlice::TYPE_SOLD]['cnt']):0) ?></div>
                <div class="col-3"><?= $sliceCnt - $soldCnt?></div>
            <?php } ?>
        <?php } ?>
    </div>

<?php //echo LinkPager::widget(['pagination' => $pagination]) ?>