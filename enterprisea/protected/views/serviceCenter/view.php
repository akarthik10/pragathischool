<?php
$this->breadcrumbs=array(
	'Service Centers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ServiceCenter', 'url'=>array('index')),
	array('label'=>'Create ServiceCenter', 'url'=>array('create')),
	array('label'=>'Update ServiceCenter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ServiceCenter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ServiceCenter', 'url'=>array('admin')),
);
?>

<h1>View ServiceCenter #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'service_id',
		'center_id',
		'fees',
	),
)); ?>
