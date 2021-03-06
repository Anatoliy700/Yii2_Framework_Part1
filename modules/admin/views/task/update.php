<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\tables\Tasks */
/* @var $users array */

$this->title = 'Update Tasks: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Админ панель', 'url' => ['admin/index']];
$this->params['breadcrumbs'][] = ['label' => 'Tasks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tasks-update">

  <h1><?= Html::encode($this->title) ?></h1>
  
  <?= $this->render('_form', [
    'model' => $model,
    'users' => $users
  ]) ?>

</div>
