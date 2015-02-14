<?php
$this->breadcrumbs=array(
	'School Types'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SchoolTypes', 'url'=>array('index')),
	array('label'=>'Create SchoolTypes', 'url'=>array('create')),
	array('label'=>'Update SchoolTypes', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SchoolTypes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SchoolTypes', 'url'=>array('admin')),
);
?>

<h1>View SchoolTypes #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'status',
	),
)); ?>
