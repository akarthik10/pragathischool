<?php
$this->breadcrumbs=array(
	'Center Courses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CenterCourse', 'url'=>array('index')),
	array('label'=>'Manage CenterCourse', 'url'=>array('admin')),
);
?>

<h1>Create CenterCourse</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>