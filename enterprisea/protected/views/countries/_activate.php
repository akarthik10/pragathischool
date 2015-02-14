

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'school-types-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

<div class="panel-body panel_color">
<p class="note allign_p">Fields with <span class="required">*</span> are required.</p>	
    <div class="form-group">
    <div class="col-sm-3"> Name <span class="required">*</span></div>
   
    <div class="col-sm-7">
		<?php
       		 echo $form->dropDownList($model,'name',
    		CHtml::listData(Countries::model()->findAllByAttributes(array('is_active'=>0),array('order'=>'name')), 'id', 'name'),
    		array(
                'class'=>'form-control',
				 'empty'=>'--Select a Country--'
               
    			)
		); ?>
        
		<?php echo $form->error($model,'name'); ?>
        
        </div>
    </div>
    
     </div>
	

	<div class="panel-footer">
    <div class="col-sm-3"></div>
    <div class="col-sm-5">
    <?php echo CHtml::submitButton('Activate',array('class'=>'btn btn-success',)); ?></div>
		
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
$('#school-types-form').on('submit', function(){
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