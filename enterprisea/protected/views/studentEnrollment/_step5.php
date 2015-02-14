<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-document-_step5-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data', 'style'=>'min-height:300px'),
)); ?>

	

	<?php //echo $form->errorSummary($model); ?>
    <div class="row">
    	<h4 class="text-success">Upload Documentation</h4>
        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <div class="row mb10">
        <div class="col-sm-4">
            <?php echo $form->labelEx($model,'title'); ?>
            <?php echo $form->textField($model,'title',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('title'))); ?>
            <?php echo $form->error($model,'title'); ?>
        </div>
        
        <div class="col-sm-4">
            <?php echo $form->labelEx($model,'file'); ?>
            <?php echo $form->fileField($model,'file'); ?>
            <?php echo $form->error($model,'file'); ?>
        </div>
    	</div>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php $this->widget('CCaptcha'); ?>
                <?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'verifyCode'); ?>
            </div>
        </div>
        <br />
        <div class="row mb10">
        <div class="col-sm-4 buttons">
            <?php echo CHtml::submitButton('Save',array('class'=>"btn btn-success btn-block")); ?>
         </div>
         <div class="col-sm-4 buttons">
            <?php echo CHtml::link('Next step',array('step6', 'token'=>$_GET['token']),array('class'=>"btn btn-default btn-block")); ?>
        </div>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->