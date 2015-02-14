
<div class="row row-pad-5" style="border-bottom:1px #E0E0E0 solid;" id="replace_div">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'centercourse-form',
	'enableAjaxValidation'=>false,
)); ?>
  <div class="col-lg-3">
    <div class="form-group"> <?php echo $course->course_name; ?> </div>
  </div>
  <div class="col-lg-3">
    <div class="form-group"> <?php echo $batch->name; ?> </div>
  </div>
  <div class="col-lg-3">
    <div class="form-group">
      <?php 
								$sub_name = '';
								foreach($subject_arr as $val){
									$sub_name = $sub_name.' '.$val->name;
									
								}?>
      <?php echo $sub_name; ?> </div>
  </div>
  <div class="col-lg-3">
    <div style=" padding-left:20px;"> 
     <?php 
					   
				echo CHtml::ajaxSubmitButton('Edit',
				CHtml::normalizeUrl(array('/sharedTutor/ajaxedit')),
				 array('dataType'=>'json', 'type'=>'post','success'=>'js: function(data) {
					if (data.status == "error")
					{
						$.each(data.error, function(index, value) {
						 //display the key and value pair
						 $("#" + index).parent().append($("<div class=\"errorMessage\" />").html(value));
						});
						
					}
					else
					{
						
						$("#replace_div").replaceWith(data.content).show();
						
					}
						
				}'),array('id'=>'edit_button_'.$course->id,'name'=>'','class'=>'btn btn-primary','style'=>'')); 
	
	?> 
                        
    <?php 
					   
				echo CHtml::ajaxSubmitButton('Delete',
				CHtml::normalizeUrl(array('/sharedTutor/ajaxdelete')),
				 array('dataType'=>'json', 'type'=>'post','success'=>'js: function(data) {
					if (data.status == "error")
					{
						$.each(data.error, function(index, value) {
						 //display the key and value pair
						 $("#" + index).parent().append($("<div class=\"errorMessage\" />").html(value));
						});
						
					}
					else
					{
						
						$("#replace_div").replaceWith(data.content).show();
						
					}
						
				}'),array('id'=>'delete_button_'.$course->id,'name'=>'','class'=>'btn btn-danger','style'=>'')); 
	
	?>      
                       
                        
                        
                        
                        
                        
                        
                        
                        
                        </div>
  </div>
  <?php $this->endWidget(); ?>
</div>
