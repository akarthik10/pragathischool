

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'st-group-members-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="panel-body panel_color">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="form-group">
    <div class="col-sm-3"> Shared Tutor<span class="required">*</span></div>
		<div class="col-sm-5">
        <?php
		echo $form->hiddenField($model,'group_id',array('value'=>$_GET['group_id']));
		
		$criteria    = new CDbCriteria;      
		$criteria->join   = 'JOIN `st_groups` `acp` ON `acp`.`batch_id`=`t`.`admin_id`';
		$criteria->condition = '`acp`.id=:group_id';
		$criteria->params = array(':group_id'=>$_GET['group_id']);
		$batches = EnrollmentBatches::model()->findAll($criteria);
		$tenant_arr = array();
		foreach($batches as $batch)
		{
			$tenant_arr[] =  $batch->tenant;
		}
		$member_arr = array();
		$members = StGroupMembers::model()->findAllByAttributes(array('group_id'=>$_GET['group_id']));
		foreach($members as $member)
		{
			$member_arr[] =  $member->tutor_id;
		}
		
		$criteria = new CDbCriteria();
		$criteria->condition = 'user_type=:user_type';
		$criteria->params = array(':user_type'=>3);
		$criteria->addInCondition('tenant', $tenant_arr); 
		$criteria->addNotInCondition('id', $member_arr); 
		
		$tutors = CHtml::listData( Center::model()->findAll($criteria), 'id', 'name' );
        echo $form->dropDownList($model,'tutor_id', $tutors, array('class'=>'form-control','multiple'=>'multiple'));?>
		
		<?php echo $form->error($model,'tutor_id'); ?>
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
$('#st-group-members-form').on('submit', function(){
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
				var groupname	= $('#StGroups_name').val();
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