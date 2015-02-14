
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'student-previous-datas-_step2-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php //echo $form->errorSummary($model); ?>
    
    <h4 class="text-success">ACADEMIC HISTORY</h4>
 <p class="note">Fields with <span class="required">*</span> are required.</p>
	<div class="row mb10">
    	<div class="col-sm-4">
		<?php echo $form->labelEx($model,'institution',array('class'=>'control-label')); ?>
		<?php echo $form->textField($model,'institution', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('institution'))); ?>
		<?php echo $form->error($model,'institution'); ?>
        </div>
        <div class="col-sm-4">
        	<?php echo $form->labelEx($model,'course',array('class'=>'control-label')); ?>
			<?php echo $form->textField($model,'course', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('course'))); ?>
            <?php echo $form->error($model,'course'); ?>
        </div>
        <div class="col-sm-4">
        	<?php echo $form->labelEx($model,'year',array('class'=>'control-label')); ?>
		<?php 
		$this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'model'=>$model,
			'attribute'=>'year',
			// additional javascript options for the date picker plugin
			'options'=>array(
				'showAnim'=>'fold',
				'dateFormat'=>'mm/yy',
				'changeMonth'=> true,
				'changeYear'=>true,
				'yearRange'=>'1900:'.date('Y')
			),
			'htmlOptions'=>array(
				'class'=>'form-control',
				'placeholder'=>$model->getAttributeLabel('year'),
			),
		));
		?>
		<?php echo $form->error($model,'year'); ?>
        </div>
	</div>


	<div class="row mb10">
    	<div class="col-sm-4">
			<?php echo $form->labelEx($model,'total_mark',array('class'=>'control-label')); ?>
            <?php echo $form->textField($model,'total_mark', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('total_mark'))); ?>
            <?php echo $form->error($model,'total_mark'); ?>
        </div>
        <div class="col-sm-4">
        	<?php echo $form->labelEx($model,'contact_person',array('class'=>'control-label')); ?>
			<?php echo $form->textField($model,'contact_person', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('contact_person'))); ?>
            <?php echo $form->error($model,'contact_person'); ?>
        </div>
         <div class="col-sm-4">
         	<?php echo $form->labelEx($model,'contact_number',array('class'=>'control-label')); ?>
			<?php echo $form->textField($model,'contact_number', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('contact_number'))); ?>
            <?php echo $form->error($model,'contact_number'); ?>
         </div>
	</div>
	<div>
		<?php echo $form->labelEx($model,'achievements'); ?>
		<?php echo $form->textArea($model,'achievements', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('achievements'))); ?>
		<?php echo $form->error($model,'achievements'); ?>
	</div>
    
    <div style="padding-top:10px;">
		<?php echo $form->labelEx($model,'disciplinary_history'); ?>
		<?php echo $form->textArea($model,'disciplinary_history', array('class'=>'form-control', 'placeholder'=>$model->getAttributeLabel('disciplinary_history'))); ?>
		<?php echo $form->error($model,'disciplinary_history'); ?>
	</div>
    
    <div class="row mb10">
        <div class="col-sm-4">
            <?php $this->widget('CCaptcha'); ?>
            <?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'verifyCode'); ?>
        </div>
    </div> 

	<br/>
	<div class="row mb10">
    	<div class="col-sm-4">
		<?php echo CHtml::submitButton('Save & Continue',array('class'=>"btn btn-success btn-block")); ?>
        </div>
        <div class="col-sm-4">
        <?php echo CHtml::link('Subjects Enrolling For',array('step3', 'token'=>$_GET['token']),array('class'=>"btn btn-default btn-block")); ?>
        </div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->