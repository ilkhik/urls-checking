<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CheckingUrl */
/* @var $form ActiveForm */
?>
<div class="container">
    <div class="main-index">
        <div class="row">
            <div class="col-12 col-lg-3">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'url')->textInput() ?>
                <?=
                $form->field($model, 'check_interval')->dropDownList([
                    1 => '1 minute',
                    5 => '5 minutes',
                    10 => '10 minutes',
                ])
                ?>
<?= $form->field($model, 'retries_number')->textInput() ?>

                <br>
                <?php if (isset($success)) : ?>
                <div style="color:green">Url added successfully</div><br>
                    <?php endif; ?>
                <div class="form-group">
                <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
                </div>
<?php ActiveForm::end(); ?>
            </div>
        </div>
    </div><!-- main-index -->
</div>
