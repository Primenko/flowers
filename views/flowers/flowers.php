<?php
/**
 * @var object $flowers
 * @var object $pagination
 */
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\web\View;

?>
    <h1><?=\Yii::t('app', 'Flowers')?></h1>
    <ol>
        <?php foreach ($flowers as $flower) {?>
            <li class="<?="row_id".$flower->id?>">
                <?= Html::a(Html::encode($flower->name_ru),'#') ?>
                <button style="" type="button" class="btn btn-primary" data-toggle="modal" data-target="<?="#modal_id".$flower->id?>">
                    <?=Yii::t('app', 'Actions')?>
                </button>
            </li>
            <div class="modal fade" id="<?="modal_id".$flower->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel"><?=ucwords($flower->name_ru)?></h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?=Yii::t('app', 'Are you sure you want to archive???')?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal"><?=Yii::t('app', 'Close')?></button>
                            <button type="button" data-id="<?=$flower->id?>" id="archive_flower"  class="btn btn-primary"><?=Yii::t('app', 'Archive')?></button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </ol>

<?php
$this->registerJs(
    "$('#archive_flower').on('click', function() {
        var id = $(this).attr('data-id');
        $.ajax({
            url: '/flowers/archive-flower?id=' + id,
            type: 'GET',
            complete: function (jqXHR, textStatus) {
            },
            beforeSend: function (jqXHR, settings) {
            },
            success: function (msgs) {
                msgs = JSON.parse(msgs);
                               
                if (msgs.save == 1) {
                    $('#modal_id' + id).modal('hide');
                    $('.row_id' + id).css('display','none');
                }
            },
            error: function () {
            }
        });
     });",
    View::POS_END,
    'archive_flower'
);
?>


<?= LinkPager::widget(['pagination' => $pagination]) ?>