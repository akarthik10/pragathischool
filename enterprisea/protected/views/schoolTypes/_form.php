<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'school-types-form',
	'enableAjaxValidation'=>false,
)); ?>

	

	<?php echo $form->errorSummary($model); ?>

<div class="panel-body panel_color">
<p class="note allign_p">Fields with <span class="required">*</span> are required.</p>	
    <div class="form-group">
    <div class="col-sm-3"> Type <span class="required">*</span></div>
   
    <div class="col-sm-7">
		<?php echo $form->textField($model,'type',array('size'=>60,'class'=>'form-control','maxlength'=>300)); ?>
		<?php echo $form->error($model,'type'); ?>
        
        </div>
    </div>
    <div class="form-group">
    <div class="col-sm-3"> Status <span class="required">*</span></div>
    
    	<div class="col-sm-5"><?php echo $form->radioButtonList($model,'status',array(1=>'Active', 0=>'Inactive'),array('separator'=>'')); ?>
		<?php echo $form->error($model,'status'); ?></div>
    
    </div>
     </div>
	

	<div class="panel-footer">
    <div class="col-sm-3"></div>
    <div class="col-sm-5">
    <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-success',)); ?></div>
		
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
				if(response.hasOwnProperty('data')){
					<?php
					if(isset($_GET['controller']) and $_GET['controller']=="courseManager"){
					?>
						$('#stype').append(response.data);
						$('#stype').trigger('chosen:updated');
					<?php
					}
					?>
				}
				else{
					window.setTimeout(function(){
						document.location.reload();
					}, 2000);
				}
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