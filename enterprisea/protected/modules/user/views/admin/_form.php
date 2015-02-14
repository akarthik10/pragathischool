<div class="form-horizontal form-bordered">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
));
?>

	<p class="m_note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

	<div class="form-group">
		<?php echo $form->labelEx($model,'username',array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-6">
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
        </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'password',array('class'=>'col-sm-3 control-label')); ?>
         <div class="col-sm-6">
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'password'); ?>
        </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'email',array('class'=>'col-sm-3 control-label')); ?>
         <div class="col-sm-6">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
        </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'superuser',array('class'=>'col-sm-3 control-label')); ?>
         <div class="col-sm-6">
		<?php echo $form->dropDownList($model,'superuser',User::itemAlias('AdminStatus'),array('class'=>'form-control input-lg')); ?>
		<?php echo $form->error($model,'superuser'); ?>
        </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'status',array('class'=>'col-sm-3 control-label')); ?>
         <div class="col-sm-6">
		<?php echo $form->dropDownList($model,'status',User::itemAlias('UserStatus'),array('class'=>'form-control input-lg')); ?>
		<?php echo $form->error($model,'status'); ?>
        </div>
	</div>
<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="form-group">
		<?php echo $form->labelEx($profile,$field->varname,array('class'=>'col-sm-3 control-label')); ?>
         <div class="col-sm-6">
		<?php 
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo CHtml::activeTextArea($profile,$field->varname,array('rows'=>6, 'cols'=>50,'class'=>'form-control'));
		} else {
			echo $form->textField($profile,$field->varname,array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255),'class'=>'form-control'));
		}
		 ?>
		<?php echo $form->error($profile,$field->varname); ?>
        </div>
	</div>
			<?php
			}
		}
?>
	<div class="panel-footer">
	<div class="row">
    	<div class="col-sm-6 col-sm-offset-3">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),array('class'=>'btn btn-primary')); ?>
        </div>
	</div>
	</div>
<?php $this->endWidget(); ?>

</div><!-- form -->