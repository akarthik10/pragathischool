<div class="row row-pad-5" style="border-bottom:1px #E0E0E0 solid;padding-top: 9px;" id="replace_div_<?php echo $course->id.'_'.$batch->id; ?>">
              <?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'centercourse-form',
					'enableAjaxValidation'=>false,
				)); ?>
              <input  type="hidden" name="id" value="<?php echo $center_id; ?>"/>
               <input  type="hidden" name="course_id" value="<?php echo $course->id; ?>"/>
               <input  type="hidden" name="batch_id" value="<?php echo $batch->id; ?>"/>
                
              <?php echo $form->hiddenField($model,'category_id',array('value'=>$category_id)); ?>
              <div class="col-lg-3">
                <div class="form-group">
                  <?php  
					$criteria				= new CDbCriteria;						
					
					$criteria->condition	= '`t`.`category`=:category';
					$criteria->params		= array(':category'=>$category_id);
				    $grades	= CHtml::listData(Course::model()->findAll($criteria), 'id', 'name' );
								echo $form->dropDownList($model,'grade',$grades,
								 array(
								 	'options' => array($course->admin_id=>array('selected'=>true)),
									'prompt'=>'Select Grade',
									'ajax' => array(
									'type'=>'POST', 
									'url'=>$this->createUrl('loadbatches'), //or $this->createUrl('loadcities') if '$this' extends CController
									'success'=>'js:function(data){ $("#drop_batch_'.$course->id.'").html(data);$("#drop_batch_'.$course->id.'").trigger("chosen:updated");}', //or 'success' => 'function(data){...handle the data in the way you want...}',
								  'data'=>array('grades'=>'js:this.value'),
								  ),'class'=>'form-control mb15','id'=>'drop_grades_'.$course->id)); ?>
                </div>
                <?php echo $form->error($model,'grade'); ?> </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <?php  $batches = CHtml::listData(CurriculumProviders::model()->findAllByAttributes(array('course_id'=>$course->admin_id)), 'id', 'name' );
                            echo $form->dropDownList($model,'batch',$batches,
                             array(
							 	'options' => array($batch->admin_id=>array('selected'=>true)),
                                'prompt'=>'Select Batch',
                                'ajax' => array(
                                'type'=>'POST', 
                                'url'=>$this->createUrl('loadsubjects'), //or $this->createUrl('loadcities') if '$this' extends CController
                               'success'=>'js:function(data){ $("#drop_subject_'.$course->id.'").html(data);$("#drop_subject_'.$course->id.'").trigger("chosen:updated");}', //or 'success' => 'function(data){...handle the data in the way you want...}',
                              'data'=>array('batches'=>'js:this.value'),
                              ),'class'=>'form-control mb15','id'=>'drop_batch_'.$course->id)); ?>
                </div>
                <?php echo $form->error($model,'batch'); ?> </div>
              <div class="col-lg-3">
                <div class="form-group">
                
                  <?php  
				  			$options = array();
						  foreach ($subject_arr as $optionVal) {
							 if ($optionVal) {
								$options[$optionVal->admin_id] = array('selected' => 'selected');
								}
							}
							
							
				  			$subject = CHtml::listData(CpSubjects::model()->findAllByAttributes(array('cp_id'=>$batch->admin_id)), 'id', 'name' );
                            echo $form->dropDownList($model,'subject',$subject,
                             array('options' =>$options,'prompt'=>'Select Subject','class'=>'form-control mb15','multiple'=>true,'id'=>'drop_subject_'.$course->id)); ?>
                </div>
                <?php echo $form->error($model,'subject'); ?> </div>
              <div class="col-lg-3">
                <div style=" padding-left:20px;">
                  <?php 
					   
						echo CHtml::ajaxSubmitButton('Save',
						CHtml::normalizeUrl(array('/center/ajaxupdate')),
						 array('dataType'=>'json', 'type'=>'post','success'=>'js: function(data) {
							if (data.status == "error")
							{	$(".errorMessage").remove();
								$.each(data.error, function(index, value) {
								 //display the key and value pair
								 
								 $("#" + index).parent().append($("<div class=\"errorMessage\" />").html(value));
								});
								
							}
							else
							{
								
								window.location.reload();
								
							}
								
						}'),array('id'=>'add_button_'.$course->id.'_'.$batch->id,'name'=>'','class'=>'btn btn-success','style'=>'')); 
			
						?>
                </div>
              </div>
              <?php $this->endWidget(); ?>
            </div>