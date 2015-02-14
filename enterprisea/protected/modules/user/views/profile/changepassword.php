<div class="pageheader">
      <h2><i class="fa fa-cog"></i> Change Password <span>Subtitle goes here...</span></h2>
      <div class="breadcrumb-wrapper">
        <span class="label">You are here:</span>
        <ol class="breadcrumb">
          <li><a href="index.html">Bracket</a></li>
          <li class="active">Blank</li>
        </ol>
      </div>
    </div>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'changepassword-form',
	'enableAjaxValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>
<div class="contentpanel">
    	<div class="col-sm-9 col-lg-12">
        <div class="panel panel-default">
<div class="panel-heading">
    <h4 class="panel-title"> Change Password</h4>
    <p>Change your password here</p>
</div>
  <div class="panel-body">
	<p class="m_note"><?php echo UserModule::t('Fields with <span class="required">*</span> are required.'); ?></p>
	<?php echo $form->errorSummary($model); ?>
	<div class="row">
    	<div class="col-sm-4">
        	<div class="form-group">
            	<?php echo $form->labelEx($model,'OldPassword',array('class'=>'control-label')); ?>
                <?php echo $form->passwordField($model,'oldPassword',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'oldPassword'); ?>
            </div>
        </div>
    </div>
    <br />
	<div class="row">
    	<div class="col-sm-4">
        	<div class="form-group">
            	<?php echo $form->labelEx($model,'Password',array('class'=>'control-label')); ?>
				<?php echo $form->passwordField($model,'password',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'password'); ?>
                <p class="m_hint">
				<?php echo UserModule::t("Minimal password length 4 symbols."); ?>
                </p>
            </div>
        </div>
    </div>
	<br />
    <div class="row">
    	<div class="col-sm-4">
        	<div class="form-group">
            	<?php echo $form->labelEx($model,'VerifyPassword',array('class'=>'control-label')); ?>
                <?php echo $form->passwordField($model,'verifyPassword',array('class'=>'form-control')); ?>
				<?php echo $form->error($model,'verifyPassword'); ?>
            </div>
        </div>
    </div>
</div>
	<div class="panel-footer">
	<?php echo CHtml::submitButton(UserModule::t("Save"),array('class'=>'btn btn-primary')); ?>
	</div>

<?php $this->endWidget(); ?>

</div>
</div>
</div>