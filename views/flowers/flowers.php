<?php
/**
 * @var object $flowers
 * @var object $pagination
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
    <h1><?=\Yii::t('app', 'Flowers')?></h1>
    <ol>
        <?php foreach ($flowers as $flower) {?>
            <li>
                <?= Html::a(Html::encode($flower->name_ru),'#') ?>
            </li>
        <?php } ?>
    </ol>

<?= LinkPager::widget(['pagination' => $pagination]) ?>