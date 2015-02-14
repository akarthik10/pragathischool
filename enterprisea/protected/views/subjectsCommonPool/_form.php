<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'subjects-common-pool-form',
	'enableAjaxValidation'=>false,
)); ?>

<div class="panel-body panel_color">

	<div class="form-group">
    
		<?php echo $form->textField($model,'name[]',array('size'=>60,'class'=>'form-control subject-txt','maxlength'=>300,'placeholder'=>'Subject name', 'tabindex'=>1));?>
        <a href="javascript:void(0);" class="add_another_subject btn btn-primary"><span class="glyphicon glyphicon-plus" style="margin-right:10px; margin-top:3px;"></span>Add another</a>
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

function add_another_cp(){
	var max_txt	= 5;
	$('.add_another_subject').unbind('click');
	$('.add_another_subject').on('click', function(){		
		if($('#subjects-common-pool-form').find('input.subject-txt[type="text"]').length==max_txt){
			return;
		}
		var clone		= $(this).parent().clone();
		var tabindex	= parseInt($(this).parent().find('input[type="text"]').attr('tabindex')) + 1;
		clone.find('input[type="text"]').val('').attr('tabindex', tabindex);
		clone.insertAfter($(this).parent());
		$(this).parent().find('.add_another_subject').removeClass('add_another_subject').attr('class', 'sd remove_subject').text('Remove');
		add_another_cp();
		
		//hide another link
		if($('#subjects-common-pool-form').find('input.subject-txt[type="text"]').length==max_txt){
			$('.add_another_subject').hide();
		}
	});
	$('.remove_subject').unbind('click');
	$('.remove_subject').on('click', function(){
		$(this).parent().remove();
		//show another link
		if($('#subjects-common-pool-form').find('input.subject-txt[type="text"]').length<max_txt && !$('.add_another_subject').is(':visible')){
			$('.add_another_subject').show();
		}
	});
}
add_another_cp();
</script>