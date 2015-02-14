<div class="pageheader">
      <h2><i class="fa fa-home"></i> Manage Users <span>Subtitle goes here...</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">Bracket</a></li>
          <li class="active">Blank</li>
        </ol>
      </div>
    </div>
<div class="contentpanel">
    	<div class="col-sm-9 col-lg-12">
<div class="panel panel-default">
	<div class="panel-heading" style="position:relative;">
	<div class="btn-demo file_up" style="position:relative; top:-8px; right:3px; float:right;">
		<?php echo CHtml::link('Edit',array('/user/profile/edit'),array('class'=>'btn btn-success')); ?></div>
              <!-- panel-btns -->
              <div class="clear"></div>
              <h3 class="panel-title">Edit Profile </h3>
</div>
    <div class="panel-body">    
    

<?php if(Yii::app()->user->hasFlash('profileMessage')): ?>
<div class="m_success">
<?php echo Yii::app()->user->getFlash('profileMessage'); ?>
</div>
<?php endif; ?>
<div class="form-horizontal form-bordered">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profile-form',
	'enableAjaxValidation'=>true,
	'htmlOptions' => array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="m_note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>

	<?php echo $form->errorSummary(array($model,$profile)); ?>

<?php 
		$profileFields=$profile->getFields();
		if ($profileFields) {
			foreach($profileFields as $field) {
			?>
	<div class="form-group">
		<?php echo $form->labelEx($profile,$field->varname,array('class'=>'col-sm-3 control-label'));
		echo '<div class="col-sm-6">';
		if ($widgetEdit = $field->widgetEdit($profile)) {
			echo $widgetEdit;
		} elseif ($field->range) {
			echo $form->dropDownList($profile,$field->varname,Profile::range($field->range));
		} elseif ($field->field_type=="TEXT") {
			echo $form->textArea($profile,$field->varname,array('rows'=>6, 'cols'=>50,'class'=>'form-control'));
		} else {
			echo $form->textField($profile,$field->varname,array('class'=>'form-control'),array('size'=>60,'maxlength'=>(($field->field_size)?$field->field_size:255)));
		}
		echo $form->error($profile,$field->varname); ?>
        </div>	
	</div>	
			<?php
			}
		}
?>
	<div class="form-group">
		<?php echo $form->labelEx($model,'Username',array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-6">
		<?php echo $form->textField($model,'username',array('size'=>20,'maxlength'=>20,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'username'); ?>
        </div>
	</div>

	<div class="form-group">
		<?php echo $form->labelEx($model,'Email',array('class'=>'col-sm-3 control-label')); ?>
        <div class="col-sm-6">
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128,'class'=>'form-control')); ?>
		<?php echo $form->error($model,'email'); ?>
        </div>
	</div>

	<div class="panel-footer">
	<div class="row">
    	<div class="col-sm-6 col-sm-offset-3">
		<?php echo CHtml::submitButton($model->isNewRecord ? UserModule::t('Create') : UserModule::t('Save'),array('class'=>'btn btn-primary')); ?>
	  </div>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
</div>
	</div>
</div>
</div>
</div>