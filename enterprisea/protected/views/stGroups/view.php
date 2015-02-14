<?php
$this->breadcrumbs=array(
	'St Groups'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List StGroups', 'url'=>array('index')),
	array('label'=>'Create StGroups', 'url'=>array('create')),
	array('label'=>'Update StGroups', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StGroups', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StGroups', 'url'=>array('admin')),
);
?>

<h1>View StGroups #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'batch_id',
		'name',
	),
)); ?>
