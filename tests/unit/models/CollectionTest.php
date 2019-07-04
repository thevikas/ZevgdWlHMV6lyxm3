<?php

namespace tests\unit\models;

use app\models\Collection;
use app\tests\fixtures\{CollectionFixture, StateFixture, CountyFixture};

class CollectionTest extends \Codeception\Test\Unit
{

    private $model;

    public function _before()
    {
        \Yii::setLogger(\Yii::createObject(\yii\log\Logger::class));
        \Yii::$app->log->setLogger(\Yii::getLogger());
    }

    public function _after()
    {
        \Yii::getLogger()->flush();
    }

    public function _fixtures()
    {
        return [
            'collection' => [
                'class' => CollectionFixture::className(),
                'dataFile' => codecept_data_dir() . 'collection.php'
            ],
            'state' => [
                'class' => StateFixture::className(),
                'dataFile' => codecept_data_dir() . 'state.php'
            ],
            'county' => [
                'class' => CountyFixture::className(),
                'dataFile' => codecept_data_dir() . 'county.php'
            ],
        ];
    }

    /**
     * @var \UnitTester
     */
    public $tester;

    public function testReport()
    {
        $data = Collection::report();
        $this->assertEquals(140500,$data['totalcoll']);
        $this->assertEquals(4.17,$data['avgtaxrate']);
        $this->assertEquals(46833,$data['avgstatecoll']);
    }

}
