<div style="position:relative;" class="panel-heading">
    	<div class="clear"></div>
        	<h3 class="panel-title">Location & Requirements</h3>
            
  </div>
<div class="panel panel-default">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'center-location-form',
	'enableAjaxValidation'=>false,
)); ?>
     
	<div class="form">
    <div class="panel-body">
    


	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
    
    <div class="col-sm-4">
    <?php echo $form->hiddenField($model,'center_id',array('value'=>$_REQUEST['id'])); ?>
    
        
        <div class="form-group">
             	<label class="control-label">Where will you be operating from?<span class="required">*</span></label>
                
				
		<?php echo $form->textField($model,'opertaing_from',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
		<?php echo $form->error($model,'opertaing_from'); ?>                             </div>
        
      
    
    <div class="form-group">
             	<label class="control-label">What are your skills levels with Microsoft Office? <span class="required">*</span></label>
                
		<?php echo $form->textField($model,'ms_level',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
		<?php echo $form->error($model,'ms_level'); ?>                             </div>
        
        <?php /*?><div class="form-group">
             	<label class="control-label">Are they connected on a wireless network and to the Internet?<span class="required">*</span></label>
                
		<div class="col-sm-12">		
		<?php echo $form->radioButtonList($model, 'is_connected', array('1'=>'Yes', '0'=>'No'), array('uncheckValue'=>null, 'onclick'=>"",'labelOptions'=>array('style'=>'display:inline'),'separator'=>' &nbsp;&nbsp;')); ?>
		<?php echo $form->error($model,'is_connected'); ?>                             </div></div><?php */?>
        
        <div class="form-group">
    
   <label class="control-label">What Internet connection do you have?<span class="required">*</span></label><br />
		<?php echo $form->checkBoxList($model,'internet_type',array('3G'=>'3G','4G'=>'4G','ADSL'=>'ADSL','Other'=>'Other'),array('template'=>'<div class="col-sm-6">{input} {label}</div>','separator'=>'')); ?>
		<?php echo $form->error($model,'internet_type'); ?>
    </div>
        
        
        <div class="form-group">
             	<label class="control-label">Capped or Un-capped?<span class="required">*</span></label>
         <div class="col-sm-12">       
		<?php echo $form->radioButtonList($model, 'is_capped', array('1'=>'Capped', '0'=>'Uncapped'), array('uncheckValue'=>null, 'onclick'=>"",'labelOptions'=>array('style'=>'display:inline'),'separator'=>' &nbsp;&nbsp;')); ?>
		<?php echo $form->error($model,'is_capped'); ?></div>                             </div>
        
        <div class="form-group">
    
   <label class="control-label">Do you have a web cam?<span class="required">*</span></label>
   
   <div class="col-sm-12">
		<?php echo $form->radioButtonList($model, 'is_cam', array('1'=>'Yes', '0'=>'No'), array('uncheckValue'=>null, 'onclick'=>"",'labelOptions'=>array('style'=>'display:inline'),'separator'=>' &nbsp;&nbsp;')); ?>
		<?php echo $form->error($model,'is_cam'); ?>
    </div>
    </div>
        
        <div class="form-group">
             	<label class="control-label">Do you have a wireless headset?<span class="required">*</span></label>
                <div class="col-sm-12">
                
				
		<?php echo $form->radioButtonList($model, 'is_headset', array('1'=>'Yes', '0'=>'No'), array('uncheckValue'=>null, 'onclick'=>"",'labelOptions'=>array('style'=>'display:inline'),'separator'=>' &nbsp;&nbsp;')); ?>
		<?php echo $form->error($model,'is_headset'); ?>                             </div></div>
        
        <div class="form-group">
    
   <label class="control-label">Do you have a projector?<span class="required">*</span></label>
   <div class="col-sm-12">
		<?php echo $form->radioButtonList($model, 'is_projector', array('1'=>'Yes', '0'=>'No'), array('uncheckValue'=>null, 'onclick'=>"",'labelOptions'=>array('style'=>'display:inline'),'separator'=>' &nbsp;&nbsp;')); ?>
		<?php echo $form->error($model,'is_projector'); ?>
    </div></div>
    
    </div>
    <div class="col-sm-4 col-sm-offset-1">
    
    
        
       
        
        
    
    
        
        <div class="form-group">
             	<label class="control-label">Are you computer literate? (give details of experience)<span class="required">*</span></label>
                
				
		<?php echo $form->textField($model,'comp_literate',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
		<?php echo $form->error($model,'comp_literate'); ?>                             </div>
        
        <div class="form-group">
    
   <label class="control-label">What computer do you have? (Give specifications)<span class="required">*</span></label>
		<?php echo $form->textField($model,'computer_no',array('size'=>60,'maxlength'=>120,'class'=>'form-control mb15')); ?>
		<?php echo $form->error($model,'computer_no'); ?>
    </div>
    
    <div class="form-group">
             	<label class="control-label">Who is your Internet Service Provider? <span class="required">*</span></label>
                
		<?php echo $form->textField($model,'isp',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
		<?php echo $form->error($model,'isp'); ?>                             </div>
        
        <div class="form-group">
             	<label class="control-label">What is the speed of your Internet connection?<span class="required">*</span></label><br />
                
				
		<?php echo $form->checkBoxList($model,'internet_speed',array('2MB'=>'2MB','4MB'=>'4MB','6MB'=>'6MB','10MB'=>'10MB','faster than 10MB'=>'faster than 10MB'),array('template'=>'<div class="col-sm-6">{input} {label}</div>','separator'=>'')); ?>
		<?php echo $form->error($model,'internet_speed'); ?>                             </div>
        
        <div class="form-group">
             	<label class="control-label">Do you have printer, scanner and copier?<span class="required">*</span></label>
                <div class="col-sm-12">
                
		<?php echo $form->radioButtonList($model, 'is_multifunction', array('1'=>'Yes', '0'=>'No'), array('uncheckValue'=>null, 'onclick'=>"",'labelOptions'=>array('style'=>'display:inline'),'separator'=>' &nbsp;&nbsp;')); ?>
		<?php echo $form->error($model,'is_multifunction'); ?>
        
        <?php echo $form->textField($model,'multifunction',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
		<?php echo $form->error($model,'multifunction'); ?>                             </div></div>
        
        
    
    
    </div>
    
    
    
  


</div>
<div class="panel-footer">
             
              
              <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-orange')); ?>
              </div>

<!-- form -->
</div><?php $this->endWidget(); ?>

</div>