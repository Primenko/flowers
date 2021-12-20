<?php
/**
 * @var object $flowers
 * @var object $pagination
 */

use app\models\FlowerSlice;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\LinkPager;


//echo "<pre>--------------------------------------------</pre>";
//echo "<pre>".__FILE__.": ".__LINE__."</pre>";
//echo "<pre>";
//var_dump($flowersArData);
//echo "</pre>";
//die;

?>
    <h1><?=\Yii::t('app', 'Flowers slice')?></h1>
    <div class="row" style="text-align: center">
        <div class="col-3"><?= Yii::t('app', 'Flower name (RU)') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Count') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Sold') ?></div>
        <div class="col-3"><?= Yii::t('app', 'Balance') ?></div>
        <?php foreach ($flowersArData as $flower => $typeCnt) { ?>
            <?php if (array_key_exists($flower, $flowersAr)) { ?>
                <div class="col-3"><?= Html::a(Html::encode($flowersAr[$flower]),Url::toRoute(['flowers/flower', 'id' => $flower])) ?></div>
                <div class="col-3"><?= Html::encode($sliceCnt = $typeCnt[FlowerSlice::TYPE_SLICE]['cnt']) ?></div>
                <div class="col-3"><?= Html::encode($soldCnt = $typeCnt[FlowerSlice::TYPE_SOLD]['cnt']) ?></div>
                <div class="col-3"><?= $sliceCnt - $soldCnt?></div>
            <?php } ?>
        <?php } ?>
    </div>

<?php //echo LinkPager::widget(['pagination' => $pagination]) ?>