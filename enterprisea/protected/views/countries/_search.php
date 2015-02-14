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
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FIPS104'); ?>
		<?php echo $form->textField($model,'FIPS104',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ISO2'); ?>
		<?php echo $form->textField($model,'ISO2',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ISO3'); ?>
		<?php echo $form->textField($model,'ISO3',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ISON'); ?>
		<?php echo $form->textField($model,'ISON',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Internet'); ?>
		<?php echo $form->textField($model,'Internet',array('size'=>2,'maxlength'=>2)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Capital'); ?>
		<?php echo $form->textField($model,'Capital',array('size'=>17,'maxlength'=>17)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'MapReference'); ?>
		<?php echo $form->textField($model,'MapReference',array('size'=>49,'maxlength'=>49)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NationalitySingular'); ?>
		<?php echo $form->textField($model,'NationalitySingular',array('size'=>26,'maxlength'=>26)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'NationalityPlural'); ?>
		<?php echo $form->textField($model,'NationalityPlural',array('size'=>28,'maxlength'=>28)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Currency'); ?>
		<?php echo $form->textField($model,'Currency',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'CurrencyCode'); ?>
		<?php echo $form->textField($model,'CurrencyCode',array('size'=>3,'maxlength'=>3)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Population'); ?>
		<?php echo $form->textField($model,'Population'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Title'); ?>
		<?php echo $form->textField($model,'Title',array('size'=>48,'maxlength'=>48)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Comment'); ?>
		<?php echo $form->textField($model,'Comment',array('size'=>60,'maxlength'=>224)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'is_active'); ?>
		<?php echo $form->textField($model,'is_active'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->