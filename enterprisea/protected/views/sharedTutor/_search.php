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
		<?php echo $form->label($model,'provider_id'); ?>
		<?php echo $form->textField($model,'provider_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_category_id'); ?>
		<?php echo $form->textField($model,'course_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course_id'); ?>
		<?php echo $form->textField($model,'course_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'center_name'); ?>
		<?php echo $form->textField($model,'center_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'pd_title'); ?>
		<?php echo $form->textField($model,'pd_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'m_name'); ?>
		<?php echo $form->textField($model,'m_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'surname'); ?>
		<?php echo $form->textField($model,'surname',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marital_status'); ?>
		<?php echo $form->textField($model,'marital_status',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dob'); ?>
		<?php echo $form->textField($model,'dob'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'age'); ?>
		<?php echo $form->textField($model,'age'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'birth_place'); ?>
		<?php echo $form->textField($model,'birth_place',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nationality'); ?>
		<?php echo $form->textField($model,'nationality',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ethnicity'); ?>
		<?php echo $form->textField($model,'ethnicity',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'passport_id'); ?>
		<?php echo $form->textField($model,'passport_id',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tax_no'); ?>
		<?php echo $form->textField($model,'tax_no',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gender'); ?>
		<?php echo $form->textField($model,'gender',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'religion'); ?>
		<?php echo $form->textField($model,'religion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spouse_name'); ?>
		<?php echo $form->textField($model,'spouse_name',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spouse_dob'); ?>
		<?php echo $form->textField($model,'spouse_dob',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'spouse_passport_id'); ?>
		<?php echo $form->textField($model,'spouse_passport_id',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ph_country'); ?>
		<?php echo $form->textField($model,'ph_country',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ph_province'); ?>
		<?php echo $form->textField($model,'ph_province',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ph_city'); ?>
		<?php echo $form->textField($model,'ph_city',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ph_suburb'); ?>
		<?php echo $form->textField($model,'ph_suburb',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ph_zipcode'); ?>
		<?php echo $form->textField($model,'ph_zipcode',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ph_address1'); ?>
		<?php echo $form->textField($model,'ph_address1',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ph_address2'); ?>
		<?php echo $form->textField($model,'ph_address2',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ph_address3'); ?>
		<?php echo $form->textField($model,'ph_address3',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ph_home_no'); ?>
		<?php echo $form->textField($model,'ph_home_no',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ph_office_no'); ?>
		<?php echo $form->textField($model,'ph_office_no',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ph_cell_no'); ?>
		<?php echo $form->textField($model,'ph_cell_no',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'po_country'); ?>
		<?php echo $form->textField($model,'po_country',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'po_province'); ?>
		<?php echo $form->textField($model,'po_province',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'po_city'); ?>
		<?php echo $form->textField($model,'po_city',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'po_suburb'); ?>
		<?php echo $form->textField($model,'po_suburb',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'po_zipcode'); ?>
		<?php echo $form->textField($model,'po_zipcode',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'po_box'); ?>
		<?php echo $form->textField($model,'po_box',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skype'); ?>
		<?php echo $form->textField($model,'skype',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'occupation'); ?>
		<?php echo $form->textField($model,'occupation',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'qualification'); ?>
		<?php echo $form->textField($model,'qualification',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timing'); ?>
		<?php echo $form->textField($model,'timing'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registered_sace'); ?>
		<?php echo $form->textField($model,'registered_sace'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sace_number'); ?>
		<?php echo $form->textField($model,'sace_number',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'support_center'); ?>
		<?php echo $form->textField($model,'support_center'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sc_students'); ?>
		<?php echo $form->textField($model,'sc_students'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sc_tutors'); ?>
		<?php echo $form->textField($model,'sc_tutors'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'grades'); ?>
		<?php echo $form->textField($model,'grades',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'achievements'); ?>
		<?php echo $form->textArea($model,'achievements',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->