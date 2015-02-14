<?php
$this->breadcrumbs=array(
	'Course Categories'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CourseCategory', 'url'=>array('index')),
	array('label'=>'Manage CourseCategory', 'url'=>array('admin')),
);
?>

<h1>Create CourseCategory</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>