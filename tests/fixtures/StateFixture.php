<?php
namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class StateFixture extends ActiveFixture
{
    public $modelClass = 'app\models\State';
    public $depends = [/*'app\tests\fixtures\UserFixture'*/];
}