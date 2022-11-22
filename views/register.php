<h1>Register</h1>
<?php //echo \app\core\Application::$app->session->getFlash('success') ?>
<?php $form = \app\core\form\Form::begin('', "post") ?>
<?php echo $form->field($model,'name'); ?>
<?php echo $form->field($model,'email'); ?>
<?php echo $form->field($model,'password')->fieldPassword(); ?>
<?php echo $form->field($model,'confirm_password')->fieldPassword(); ?>
<button type="submit">Submit</button>
<?php \app\core\form\Form::end() ?>
<!--<form action="" method="post">-->
<!--    <div class="form-group">-->
<!--        <label>name</label>-->
<!--        <input type="text" name="name" value="--><?php //echo $model->name ?><!--"/>-->
<!--        <div class='invalid-feedback'>-->
<!--            --><?php //echo $model->getFirstError('name') ?>
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label>email</label>-->
<!--        <input type="text" name="email" value="--><?php //echo $model->email ?><!--"-->
<!--               class="form-control--><?php //echo $model->hasError('email') ? ' is-invalid' : '' ?><!--">-->
<!--        <div class='invalid-feedback'>-->
<!--			--><?php //echo $model->getFirstError('email') ?>
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label>password</label>-->
<!--        <input type="text" name="name" value="--><?php //echo $model->password ?><!--"-->
<!--               class="form-control--><?php //echo $model->hasError('password') ? ' is-invalid' : '' ?><!--">-->
<!--        <div class='invalid-feedback'>-->
<!--			--><?php //echo $model->getFirstError('password') ?>
<!--        </div>-->
<!--    </div>-->
<!--    <div class="form-group">-->
<!--        <label>confirm password</label>-->
<!--        <input type="text" name="name" value="--><?php //echo $model->confirm_password ?><!--"-->
<!--               class="form-control--><?php //echo $model->hasError('confirm_password') ? ' is-invalid' : '' ?><!--">-->
<!--        <div class='invalid-feedback'>-->
<!--			--><?php //echo $model->getFirstError('confirm_password') ?>
<!--        </div>-->
<!--    </div>-->
<!--	<button type="submit">Submit</button>-->
<!--</form>-->
