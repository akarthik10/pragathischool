<div class="se_panel">
    <div class="col-md-12 se_header">
        <div class="col-sm-4 se_logo"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.jpg" ></div>
        <div class="col-sm-8 se_head"> <h2>Student Enrolment - Select Subjects</h2></div>
    </div>
    <div class="row">        
        <div class="col-md-4">
            <?php $this->renderPartial('_leftside');?>
        </div><!-- col-sm-6 -->
        
        <div class="col-md-8">
        	<?php $this->renderPartial('_wizard');?>
        	<div class="col-md-12 se_panel_formwrap">
            	<div class="wiz_right">
                	<div class="table-responsive">
                        <table class="table table-bordered mb30">
                            <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>Curriculum Provider</th>
                                    <th><?php echo $model->getAttributeLabel('subject_id');?></th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="cp-common-pool">
                                <?php
                                if(count($datas)==0){
                                ?>
                                <tr>
                                    <td colspan="7" align="center">No data</td>
                                </tr>
                                <?php
                                }
                                else{
                                    foreach($datas as $key=>$data){
                                    ?>
                                    <tr>
                                        <td><?php echo $key+1;?></td>
                                        <td>
										<?php
                                        	echo ($data->subject_id!=NULL)?EnrollmentBatches::model()->findByPk($data->batch_id)->name:'-';
										?>
                                        </td>
                                        <td>
										<?php
                                        	echo ($data->subject_id!=NULL)?EnrollmentSubjects::model()->findByPk($data->subject_id)->name:'-';
										?>
                                        </td>
                                        <td>
                                            <?php echo CHtml::link('<i class="fa fa-trash-o"></i>', array('step3', 'token'=>$_GET['token'], 'id'=>$data->id, 'action'=>'remove'), array('confirm'=>'Are you sure ?'));?>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
					<?php $form=$this->beginWidget('CActiveForm', array(
                        'id'=>'student-enroll-subjects-form',
                        'enableAjaxValidation'=>false,
                        'htmlOptions'=>array(
                            'style'=>'min-height:600px;'
                        ),
                    )); ?>
                    <?php echo CHtml::hiddenField('StudentSubjects[student_id]', $student->id);?>
                    <h4 class="text-success">SUBJECTS ENROLLING FOR</h4>
                    <div class="row mb10">
                        <div class="col-md-4">
                            <?php
                            $criteria				= new CDbCriteria;
                            $criteria->join			= 'INNER JOIN `center_course` `cc` ON `cc`.`course_id`=`t`.`id` INNER JOIN `center` `c` ON `c`.`id`=`cc`.`center_id` INNER JOIN `students` `s` ON `s`.`tenant`=`c`.`tenant`';
                            $criteria->condition	= '`s`.`id`=:student_id';
                            $criteria->params		= array(':student_id'=>$student->id);
                            $categories	= CHtml::listData( CourseCategory::model()->findAll($criteria), 'id', 'category' );
                            echo CHtml::dropDownList('category',
                                '',
                                $categories,
                                array(
                                    'prompt'=>'Select course category',
                                    'id'=>'ccategory',
                                    'class'=>'form-control chosen-select',
                                    'ajax'=>array(
                                        'type'=>'GET', //request type
                                        'url'=>Yii::app()->createUrl('studentEnrollment/courses'), //url to call.
                                        'success'=>'js:function(data){
                                            $("#ccourse").html(data);
                                            $("#ccourse").trigger("chosen:updated");
                                        }', //selector to update
                                        'data'=>'js:{category:this.value, center:"'.$student->tenant.'"}' 
                                    ),
                                )
                            );
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?php                    
                            echo CHtml::dropDownList('course',
                                '',
                                array(),
                                array(
                                    'prompt'=>'Select grade',
                                    'id'=>'ccourse',
                                    'class'=>'form-control chosen-select',
                                    'ajax'=>array(
                                        'type'=>'GET', //request type
                                        'url'=>Yii::app()->createUrl('studentEnrollment/batches'), //url to call.
                                        'success'=>'js:function(data){
                                            $("#cbatch").html(data);
                                            $("#cbatch").trigger("chosen:updated");
                                        }', //selector to update
                                        'data'=>'js:{course:this.value, center:"'.$student->tenant.'"}' 
                                    ),
                                )
                            );
                            ?>
                        </div>
                        <div class="col-md-4">
                            <?php                    
                            echo CHtml::dropDownList('StudentSubjects[batch_id]',
                                '',
                                array(),
                                array(
                                    'prompt'=>'Select curriculum provider',
                                    'id'=>'cbatch',
                                    'class'=>'form-control chosen-select'
                                )
                            );
                            ?>
                        </div>
                    </div>                
                    <div id="subjects">
                        <?php //$this->renderPartial('_step3', array('model'=>$model, 'center'=>$center));?>
                    </div>
                    <?php $this->endWidget(); ?>
             	</div>
        	</div>
        </div><!-- col-sm-6 -->
    </div><!-- row -->
    
    <div class="signup-footer clearfix">
        <div class="pull-left">
            &copy; 2014. All Rights Reserved.
        </div>
        <div class="pull-right">
            Created By: <a href="http://wiwo.in/" target="_blank">wiwo</a>
        </div>
    </div>
</div>

<script>
$('#cbatch').change(function(e) {
    var batch	= $(this).val();
	$.ajax({
		url:'<?php echo Yii::app()->createUrl('studentEnrollment/subjects');?>',
		data:{batch:batch, center:"<?php echo $student->tenant;?>"},
		success: function(response){
			$('#subjects').html(response);
		}
	});
});

$('#student-enroll-subjects-form').on('submit', function(){
	var that	= this,
		datas	= $(that).serialize();
	$.ajax({
		url:'',
		type:'POST',
		data:datas,
		dataType:"json",
		beforeSend: function(){
			
		},
		success: function(response){
			if(response.status=="success"){
				document.location	= response.redirect;
			}
			else{
				$('#ermsg').text(response.message).show();
			}
		}
	});
	return false;
});
</script>