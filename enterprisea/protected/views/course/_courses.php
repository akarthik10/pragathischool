<?php
$courses	= Course::model()->findAllByAttributes(array('category'=>$category));
if(count($courses)==0){
?>
<div class="panel panel-default">
	<div class="panel-heading">
		<h4 class="panel-title">
			<a>                  
			<?php
			if($category==0){
				echo 'Select school type and course category first.';				
			}
			else{
				echo 'Courses Not found';
			}
			?>
			</a>
		</h4>
	</div>
</div>
<?php
}
else{
	foreach($courses as $course){
		$this->renderPartial('//course/_ind', array('course'=>$course));
	}
}
?>