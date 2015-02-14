<?php
$this->breadcrumbs=array(
	'Service Centers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ServiceCenter', 'url'=>array('index')),
	array('label'=>'Manage ServiceCenter', 'url'=>array('admin')),
);
?>

<h1>Create ServiceCenter</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>