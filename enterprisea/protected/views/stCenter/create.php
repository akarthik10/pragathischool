<?php
$this->breadcrumbs=array(
	'St Centers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StCenter', 'url'=>array('index')),
	array('label'=>'Manage StCenter', 'url'=>array('admin')),
);
?>

<h1>Create StCenter</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>