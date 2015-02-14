<?php
$this->breadcrumbs=array(
	'St Centers'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StCenter', 'url'=>array('index')),
	array('label'=>'Create StCenter', 'url'=>array('create')),
	array('label'=>'Update StCenter', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StCenter', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StCenter', 'url'=>array('admin')),
);
?>

<h1>View StCenter #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'group_id',
		'center_id',
	),
)); ?>
