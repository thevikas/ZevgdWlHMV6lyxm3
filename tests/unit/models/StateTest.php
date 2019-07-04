<?php

namespace tests\unit\models;

use app\models\State;
use app\tests\fixtures\{CollectionFixture, StateFixture, CountyFixture};


class StateTest extends \Codeception\Test\Unit
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

    public function testAverageTaxRateForStateInHaryana()
    {
        $state = State::findOne(1);
        $this->assertEquals(5,$state->avgtaxrate);
    }

    public function testAverageCountyCollectionInTamilNadu()
    {
        $state = State::findOne(3);
        $this->assertEquals(25000,$state->avgcoll);
    }

    public function testTotalStateCollectioninDelhi()
    {
        $state = State::findOne(2);
        $this->assertEquals(11000,$state->totalcoll);
    }

}
