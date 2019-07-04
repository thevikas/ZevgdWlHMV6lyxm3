<?php
namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class CollectionFixture extends ActiveFixture
{
    public $modelClass = 'app\models\Collection';
    public $depends = ['app\tests\fixtures\StateFixture',
                        'app\tests\fixtures\CountyFixture'];
}