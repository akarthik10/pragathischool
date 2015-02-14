<?php
$this->breadcrumbs=array(
	'St Group Members'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List StGroupMembers', 'url'=>array('index')),
	array('label'=>'Create StGroupMembers', 'url'=>array('create')),
	array('label'=>'Update StGroupMembers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete StGroupMembers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage StGroupMembers', 'url'=>array('admin')),
);
?>

<h1>View StGroupMembers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'group_id',
		'tutor_id',
	),
)); ?>
