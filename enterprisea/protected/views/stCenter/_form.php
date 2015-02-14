

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'st-center-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="panel-body panel_color">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="form-group">
    <div class="col-sm-3"> Centers<span class="required">*</span></div>
		<div class="col-sm-5">
        <?php
		echo $form->hiddenField($model,'group_id',array('value'=>$_GET['group_id']));
		
		$center_arr = array();
		$centers = StCenter::model()->findAllByAttributes(array('group_id'=>$_GET['group_id']));
		foreach($centers as $center)
		{
			$center_arr[] =  $center->center_id;
		}
		$batch_id = StGroups::model()->findByAttributes(array('id'=>$_GET['group_id']));
		$criteria = new CDbCriteria();
		$criteria->join   = 'LEFT JOIN `batches` `acp` ON `acp`.`tenant`=`t`.`tenant`';
		$criteria->condition = '`acp`.`admin_id`=:batch_id AND `t`.user_type=:user_type AND `t`.status =:status AND `t`.is_deleted=:is_deleted';
		$criteria->params = array(':user_type'=>1,':status'=>1,':is_deleted'=>0,':batch_id'=>$batch_id->batch_id);
		$criteria->addNotInCondition('`t`.id', $center_arr); 
		
		$centers = CHtml::listData( Center::model()->findAll($criteria), 'id', 'center_name' );
        echo $form->dropDownList($model,'center_id', $centers, array('class'=>'form-control','multiple'=>'multiple'));?>
		
		<?php echo $form->error($model,'center_id'); ?>
	</div>
    </div>
	
    </div>

	<div class="panel-footer">
    <div class="col-sm-3"></div>
    <div class="col-sm-5">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Add',array('class'=>'btn btn-success',)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
$('#st-center-form').on('submit', function(){
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