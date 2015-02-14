<?php
$this->breadcrumbs=array(
	'PrivateTutor'=>array('index'),
	'Create',
);

?>
<script language="javascript">

</script>
<?php $center = PrivateTutor::model()->findByAttributes(array('id'=>$center_id)) ;?>

<div class="pageheader">
  <h2><i class="fa fa-user"></i> Create PrivateTutor <span>Subtitle goes here...</span></h2>
  <div class="breadcrumb-wrapper"> <span class="label">You are here:</span>
    <ol class="breadcrumb">
      <li><a href="index.html">PrivateTutor</a></li>
      <li class="active">Create PrivateTutor</li>
    </ol>
  </div>
</div>
<div class="contentpanel">
  <div class="col-sm-9 col-lg-12">
    <div class="panel panel-default">
      <div class="panel-heading" style="position:relative;">
        <div class="clear"></div>
        <h3 class="panel-title">Private Tutor Registration Application</h3>
      </div>
      <div class="panel-body">
        <div class="col-sm-6">
          <p>Some text giving them instructions...i.e. You must be older than 18 years old to apply</p>
          <p>Documents to be uploaded:</p>
          <ul style="list-style:none;">
            <li>1. CV</li>
            <li>2. Copy of ID and Business Registration Number</li>
            <li>3. Copy of latest study results/Diploma/Degree/Certificate</li>
            <li>4. Profile picture</li>
          </ul>
        </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label class="control-label">Type-</label>
            <?php echo $center->typename ;?> </div>
          <form action="" method="get" class="form-inline">
            <div class="form-group">
              <label class="control-label">Course Category</label>
              <?php
					
					$criteria				= new CDbCriteria;						
					$criteria->join			= 'LEFT JOIN `center_course` `acp` ON `acp`.`course_id`=`t`.`id`';
					
					$criteria->condition	= '`acp`.`center_id`=:center_id';
					$criteria->params		= array(':center_id'=>$_REQUEST['id']);
					$categories	= CHtml::listData(CourseCategory::model()->findAll($criteria), 'id', 'category' );
					echo CHtml::dropDownList('category','',
						$categories,
						array(
							'prompt'=>'Select Course Category',
							'onchange'=>'js:this.form.submit();',
							'id'=>'ccategory',
							'class'=>'form-control mb15',
							'options' => array(isset($_REQUEST['category']) ? $_REQUEST['category'] : ''=>array('selected'=>true)),
						)
					);
				?>
            </div>
          </form>
          <div class="form-group">
            <label class="control-label">Private Tutor  Name-</label>
            <?php echo $center->center_name ;?> </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default"> 
      
      <!-- Tab panes -->
      <div class="tab-content">
        <div class="tab-pane active">
          <div class="panel-heading">
            <h4 class="panel-title">Course Selection</h4>
          </div>
          <div class="panel-body">
            <div class="row row-pad-5">
              <div class="col-lg-3">
                <div class="form-group"> <?php echo 'Grades'; ?> </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group"> <?php echo 'Curriculum Provider'; ?> </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group"> <?php echo 'Subjects'; ?> </div>
              </div>
              <div class="col-lg-3"> </div>
            </div>
            <?php 
			if(isset($_REQUEST['category']) and ($_REQUEST['category'] != NULL)){
				$saved_grades = Courses::model()->findAllByAttributes(array('category_id'=>$_REQUEST['category'])); 
				//var_dump($saved_grades);exit;
				foreach($saved_grades as $saved_grade){ 
					$saved_batches = Batches::model()->findAllByAttributes(array('course_id'=>$saved_grade->id)); 
				foreach($saved_batches as $saved_batch){ 
					$saved_subjects = Subjects::model()->findAllByAttributes(array('batch_id'=>$saved_batch->id)); 
			?>
            <div class="row row-pad-5" style="border-bottom:1px #E0E0E0 solid;padding-top: 9px;" id="replace_div_<?php echo $saved_grade->id.'_'.$saved_batch->id; ?>">
             <form action="" method="post">
               <input  type="hidden" name="id" value="<?php echo $center_id; ?>"/>
               <input  type="hidden" name="category_id" value="<?php echo $_REQUEST['category']; ?>"/>
               <input  type="hidden" name="course_id" value="<?php echo $saved_grade->id; ?>"/>
               <input  type="hidden" name="batch_id" value="<?php echo $saved_batch->id; ?>"/>
            	
              <div class="col-lg-3">
                <div class="form-group"> <?php echo $saved_grade->course_name; ?> </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group"> <?php echo $saved_batch->name; ?> </div>
              </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <?php 
											$sub_name = '';
											foreach($saved_subjects as $val){
												$sub_name = $sub_name.' '.$val->name;
												
											}?>
                  <?php echo $sub_name; ?> </div>
              </div>
              <div class="col-lg-3">
                <div style=" padding-left:20px;">
                
                
                 <?php 
					   
						echo CHtml::ajaxSubmitButton('Edit',
						CHtml::normalizeUrl(array('/privateTutor/ajaxedit')),
						 array('dataType'=>'json', 'type'=>'post','success'=>'js: function(data) {
							if (data.status == "error")
							{
								
								
							}
							else
							{
								
								$("#replace_div_"+data.course_id+"_"+data.batch_id).replaceWith(data.content).show();
								$("#replace_div_"+data.course_id+"_"+data.batch_id).find("select").chosen({});
								
								
								
							}
								
						}'),array('id'=>'edit_button_'.$saved_grade->id.'_'.$saved_batch->id,'name'=>'','class'=>'btn btn-primary','style'=>'')); 
			
			?> 
								
			<?php 
							   
						echo CHtml::ajaxSubmitButton('Delete',
						CHtml::normalizeUrl(array('/privateTutor/ajaxdelete')),
						 array('dataType'=>'json', 'type'=>'post','success'=>'js: function(data) {
							if (data.status == "error")
							{
								
								
							}
							else
							{
								
								$("#replace_div_"+data.course_id+"_"+data.batch_id).remove();
								$("#drop_grades").html(data.content);
								$("#drop_grades").trigger("chosen:updated");
							}
								
						}'),array('confirm' => 'Are you sure?','id'=>'delete_button_'.$saved_grade->id.'_'.$saved_batch->id,'name'=>'','class'=>'btn btn-danger','style'=>'')); 
			
			?>      
                
                
                </div>
              </div>
              </form>
            </div>
            <?php }} ?>
            <div class="row row-pad-5" style="border-bottom:1px #E0E0E0 solid;padding-top: 9px;" id="replace_div">
              <?php $form=$this->beginWidget('CActiveForm', array(
					'id'=>'centercourse-form',
					'enableAjaxValidation'=>false,
				)); ?>
              <input  type="hidden" name="id" value="<?php echo $center_id; ?>"/>
              <?php echo $form->hiddenField($model,'category_id',array('value'=>$_REQUEST['category'])); ?>
              <div class="col-lg-3">
                <div class="form-group">
                  <?php  
					$criteria				= new CDbCriteria;						
					//$criteria->join			= 'LEFT JOIN `courses` `acp` ON `acp`.`course_name`=`t`.`name`';
					//$criteria->condition	= '.`category`=:category';
					//$criteria->params		= array(':category'=>$_REQUEST['category']);
				    $grades	= CHtml::listData(Course::model()->findAllByAttributes(array('category'=>$_REQUEST['category'])), 'id', 'name' );
					
								echo $form->dropDownList($model,'grade',$grades,
								 array(
									'prompt'=>'Select Grade',
									'ajax' => array(
									'type'=>'POST', 
									'url'=>$this->createUrl('loadbatches'), //or $this->createUrl('loadcities') if '$this' extends CController
									'success'=>'js:function(data){ $("#CourseForm_batch").html(data);$("#CourseForm_batch").trigger("chosen:updated");}', //or 'success' => 'function(data){...handle the data in the way you want...}',
								  'data'=>array('grades'=>'js:this.value'),
								  ),'class'=>'form-control mb15','id'=>'drop_grades')); ?>
                </div>
                <?php echo $form->error($model,'grade'); ?> </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <?php  $batches = CHtml::listData(CurriculumProviders::model()->findAll(), 'id', 'name' );
                            echo $form->dropDownList($model,'batch',array(),
                             array(
                                'prompt'=>'Select Batch',
                                'ajax' => array(
                                'type'=>'POST', 
                                'url'=>$this->createUrl('loadsubjects'), //or $this->createUrl('loadcities') if '$this' extends CController
                               'success'=>'js:function(data){ $("#CourseForm_subject").html(data);$("#CourseForm_subject").trigger("chosen:updated");}', //or 'success' => 'function(data){...handle the data in the way you want...}',
                              'data'=>array('batches'=>'js:this.value'),
                              ),'class'=>'form-control mb15')); ?>
                </div>
                <?php echo $form->error($model,'batch'); ?> </div>
              <div class="col-lg-3">
                <div class="form-group">
                  <?php  $subject = CHtml::listData(CpSubjects::model()->findAll(), 'id', 'name' );
                            echo $form->dropDownList($model,'subject',array(),
                             array('prompt'=>'Select Subject','class'=>'form-control mb15','multiple'=>true)); ?>
                </div>
                <?php echo $form->error($model,'subject'); ?> </div>
              <div class="col-lg-3">
                <div style=" padding-left:20px;">
                  <?php 
					   
						echo CHtml::ajaxSubmitButton('Save',
						CHtml::normalizeUrl(array('/privateTutor/ajaxcreate')),
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
								
						}'),array('id'=>'add_button','name'=>'','class'=>'btn btn-success','style'=>'')); 
			
						?>
                </div>
              </div>
              <?php $this->endWidget(); ?>
            </div>
            <?php }else{ echo 'Select a Category';} ?>
            
          </div>
        </div>
      </div>
    </div>
    <?php $location = PrivateTutorLocation::model()->findByAttributes(array('center_id'=>$_REQUEST['id']));
	if(isset($location) and $location != NULL)
	{
		
		echo CHtml::Link('Continue',array('privateTutor/view','id'=>$_REQUEST['id']));
	}
	else
	{
		echo CHtml::Link('Continue',array('privateTutorLocation/create','id'=>$_REQUEST['id']));
	}
	
	?>
    
  </div>
</div>