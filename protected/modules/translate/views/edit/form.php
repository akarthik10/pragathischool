<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
<div id="othleft-sidebar">
<div class="lsearch_bar">
             	<input type="text" value="Search" class="lsearch_bar_left" name=""  onclick="this.value = '';" />
                <input type="button" class="sbut" name="" id="new">
                <div class="clear"></div>
  </div>
  </div>
 </td>
    <td valign="top">
<div class="cont_right formWrapper">
<?php $action=$model->getIsNewRecord() ? 'Create' : 'Update';?>
<h1><?php echo TranslateModule::t(($action) . ' Message')." # ".$model->id." - ".TranslateModule::translator()->acceptedLanguages[$model->language]; ?></h1>

<div class="formCon">
<div class="formConInner">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'message-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
    
    <?php echo $form->hiddenField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
    <?php echo $form->hiddenField($model,'language',array('size'=>16,'maxlength'=>16)); ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td><?php echo $form->label($model->source,'category'); ?></td>
    <td> <?php echo $form->textField($model->source,'category',array('disabled'=>'disabled')); ?></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->label($model->source,'message'); ?></td>
    <td> <?php echo $form->textField($model->source,'message',array('disabled'=>'disabled')); ?></td>
  </tr>
    <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><?php echo $form->labelEx($model,'translation'); ?></td>
    <td><?php echo $form->textArea($model,'translation',array('rows'=>2, 'cols'=>50)); ?>
		<?php echo $form->error($model,'translation'); ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><?php echo CHtml::submitButton(TranslateModule::t($action),array('class'=>'formbut')); ?></td>
  </tr>
  
</table>

    <div class="row">
        
       
    </div>
    <div class="row">
        
       
    </div>
    
	<div class="row">
		
		
	</div>

	<div class="row buttons">
		
	</div>

<?php $this->endWidget(); ?>
</div>
</div><!-- form -->
</div>
 </td>
  </tr>
</table>
