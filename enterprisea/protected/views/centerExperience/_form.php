<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'center-experience-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'center_id'); ?>
		<?php echo $form->textField($model,'center_id'); ?>
		<?php echo $form->error($model,'center_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'year'); ?>
		<?php echo $form->textField($model,'year',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'year'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province'); ?>
		<?php echo $form->textField($model,'province',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'province'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'university'); ?>
		<?php echo $form->textField($model,'university',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'university'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'degree'); ?>
		<?php echo $form->textField($model,'degree',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'degree'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_person'); ?>
		<?php echo $form->textField($model,'contact_person',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_person'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_no'); ?>
		<?php echo $form->textField($model,'contact_no',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'contact_no'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->