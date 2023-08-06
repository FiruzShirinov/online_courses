<?php

namespace app\models;

use Yii;
use app\models\User;
use yii\db\ActiveRecord;

class Lesson extends ActiveRecord
{
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->viaTable('user_lesson', ['lesson_id' => 'id']);
    }

    public function getIsWatchedByUser()
    {
        return $this->getUsers()->where(['user.id' => Yii::$app->user->id])->exists();
    }
}