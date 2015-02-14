
<div class="row row-pad-5" style="border-bottom:1px #E0E0E0 solid;">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'centercourse-form',
	'enableAjaxValidation'=>false,
)); ?>
				<?php echo $form->hiddenField($model,'category_id'); ?>
                <div class="col-lg-3">
                	<div class="form-group">
                    	
						<?php echo $form->textField($model,'grade',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'grade'); ?>
                    </div>
                </div>
                 <div class="col-lg-3">
                 	<div class="form-group">
                    	
						<?php echo $form->textField($model,'batch',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'batch'); ?>
                    </div>
                </div>
                 <div class="col-lg-3">
                 	<div class="form-group">
                    	
						<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>255,'class'=>'form-control mb15')); ?>
                        <?php echo $form->error($model,'subject'); ?>
                    </div>
                </div>
                 <div class="col-lg-3">
                 	<div style="padding-top:27px; padding-left:20px;">
                 	<a class="btn btn-success"><span class="glyphicon  glyphicon-plus" style="margin-right:10px; margin-top:3px;"></span>Save</a>
       
                    </div>
                 </div>
              <?php $this->endWidget(); ?>
  
</div>
 