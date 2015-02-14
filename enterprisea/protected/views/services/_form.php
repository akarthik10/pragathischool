
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'services-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

<div class="panel-body panel_color">
<p class="note allign_p">Fields with <span class="required">*</span> are required.</p>	
    <div class="form-group">
   		 <div class="col-sm-3"> Category <span class="required">*</span></div>
   		<div class="col-sm-7">
   		<?php
		$category	= CHtml::listData( ServiceCategory::model()->findAll(), 'id', 'name' );
		echo $form->dropDownList($model,'category_id', $category, array('prompt'=>'Select Category ','class'=>'form-control'));?>
		<?php echo $form->error($model,'category_id'); ?>
        
   		</div>
       </div>
        <div class="form-group"> 
         <div class="col-sm-3"> Name <span class="required">*</span></div>
    	<div class="col-sm-7">
		<?php echo $form->textField($model,'name',array('size'=>60,'class'=>'form-control','maxlength'=>300)); ?>
		<?php echo $form->error($model,'name'); ?>
        
        </div>
        </div>
        <div class="form-group"> 
        
         <div class="col-sm-3"> Fees <span class="required">*</span></div>
        <div class="col-sm-7">
		<?php echo $form->textField($model,'fees',array('size'=>60,'class'=>'form-control','maxlength'=>300)); ?>
		<?php echo $form->error($model,'fees'); ?>
        
        </div>
        
        </div>
        <div class="form-group"> 
        
         <div class="col-sm-3"> Description <span class="required">*</span></div>
        <div class="col-sm-7">
		<?php echo $form->textField($model,'description',array('size'=>60,'class'=>'form-control','maxlength'=>300)); ?>
		<?php echo $form->error($model,'description'); ?>
        
        </div>
        
        </div>
        <div class="form-group"> 
        
         <div class="col-sm-3"> Is Editable </div>
        <div class="col-sm-7">
        <?php echo $form->checkBox($model,'is_editable'); ?>
        </div>
    </div>
    
    </div>
	

	<div class="panel-footer">
    <div class="col-sm-3"></div>
    <div class="col-sm-5">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-success',)); ?></div>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
$('#services-form').on('submit', function(){
	var method	= $(this).attr('method'),
		action	= $(this).attr('action'),
		datas	= $(this).serialize();
	datas	+= '&ajax=' + $(this).attr('id');
	
	$.ajax({
		url:action,
		type:method,
		data:datas,
		dataType:"json",
		beforeSend: function(){
			$('.errorMessage').remove();
		},
		success: function(response){
			if(response.status=="success"){
				$('#myModal .modal-body').html('<div class="success">' + response.message + '</div>');
				window.setTimeout(function(){
					document.location.reload();
				}, 2000);
				
			}
			else{
				$.each(response, function(index, value) {
					//display the key and value pair
					$('<div class="errorMessage" />').html(value).insertAfter($('#' + index));
				});
			}
		}
	});
	return false;
});
</script>

