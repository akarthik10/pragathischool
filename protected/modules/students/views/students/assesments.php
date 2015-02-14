<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Assessments',
);


?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="247" valign="top">
    <div class="emp_cont_left">
    <?php $this->renderPartial('profileleft');?>
    
    </div>
    </td>
    <td valign="top">
    <div class="cont_right formWrapper">
    
    <h1 style="margin-top:.67em;"><?php echo Yii::t('students','Student Profile : ');?><?php echo $model->first_name.'&nbsp;'.$model->last_name; ?><br /></h1>
        
    <div class="edit_bttns last">
    <ul>
    <li>
    <?php echo CHtml::link(Yii::t('students','<span>Edit</span>'), array('update', 'id'=>$model->id),array('class'=>' edit ')); ?>
    </li>
     <li>
    <?php echo CHtml::link(Yii::t('students','<span>Students</span>'), array('students/manage'),array('class'=>'edit last'));?>
    </li>
    </ul>
    </div>
    
    
    <div class="clear"></div>
    <div class="emp_right_contner">
    <div class="emp_tabwrapper">
    <?php $this->renderPartial('tab');?>
    <div class="clear"></div>
    <div class="emp_cntntbx" >
    <?php
	$exam = ExamScores::model()->findAll("student_id=:x", array(':x'=>$_REQUEST['id']));
	?>
    <div class="tableinnerlist">
    <table width="100%" cellpadding="0" cellspacing="0">
    <tr>
    <th><?php echo Yii::t('students','Exam Group Name');?></th>
    <th><?php echo Yii::t('students','Subject');?></th>
    <th><?php echo Yii::t('students','Score');?></th>
    <th><?php echo Yii::t('students','Result');?></th>
    </tr>

    <?php
	if($exam!=NULL){
		foreach($exam as $exams)
		{
			echo '<tr>';
			$exm=Exams::model()->findByAttributes(array('id'=>$exams->exam_id));
			$group=ExamGroups::model()->findByAttributes(array('id'=>$exm->exam_group_id));
			$grades = GradingLevels::model()->findAllByAttributes(array('batch_id'=>$exams->grading_level_id));
			$t = count($grades);
			echo '<td>'.$group->name.'</td>';
			$sub=Subjects::model()->findByAttributes(array('id'=>$exm->subject_id));
			echo '<td>'.$sub->name.'</td>';
			if($group->exam_type == 'Marks') {  
				  echo "<td>".$exams->marks."</td>"; } 
				  else if($group->exam_type == 'Grades') {
				   echo "<td>";
				        
				   foreach($grades as $grade)
						{
							
						 if($grade->min_score <= $exams->marks)
							{	
								$grade_value =  $grade->name;
							}
							else
							{
								$t--;
								
								continue;
								
							}
						echo $grade_value ;
						break;
						
						}
						if($t<=0) 
							{
								$glevel = " No Grades" ;
							} 
						echo "</td>"; 
						} 
				   else if($group->exam_type == 'Marks And Grades'){
					echo "<td>"; foreach($grades as $grade)
						{
							
						 if($grade->min_score <= $exams->marks)
							{	
								$grade_value =  $grade->name;
							}
							else
							{
								$t--;
								
								continue;
								
							}
						echo $exams->marks . " & ".$grade_value ;
						break;
						
							
						} 
						if($t<=0) 
							{
								echo $exams->marks." & No Grades" ;
							}
						echo "</td>"; } 
			if($exams->is_failed==NULL)
			echo '<td>Passed</td>';
			else
			echo '<td>Failed</td>';
			echo '</tr>';
		}
	}
	else{
		echo '<tr>';
			echo '<td colspan="4"> No Exam Details Available!</td>';
		echo '<tr>';
		
	}
	?>    </table>
    </div>
    
    <br />
    
    </div>
    </div>
    
    </div>
    </div>
   
    </td>
  </tr>
</table>