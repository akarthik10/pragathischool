<?php
$this->breadcrumbs=array(
	'Suburbs'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Suburbs', 'url'=>array('index')),
	array('label'=>'Create Suburbs', 'url'=>array('create')),
	array('label'=>'Update Suburbs', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Suburbs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Suburbs', 'url'=>array('admin')),
);
?>

<h1>View Suburbs #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'city_id',
		'name',
	),
)); ?>
