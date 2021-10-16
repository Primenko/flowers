<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-md navbar-dark bg-dark fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => [
            ['label' => \Yii::t('app','Home'), 'url' => ['/site/index']],
            ['label' => \Yii::t('app','About'), 'url' => ['/site/about']],

            Yii::$app->user->isGuest ?'':['label' => \Yii::t('app','Flowers'), 'url' => ['/flowers']],
            Yii::$app->user->isGuest ?'':['label' => \Yii::t('app','Add Flower'), 'url' => ['/flowers/add-flower']],

            Yii::$app->user->isGuest ?'':[
                'label' => \Yii::t('app','Slice'),
                'items' => [
                //                   ['label' => 'Level 1 - Dropdown A', 'url' => '#'],
                //                   '<div class="dropdown-divider"></div>',
                //                   '<div class="dropdown-header">Dropdown Header</div>',
                //                   ['label' => 'Level 1 - Dropdown B', 'url' => '#'],
                  ['label' => \Yii::t('app','Add flower slice'), 'url' => ['/flowers/add-slice']],
                  ['label' => \Yii::t('app','Flowers slice'), 'url' => ['/flowers/flowers-slice']],

                ]
            ],


            ['label' => \Yii::t('app','Contact'), 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => \Yii::t('app','Login'), 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'form-inline'])
                    . Html::submitButton(
                        \Yii::t('app','Logout').' (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<footer class="footer mt-auto py-3 text-muted">
    <div class="container">
        <p class="float-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
