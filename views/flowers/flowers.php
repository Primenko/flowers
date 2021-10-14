<?php
/**
 * @var object $flowers
 * @var object $pagination
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
    <h1><?=\Yii::t('app', 'Flowers')?></h1>
    <ul>
        <?php foreach ($flowers as $flower) {?>
            <li>
                <?= $flower->id ?>
                <?= Html::encode($flower->name_ru) ?>
            </li>
        <?php } ?>
    </ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>