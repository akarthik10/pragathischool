<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'center_id'); ?>
		<?php echo $form->textField($model,'center_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'business_format'); ?>
		<?php echo $form->textField($model,'business_format',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registration_no'); ?>
		<?php echo $form->textField($model,'registration_no',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tax_no'); ?>
		<?php echo $form->textField($model,'tax_no',array('size'=>60,'maxlength'=>160)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'vat_no'); ?>
		<?php echo $form->textField($model,'vat_no',array('size'=>60,'maxlength'=>160)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_new'); ?>
		<?php echo $form->textField($model,'is_new'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'opertaing_from'); ?>
		<?php echo $form->textField($model,'opertaing_from',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'center_tutors_no'); ?>
		<?php echo $form->textField($model,'center_tutors_no',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'students_no'); ?>
		<?php echo $form->textField($model,'students_no',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comp_literate'); ?>
		<?php echo $form->textField($model,'comp_literate',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ms_level'); ?>
		<?php echo $form->textField($model,'ms_level',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'computer_no'); ?>
		<?php echo $form->textField($model,'computer_no',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_connected'); ?>
		<?php echo $form->textField($model,'is_connected'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isp'); ?>
		<?php echo $form->textField($model,'isp',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'internet_type'); ?>
		<?php echo $form->textField($model,'internet_type',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'internet_speed'); ?>
		<?php echo $form->textField($model,'internet_speed',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_capped'); ?>
		<?php echo $form->textField($model,'is_capped'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_cam'); ?>
		<?php echo $form->textField($model,'is_cam'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_headset'); ?>
		<?php echo $form->textField($model,'is_headset'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_multifunction'); ?>
		<?php echo $form->textField($model,'is_multifunction'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'multifunction'); ?>
		<?php echo $form->textField($model,'multifunction',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_projector'); ?>
		<?php echo $form->textField($model,'is_projector'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_board'); ?>
		<?php echo $form->textField($model,'is_board'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->