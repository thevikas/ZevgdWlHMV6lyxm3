<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
use app\models\State;
use app\models\County;
use app\models\Collection;

$this->title = 'My Yii Application';
?>
<style type="text/css">
    .jumbotron a
    {
        margin: 1em;
    }
</style>
<div class="site-index">

    <div class="jumbotron">

            <?php
            echo Html::a('States',['state/index'],['class' => 'btn btn-lg btn-success']);
            echo Html::a('County',['county/index'],['class' => 'btn btn-lg btn-success']);
            echo Html::a('Tax Collections',['collection/index'],['class' => 'btn btn-lg btn-success']);
            echo Html::a('Report',['collection/report'],['class' => 'btn btn-lg btn-success']);
            ?>

    </div>

</div>
