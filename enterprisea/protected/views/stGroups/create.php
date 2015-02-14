<?php
$this->breadcrumbs=array(
	'St Groups'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StGroups', 'url'=>array('index')),
	array('label'=>'Manage StGroups', 'url'=>array('admin')),
);
?>

<h1>Create StGroups</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>