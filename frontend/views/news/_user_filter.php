<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

  <fieldset>
    <figure>Фильтр</figure>
    <form class="form-horizontal" action="/news/author" method="get">
      <div class="form-group row">
        <label for="author" class="col-sm-2 control-label">Автор:</label>

        <div class="col-sm-8">
          <select id="author" class="form-control" name="id">
            <option value="0">все</option>
            <?php foreach ($authors as $author): ?>
              <option value="<?php echo $author->id; ?>"><?php echo $author->username; ?></option>
            <?php endforeach; ?>
          </select>
        </div>

        <div class="btn-group col-sm-2">
          <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-filter" aria-hidden="true">
          </button>
          <a href="/news/index" class="btn btn-danger" <?php if (!$isFilter): ?>disabled<?php endif; ?>>
            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
          </a>
        </div>

      </div>
    </form>
  </fieldset>


</div>
