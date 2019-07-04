<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\County */

$this->title = 'Update County: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Counties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id_county]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="county-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
