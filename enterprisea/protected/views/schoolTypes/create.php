<?php
$this->breadcrumbs=array(
	'School Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SchoolTypes', 'url'=>array('index')),
	array('label'=>'Manage SchoolTypes', 'url'=>array('admin')),
);
?>

<h1>Create SchoolTypes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>