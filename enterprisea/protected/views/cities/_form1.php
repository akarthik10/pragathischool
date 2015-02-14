<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cities-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->textField($model,'country_id'); ?>
		<?php echo $form->error($model,'country_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province_id'); ?>
		<?php echo $form->textField($model,'province_id'); ?>
		<?php echo $form->error($model,'province_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Latitude'); ?>
		<?php echo $form->textField($model,'Latitude',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'Latitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Longitude'); ?>
		<?php echo $form->textField($model,'Longitude',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'TimeZone'); ?>
		<?php echo $form->textField($model,'TimeZone',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'TimeZone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DmaId'); ?>
		<?php echo $form->textField($model,'DmaId'); ?>
		<?php echo $form->error($model,'DmaId'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Code'); ?>
		<?php echo $form->textField($model,'Code',array('size'=>4,'maxlength'=>4)); ?>
		<?php echo $form->error($model,'Code'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->