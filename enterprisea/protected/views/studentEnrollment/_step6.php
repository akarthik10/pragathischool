<div class="wiz_right">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'terms-form',
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('style' => 'min-height:600px;'),
)); ?>

	

	<?php //echo $form->errorSummary($model); ?>
    <div class="row">
    	<h4 class="text-success">TERMS & CONDITIONS</h4>
        <p class="note">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <div>            
            <?php echo $form->checkBox($model,'i_agree',array('value'=>1)); ?>
            <?php echo $form->labelEx($model,'i_agree'); ?>
            <?php echo $form->error($model,'i_agree'); ?>
        </div>
            <br />    
       	<div>
            <?php echo $form->labelEx($model,'how_heard_about_us'); ?>
            <?php			
			$how_status	= array("TV"=>"TV", "Facebook"=>"Facebook", "Twitter"=>"Twitter", "Other Social Media"=>"Other Social Media", "Adverts"=>"Adverts", "Trade Show"=>"Trade Show", "Exhibition"=>"Exhibition", "Bill Boards"=>"Bill Boards", "Flyers"=>"Flyers", "Friends"=>"Friends");
			if(in_array($model->how_heard_about_us, $how_status) or $model->how_heard_about_us==NULL){
				$how_status["-1"]	= "Other";
				echo CHtml::dropDownList('how_heard_about_us',$model->how_heard_about_us,$how_status,array('id'=>'how_heard_about_us','prompt'=>$model->getAttributeLabel('how_heard_about_us')));
				echo $form->hiddenField($model,'how_heard_about_us',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('how_heard_about_us')));
			}
			else{
				$how_status["-1"]	= "Other";
				echo CHtml::dropDownList('how_heard_about_us',$model->how_heard_about_us,$how_status,array('id'=>'how_heard_about_us','prompt'=>$model->getAttributeLabel('how_heard_about_us'),'options' => array('-1'=>array('selected'=>true))));
				echo $form->textField($model,'how_heard_about_us',array('class'=>"form-control", 'placeholder'=>$model->getAttributeLabel('how_heard_about_us')));
			}			
			?>
            <?php echo $form->error($model,'how_heard_about_us'); ?>
        </div>
        <div class="row mb10">
            <div class="col-sm-4">
                <?php $this->widget('CCaptcha'); ?>
                <?php echo $form->textField($model,'verifyCode',array('class'=>'form-control')); ?>
                <?php echo $form->error($model,'verifyCode'); ?>
            </div>
        </div>
    <br />
    <div class="row mb10">
        <div class="col-sm-4 buttons">
            <?php echo CHtml::submitButton('Save & Continue',array('id'=>'sbmt_btn', 'class'=>"btn btn-success btn-block")); ?>
        </div>
     </div>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
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