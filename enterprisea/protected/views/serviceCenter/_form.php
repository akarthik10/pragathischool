<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'service-center-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'service_id'); ?>
		<?php echo $form->textField($model,'service_id'); ?>
		<?php echo $form->error($model,'service_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'center_id'); ?>
		<?php echo $form->textField($model,'center_id'); ?>
		<?php echo $form->error($model,'center_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fees'); ?>
		<?php echo $form->textField($model,'fees',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'fees'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->