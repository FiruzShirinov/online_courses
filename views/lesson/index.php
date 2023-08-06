<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use app\models\User;
use yii\helpers\Url;
use yii\bootstrap5\Html;

$this->title = 'Уроки курса: Типы числительных и их склонение';
$this->params['breadcrumbs'][] = $this->title;

$user = User::findOne(Yii::$app->user->id);
?>
<div class="site-login">
    <h1 class="border-bottom pb-3"><?= Html::encode($this->title) ?>
        <span class="text-info"><?= count($user->watchedLessons) === count($lessons) ? ' - Курс пройден' : '' ?></span>
    </h1>

    <?php foreach ($lessons as $lesson): ?>
        <div class="d-flex">
            <a href="<?= Url::to(['lesson/view', 'id' => $lesson->id]) ?>" class="text-decoration-none" style="text-align:justify">
                <?= $lesson->title ?>
            </a>
            <?php if ($lesson->isWatchedByUser): ?>
            <div class="ms-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle" viewBox="0 0 16 16">
                    <g color="green">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                    </g>
                </svg>
            </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

</div>
