<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = $title ?? 'Последние новости';
$this->params['breadcrumbs'][] = $this->title;

list( , $webPath) = Yii::$app->getAssetManager()->publish('@frontend' . '/assets/uploads');

?>
<div class="news-index">

  <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_user_filter', [
        'authors'=> $authors,
  ]) ?>

  <?php foreach ($news as $item): ?>
    <div class="panel panel-default">
      <div class="panel-heading"><?php echo $item->title; ?></div>
      <div class="panel-body">
        <div class="article">
          <img class="img-thumbnail" src="<?php echo $webPath . '/' . $item->image; ?>" alt="">
          <p class="text"><?php echo $item->text; ?></p>
        </div>
      </div>
      <div class="panel-footer">Автор: <?php echo $item->author->username; ?></div>
    </div>
  <?php endforeach ?>

</div>
