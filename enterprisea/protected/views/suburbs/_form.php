<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'suburbs-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="panel-body panel_color">
	

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
     <div class="col-sm-3"> Name <span class="required">*</span></div>
		<div class="col-sm-7">
		<?php 
			echo $form->textField($model,'name',array('size'=>60,'maxlength'=>300,'class'=>'form-control','placeholder'=>'Suburb Name'));	
		?>
		<?php echo $form->error($model,'name'); ?>
	</div>
    </div>
    </div>

	<div class="panel-footer">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-success',)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
$('#suburbs-form').on('submit', function(){
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
				<?php
				if(Yii::app()->controller->action->id=='ajaxcreate'){
				?>
				$('#cpsubjects-<?php echo $_GET['id'];?>').html(response.data);
				<?php
				}
				else if(Yii::app()->controller->action->id=='ajaxupdate'){
				?>
				$('#subject-<?php echo $_GET['id'];?>').replaceWith(response.data);
				<?php
				}
				?>
				set_up_functions();	
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