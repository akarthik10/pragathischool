<?php
$this->breadcrumbs=array(
	'Settings'=>array('/library'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Settings', 'url'=>array('index')),
	array('label'=>'Manage Settings', 'url'=>array('admin')),
);
?>

<h1>Create Settings</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>