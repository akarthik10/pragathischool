<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cp-subjects-form',
	'enableAjaxValidation'=>false,
)); 
//echo $form->hiddenField($model,'cp_id');
?>

<div class="panel-body panel_color">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
    <div class="col-sm-3"> Name <span class="required">*</span></div>
    <div class="col-sm-7">
		
		<?php 
		if($model->isNewRecord){
			$criteria				= new CDbCriteria;						
			$criteria->join			= 'LEFT JOIN `admin_subjects` `as` ON `as`.`name`=`t`.`name` AND `as`.`cp_id`=:cp_id';
			$criteria->condition	= '`t`.`type`=:type AND `t`.`category`=:category AND `t`.`status`=:status AND `as`.`status` IS NULL';
			$criteria->params		= array(':type'=>$_GET['stype'], ':category'=>$_GET['category'], ':status'=>1, ':cp_id'=>$_GET['id']);
			$subjects	= CHtml::listData( SubjectsCommonPool::model()->findAll($criteria), 'name', 'name' );
			echo $form->dropDownList($model,'name',$subjects,array('class'=>'form-control', 'multiple'=>'multiple'));
		}
		else
			echo $form->textField($model,'name',array('size'=>60,'class'=>'form-control','maxlength'=>300,'placeholder'=>'CP subject name'));
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
$('#cp-subjects-form').on('submit', function(){
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