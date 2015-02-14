<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'course-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="panel-body panel_color">
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="form-group">
    <div class="col-sm-3"> Name <span class="required">*</span></div>
    <div class="col-sm-7">
		<?php echo $form->textField($model,'name',array('size'=>60,'class'=>'form-control','maxlength'=>300)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
    </div>
    
    <div class="form-group">
    <div class="col-sm-3"> School Type <span class="required">*</span></div>
    <div class="col-sm-5">
		<?php 
			echo $form->dropDownList($model,
				'school_type',
				CHtml::listData( SchoolTypes::model()->findAllByAttributes(array('status'=>1)), 'id', 'type' ),
				array(
					'prompt'=>'Select school type','class'=>'form-control')
			);
		?>
		<?php echo $form->error($model,'school_type'); ?>
	</div>
    </div>

	<div class="form-group">
    <div class="col-sm-3">Category <span class="required">*</span></div>
		<div class="col-sm-5">
        <?php
		$categories	= array();
		if($model->category!=NULL)
			$categories	= CHtml::listData( CourseCategory::model()->findAllByAttributes(array('status'=>1)), 'id', 'category' );
        echo $form->dropDownList($model, 'category', $categories, array('prompt'=>'Select course category','class'=>'form-control',));?>
		<?php echo $form->error($model,'category'); ?>
	</div>
    </div>

	<div class="form-group">
    <div class="col-sm-3"> Status <span class="required">*</span></div>
		<div class="col-sm-5">
		<?php echo $form->radioButtonList($model,'status',array(1=>'Active', 0=>'Inactive'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'status'); ?>
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
$('#course-form').on('submit', function(){
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
				var coursename	= $('#Course_name').val();
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

$('#Course_school_type').change(function(e) {
    $.ajax({
		url:"<?php echo Yii::app()->createUrl('courseCategory/get');?>",
		type:"GET",
		data:{school_type:$(this).val()},
		success: function(response){
			$("#Course_category").html(response);
			$("#Course_category").trigger("chosen:updated");
		}
	});
});
</script>