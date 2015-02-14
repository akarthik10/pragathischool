<?php
$this->breadcrumbs=array(
	'Subjects Common Pools'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List SubjectsCommonPool', 'url'=>array('index')),
	array('label'=>'Create SubjectsCommonPool', 'url'=>array('create')),
	array('label'=>'Update SubjectsCommonPool', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SubjectsCommonPool', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SubjectsCommonPool', 'url'=>array('admin')),
);
?>

<h1>View SubjectsCommonPool #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'status',
	),
)); ?>
