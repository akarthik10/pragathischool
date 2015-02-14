<?php
$cproviders	= CurriculumProviders::model()->findAllByAttributes(array('status'=>1, 'course_id'=>$course->id));
if(count($cproviders)==0){
?>
	<div>No curriculum providers found</div>
<?php				
}
else{
	foreach($cproviders as $cprovider){
		$this->renderPartial('//curriculumProviders/_ind', array('cprovider'=>$cprovider));
	}
}
?>