

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'center-st-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="panel-body panel_color">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	
	<div class="form-group">
    <div class="col-sm-3"> Shared Tutor Group(s)<span class="required">*</span></div>
		<div class="col-sm-5">
        <?php
		echo $form->hiddenField($model,'center_id',array('value'=>$_GET['center_id']));
		
		$grp_arr = array();
		$groups = StCenter::model()->findAllByAttributes(array('center_id'=>$_GET['center_id']));
		foreach($groups as $group)
		{
			$grp_arr[] =  $group->group_id;
		}
		$center = Center::model()->findByAttributes(array('id'=>$_GET['center_id']));
		$batches = EnrollmentBatches::model()->findAllByAttributes(array('tenant'=>$center->tenant));
		
		$batch_arr = array();
		foreach($batches as $batch)
		{
			$batch_arr[] =  $batch->admin_id;
		}
		//var_dump($batch_arr);exit;
		$criteria = new CDbCriteria();
		$criteria->addNotInCondition('id', $grp_arr); 
		$criteria->addInCondition('batch_id', $batch_arr); 
		
		$centers = CHtml::listData( StGroups::model()->findAll($criteria), 'id', 'name' );
        echo $form->dropDownList($model,'group_id', $centers, array('class'=>'form-control','multiple'=>'multiple'));?>
		
		<?php echo $form->error($model,'group_id'); ?>
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
$('#center-st-form').on('submit', function(){
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