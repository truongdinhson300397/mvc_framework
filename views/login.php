
<h1>Login</h1>
<?php $form = \app\core\form\Form::begin('', "post") ?>
<?php echo $form->field($model,'email'); ?>
<?php echo $form->field($model,'password')->fieldPassword(); ?>
<button type="submit">Submit</button>
<?php \app\core\form\Form::end() ?>
