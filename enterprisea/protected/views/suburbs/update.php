<?php
$this->breadcrumbs=array(
	'Suburbs'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Suburbs', 'url'=>array('index')),
	array('label'=>'Create Suburbs', 'url'=>array('create')),
	array('label'=>'View Suburbs', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Suburbs', 'url'=>array('admin')),
);
?>

<h1>Update Suburbs <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>