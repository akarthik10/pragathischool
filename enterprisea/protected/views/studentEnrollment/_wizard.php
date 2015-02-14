<?php
	$steps	= array(
		"step1"=>array(
			'step'=>1,
			'completed'=>false,
		),
		"step2"=>array(
			'step'=>2,
			'completed'=>false,
		),
		"step3"=>array(
			'step'=>3,
			'completed'=>false,
		),
		"step4"=>array(
			'step'=>4,
			'completed'=>false,
		),
		"step5"=>array(
			'step'=>5,
			'completed'=>false,
		),
		"step6"=>array(
			'step'=>6,
			'completed'=>false,
		),
		"step7"=>array(
			'step'=>7,
			'completed'=>false,
		),
	);	
	$caction	= Yii::app()->controller->action->id;
	$cstep		= isset($steps[$caction]['step'])?$steps[$caction]['step']:0;
	
	//students table - primary details
	$student_id	= $this->decryptToken((isset($_GET['token']))?$_GET['token']:NULL);
	$student	= Students::model()->findByPk($student_id);
	if($student!=NULL){
		$steps["step1"]["completed"]	= true;
		//students subjects
		if($student->batch_id!=NULL and $student->batch_id!=""){
			$steps["step3"]["completed"]	= true;
		}
		//students guardian
		if($student->parent_id!=NULL and $student->parent_id!=0 and $student->parent_id!=""){
			$steps["step4"]["completed"]	= true;
		}
		//students how heard about us
		if($student->how_heard_about_us!=NULL and $student->how_heard_about_us!=""){
			$steps["step6"]["completed"]	= true;
		}
		//students has paid fees
		if($student->has_paid_fees!=NULL and $student->has_paid_fees!=0){
			$steps["step7"]["completed"]	= true;
		}
	}
	//students previous details
	$previous_data	= StudentPreviousDatas::model()->findByAttributes(array('student_id'=>$student_id));
	if($previous_data!=NULL){
		$steps["step2"]["completed"]	= true;
	}
	
	//students documents
	$student_document	= StudentDocument::model()->findByAttributes(array('student_id'=>$student_id));
	if($student_document!=NULL){
		$steps["step5"]["completed"]	= true;
	}	
?>
<div class="wizard_con">
	<?php
    foreach($steps as $action=>$step){	
		$class	= "";
		$href	= "";
		if($action==$caction)
			$class	.= " current";	
		if($step['completed']){			
			$class	.= " active";
		}		
		if($cstep!=$step['step'] and $step['step']!=1 and ($step['completed'] or $steps['step'.($step['step'] - 1)]['completed'])){
			$href	= 'href="'.Yii::app()->createUrl('studentEnrollment/'.$action, array('token'=>$_GET['token'])).'"';
		}
	?>
    <div class="w_step">
    	<a <?php echo $href;?> class="<?php echo $class;?>">
			<?php echo $step['step'];?>
        </a>
    </div>
    <?php
    }
	?>
</div>