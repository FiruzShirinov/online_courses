<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\helpers\Url;
use yii\bootstrap5\Html;

$this->title = $lesson->title;
$this->params['breadcrumbs'][] = $this->title;
$postUrl = Url::to(['lesson/set-as-watched', 'id' => $lesson->id]);
$csrfToken = Yii::$app->request->getCsrfToken();
$this->registerJs(<<<JS
    $('#set_as_watched').on('click', function() {
        $.ajax({
            url: '$postUrl',
            type: 'post',
            data: {
                _csrf: '$csrfToken'
            },
            success: function () {
                window.location.href= '/lesson/index';
            }
        })
    });
JS);
?>
<div class="site-login">
    <h4 class="border-bottom pb-3 mb-3" style="text-align:justify"><?= Html::encode($this->title) ?></h4>

    <div>
        <div class="mb-3" style="position: relative; overflow: hidden; width: 100%; padding-top: 56.25%;">
            <?= $lesson->iframe ?>
        </div>

        <div class="lh-sm mb-3" style="text-align:justify">
            <?= $lesson->description ?>
        </div>

        <a id="set_as_watched" class="btn btn-primary" href="javascript:void(0)" role="button">Урок просмотрен</a>
    </div>
</div>
