

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'st-groups-form',
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
    <div class="col-sm-3"> School Type </div>
    <div class="col-sm-5">
		<?php 
		$type	= '';
		if($model->batch_id!=NULL)
		{
			$batch = CurriculumProviders::model()->findByPk($model->batch_id);
			$grade = Course::model()->findByPk($batch->course_id);
			$category = CourseCategory::model()->findByPk($grade->category);
			$type = SchoolTypes::model()->findByPk($category->school_type);
		}
			echo CHtml::dropDownList('school_type',
				$type,
				CHtml::listData(SchoolTypes::model()->findAllByAttributes(array('status'=>1)), 'id', 'type' ),
				array(
					'prompt'=>'Select school type','class'=>'form-control','id'=>'school_type',
					//'options' => array($type=>array('selected'=>true))
					)
					
			);
		?>
		
	</div>
    </div>

	<div class="form-group">
    <div class="col-sm-3">Category </div>
		<div class="col-sm-5">
        <?php
		$category	= '';
		if($model->batch_id!=NULL)
		{
			$batch = CurriculumProviders::model()->findByPk($model->batch_id);
			$grade = Course::model()->findByPk($batch->course_id);
			$category = CourseCategory::model()->findByPk($grade->category);
			
		}
		$categories	= CHtml::listData( CourseCategory::model()->findAllByAttributes(array('status'=>1)), 'id', 'category' );
        echo CHtml::dropDownList('category',$category, $categories, array('prompt'=>'Select course category','class'=>'form-control','id'=>'course_category'));?>
		
	</div>
    </div>
	<div class="form-group">
    <div class="col-sm-3"> Curriculum Providers<span class="required">*</span></div>
		<div class="col-sm-5">
        <?php
		$cprovider	= array();
			if($model->batch_id!=NULL)
			{
				$batch = CurriculumProviders::model()->findByPk($model->batch_id);
				$grade = Course::model()->findByPk($batch->course_id);
				$category = CourseCategory::model()->findByPk($grade->category);
				//get all grades in category..........
				$grades = Course::model()->findAllByAttributes(array('category'=>$category->id));
				$arr = array();
				foreach($grades as $val)
				{
					$arr[] = $val->id;
				}
				$cprovider	= CHtml::listData( CurriculumProviders::model()->findAllByAttributes(array('status'=>1,'course_id' => $arr)), 'id', 'name' );
			}
		 echo $form->dropDownList($model,'batch_id', $cprovider, array('prompt'=>'Select Curriculum Provider','class'=>'form-control'));?>
		<?php echo $form->error($model,'batch_id'); ?>
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
$('#st-groups-form').on('submit', function(){
	
	var value = $('#StGroups_batch_id :selected').val();
	<?php if(!$model->isNewRecord){ ?>
		if(<?php echo $model->batch_id; ?> != value){
			if(!confirm('All the Tutors in this group will be deleted ?'))
			{
				return false;
			}
			
		}
	<?php } ?>
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
				$.each(response, function(index, value) {
					//display the key and value pair
					$('<div class="errorMessage" />').html(value).insertAfter($('#' + index));
				});
			}
		}
	});
	return false;
});

$('#school_type').change(function(e) {
    $.ajax({
		url:"<?php echo Yii::app()->createUrl('courseCategory/get');?>",
		type:"GET",
		data:{school_type:$(this).val()},
		success: function(response){
			$("#course_category").html(response);
			$("#course_category").trigger("chosen:updated");
		}
	});
});

$('#course_category').change(function(e) {
    $.ajax({
		url:"<?php echo Yii::app()->createUrl('stGroups/getbatches');?>",
		type:"GET",
		data:{course_category:$(this).val()},
		success: function(response){
			$("#StGroups_batch_id").html(response);
			$("#StGroups_batch_id").trigger("chosen:updated");
		}
	});
});
</script>