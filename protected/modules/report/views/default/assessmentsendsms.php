

<?php
if(isset($_REQUEST['examid']))
{ 
?>

	<!-- Header -->

	<!-- End Header -->

	<?php
    if(isset($_REQUEST['id']))
    {  
        $college=Configurations::model()->findByPk(1);
                            $from = $college->config_value;

    $students=Students::model()->findAll("batch_id=:x and is_active=:y and is_deleted=:z", array(':x'=>$_REQUEST['id'],':y'=>1,':z'=>0)); ?>
    <!-- Batch details -->
   
            	<?php 
				$batch = Batches::model()->findByAttributes(array('id'=>$_REQUEST['id']));
				$course = Courses::model()->findByAttributes(array('id'=>$batch->course_id));
				?>
                
					<!--<?php 
					if($course->course_name!=NULL)
						echo ucfirst($course->course_name);
					else
						echo '-';
					?>
				
					<?php 
					if($batch->name!=NULL)
						echo ucfirst($batch->name);
					else
						echo '-';
					?>-->
				
            	
					<?php 
					if($students!=NULL)
						echo "Sending SMS to ". count($students)." students";
					else
						echo '-';
					?>
				
           
     
   
   <?php
    }
    ?>
    
   <!--<?php echo Yii::t('students','Adm No.');?>-->
                <!--<?php echo Yii::t('students','Name');?>-->
                <?php
				$exams = Exams::model()->findAllByAttributes(array('exam_group_id'=>$_REQUEST['examid']));
				
				// foreach($exams as $exam) // Creating subject column(s)
				// {
    //             	$subject=Subjects::model()->findByAttributes(array('id'=>$exam->subject_id));
				// 
    //             	<!--<?php if(count($exams)>7){ echo @$subject->code; } else { echo @$subject->name; }
    //                 $subjectnames[] = $subject->name;
    //             
				// }
				
			foreach($students as $student) // Creating row corresponding to each student.
			{
			
            $to = "";
                if($student->phone1)
                {
                    $to = $student->phone1;
                }
                else{
                    $to = $student->phone2;
                }
                $message = "";
                	
                    	$message .= "(". $student->admission_no .")" ; 
                    
                	   $message .= ucfirst($student->first_name).'  '.ucfirst($student->middle_name).'  '.ucfirst($student->last_name) . "\r\n";
						echo ucfirst($student->first_name).'  '.ucfirst($student->middle_name).'  '.ucfirst($student->last_name); ?>
					
                    <?php
					
                    foreach($exams as $exam) // Creating subject column(s)
					{
					$score = ExamScores::model()->findByAttributes(array('student_id'=>$student->id,'exam_id'=>$exam->id));
					$subject=Subjects::model()->findByAttributes(array('id'=>$exam->subject_id));
					if($score->marks!=NULL or $score->remarks!=NULL)
					{
					
									if($score->marks!=NULL)
                                    {
                                        // echo $score->marks;
                                        $message .= $subject->name.' :'. $score->marks . "\r\n";
                                    }
									
									
									// if($score->remarks!=NULL)
									// 	echo $score->remarks;
									// else
									// 	echo '-';
									
					}
					
					
					}
                    if($to != "")
                    {
                        SmsSettings::model()->sendSms($to,$from,$message);
                    }
					
			}
			
}
else
{
	echo '<td align="center" colspan="5"><strong>'.'No Data Available!'.'</td>';
}
?>
</div>