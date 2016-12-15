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
      <div class="form-group">
        <label for="author" class="col-sm-2 control-label">Автор:</label>
        <div class="col-sm-8">
          <select id="author" class="form-control" name="id">
            <option value="0">все</option>
            <?php foreach ($authors as $author): ?>
              <option value="<?php echo $author->id; ?>"><?php echo $author->username; ?></option>
            <?php endforeach; ?>

          </select>
        </div>
        <button type="submit" class="col-sm-2 btn btn-default">Выбрать</button>
      </div>

    </form>
  </fieldset>


</div>
