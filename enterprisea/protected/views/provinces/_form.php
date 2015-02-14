<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'provinces-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="panel-body panel_color">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<?php echo $form->hiddenField($model,'country_id',array('value'=>$_GET['country'])); ?>
	<div class="form-group">
    <div class="col-sm-3"> Name <span class="required">*</span></div>
    <div class="col-sm-7">
		<?php echo $form->textField($model,'name',array('size'=>60,'class'=>'form-control','maxlength'=>300)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
    </div>
    
    </div>

	<div class="panel-footer">
    <div class="col-sm-3"></div>
    <div class="col-sm-5">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-success',)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
$('#provinces-form').on('submit', function(){
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
				var coursename	= $('#Provinces_name').val();
				$('#myModal .modal-body').html('<div class="success">' + response.message + '</div>');				
				<?php
				if(Yii::app()->controller->action->id=='ajaxcreate'){
				?>
				if(response.hasOwnProperty('data')){
					$('#accordion').html(response.data);
				}
				<?php
				}
				else if(Yii::app()->controller->action->id=='ajaxupdate'){
				?>
				if(response.hasOwnProperty('data')){
					$('#accordion').html(response.data);
				}
				else{
					$('#course-title-<?php echo $_GET['id'];?>').text(coursename);
				}
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