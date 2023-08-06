<?php

namespace app\controllers;

use Yii;
use app\models\User;
use app\models\Lesson;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class LessonController extends Controller
{
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) $this->redirect(['login']);
        
        $lessons = Lesson::find()->all();
        return $this->render('index', compact('lessons'));
    }

    public function actionView($id)
    {
        if (Yii::$app->user->isGuest) $this->redirect(['login']);

        $lesson = Lesson::findOne($id);

        if ($lesson === null) {
            throw new NotFoundHttpException;
        }

        return $this->render('view', compact('lesson'));
    }

    public function actionSetAsWatched($id)
    {
        if (!Yii::$app->user->isGuest && Yii::$app->request->isAjax) {
            $lesson = Lesson::findOne($id);
            $user = User::findIdentity(Yii::$app->user->id);
            if (!$lesson->getIsWatchedByUser()) {
                $lesson->link('users', $user);
            }
        }
    }
}