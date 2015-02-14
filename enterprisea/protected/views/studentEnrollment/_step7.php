<div class="wiz_right">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'terms-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('style' => 'min-height:600px;'),
)); ?>


	<?php //echo $form->errorSummary($model); ?>
    <div >
    	<h4 class="text-success">FEES PAYMENT</h4>
        <div class="col-sm-12">            
            <?php echo $form->checkBox($model,'has_paid_fees',array('value'=>1)); ?>
            <?php echo $form->labelEx($model,'has_paid_fees'); ?>
            <?php echo $form->error($model,'has_paid_fees'); ?>
        </div>  
    </div>
    <div class="row mb10">
        <div class="col-sm-4">
            <?php $this->widget('CCaptcha'); ?>
            <?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
            <?php echo $form->error($model,'verifyCode'); ?>
        </div>
    </div>
    <br /><br />
    <div class="row mb10">   	
        <div class="col-sm-4 buttons">
            <?php echo CHtml::button('Finish Registration',array('id'=>'sbmt_btn', 'class'=>"btn btn-success btn-block")); ?>
        </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
$('#sbmt_btn').on('click', function(){$(this).closest('form').submit();
	/*if($('#Students_i_agree').is(':checked')){
		
	}
	else{
		alert('Please agree our terms and conditions');
	}*/
});
$('select#how_heard_about_us').on('change', function(){
	var that	= this,
		val		= $(that).val();	
	if(val=="-1"){
		$('input#Students_how_heard_about_us').val('').attr('type', 'text');
	}
	else{
		$('input#Students_how_heard_about_us').val(val).attr('type', 'hidden');
	}
});
</script>