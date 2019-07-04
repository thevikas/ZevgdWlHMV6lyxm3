<?php
<?php
namespace app\tests\fixtures;

use yii\test\ActiveFixture;

class CountyFixture extends ActiveFixture
{
    public $modelClass = 'app\models\County';
    public $depends = ['app\tests\fixtures\StateFixture'];
}