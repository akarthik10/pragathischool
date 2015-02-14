<?php
$this->breadcrumbs=array(
	'Suburbs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Suburbs', 'url'=>array('index')),
	array('label'=>'Manage Suburbs', 'url'=>array('admin')),
);
?>

<h1>Create Suburbs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>