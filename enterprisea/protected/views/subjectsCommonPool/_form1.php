<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subjects-common-pool-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="panel-body panel_color">

	<div class="form-group">    
		<?php echo $form->textField($model,'name',array('size'=>60,'class'=>'form-control','maxlength'=>300,'placeholder'=>'Subject name', 'tabindex'=>1));?>        
        </div>
	</div>

	<div class="panel-footer">
    
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save',array('class'=>'btn btn-success',)); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
$('#subjects-common-pool-form').on('submit', function(){
	var that	= this;
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
				if(isset($_GET['controller']) and $_GET['controller']=="courseManager"){
				}
				else{
				?>
				window.setTimeout(function(){
					document.location.reload();
				}, 2000);
				<?php
				}
				?>				
			}
			else{				
				$(that).prepend('<span class="errorMessage">' + response.message + '</span>');
			}
		}
	});
	return false;
});
</script>