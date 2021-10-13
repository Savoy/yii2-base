<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model app\modules\clients\models\ResendVerificationEmailForm */

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Подтверждение E-mail';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="base-resend-verification-email">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Для повторного запроса продтверждения укажите Ваш e-mail</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <div class="form-group">
                <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
