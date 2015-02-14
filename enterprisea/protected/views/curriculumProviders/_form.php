<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'curriculum-providers-form',
	'enableAjaxValidation'=>false,
)); ?>
<div class="panel-body panel_color">
	

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
     <div class="col-sm-3"> Name <span class="required">*</span></div>
		<div class="col-sm-7">
		<?php
		if($model->isNewRecord){
			$criteria				= new CDbCriteria;						
			$criteria->join			= 'LEFT JOIN `admin_curriculum_providers` `acp` ON `acp`.`name`=`t`.`name` AND `acp`.`course_id`=:course_id';
			$criteria->condition	= '`t`.`status`=:status AND `acp`.`status` IS NULL';
			$criteria->params		= array(':status'=>1, ':course_id'=>$_GET['id']);
			$cproviders				= CHtml::listData( CpCommonPool::model()->findAll($criteria), 'name', 'name' );
			echo $form->dropDownList($model,'name',$cproviders,array('class'=>'form-control', 'multiple'=>'multiple'));
		}
		else
			echo $form->textField($model,'name',array('size'=>60,'maxlength'=>300,'class'=>'form-control','placeholder'=>'Curriculum provider name'));	
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
$('#curriculum-providers-form').on('submit', function(){
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
				$('#cproviders-<?php echo $_GET['id'];?>').html(response.data);
				<?php
				}
				else if(Yii::app()->controller->action->id=='ajaxupdate'){
				?>
				$('#cprovider-<?php echo $_GET['id'];?>').replaceWith(response.data);
				<?php
				}
				?>
				set_up_functions();	
			}
			else{				
				$.each(response.errors, function(index, value) {
					//display the key and value pair
					$('<div class="errorMessage" />').html(value).insertAfter($('#' + index));
				});
			}
		}
	});
	return false;
});
</script>