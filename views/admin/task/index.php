<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TaskSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tasks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tasks-index">

  <h1><?= Html::encode($this->title) ?></h1>
  <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <p>
    <?= Html::a('Create Tasks', ['create'], ['class' => 'btn btn-success']) ?>
  </p>
    <?php $form = \yii\widgets\ActiveForm::begin(['method' => 'get']) ?>
    <?= $form->field($searchModel, 'date')->widget(\yii\jui\DatePicker::class, ['dateFormat' => 'yyyy-MM'])?>
    <?= $form->field($searchModel, 'username')->textInput()?>
    <?= Html::submitButton('Отфильтровать') ?>
    <?php \yii\widgets\ActiveForm::end() ?>


    <?= \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => 'taskItem',
        'itemOptions' => function ($model) {
            return ['tag' => 'a', 'href' => \yii\helpers\Url::to(['view', 'id' => $model->id])];
        },
    ]) ?>
    
    
    
    
<!--  --><?//= GridView::widget([
//    'dataProvider' => $dataProvider,
//    'filterModel' => $searchModel,
//    'columns' => [
//      ['class' => 'yii\grid\SerialColumn'],
//
//      'id',
//      'title',
//      'description',
//      'date',
////            'user_id',
//      'username',
//
//      ['class' => 'yii\grid\ActionColumn'],
//    ],
//  ]); ?>
</div>
