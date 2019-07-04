<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Collection */

$this->title = 'Collection Report';
$this->params['breadcrumbs'][] = ['label' => 'Collections', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="collection-view">

    <h1>Report</h1>

    <table class="table">
    <tr><td>Average State Tax Collection</td><td><?=$data['avgstatecoll']?></td></tr>
    <tr><td>Total Tax Collection in Country</td><td><?=$data['totalcoll']?></td></tr>
    <tr><td>Average State Tax Rate %</td><td><?=$data['avgtaxrate']?></td></tr>
    </table>
</div>
