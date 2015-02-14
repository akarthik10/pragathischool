<?php
$this->breadcrumbs=array(
	'Cp Common Pools'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CpCommonPool', 'url'=>array('index')),
	array('label'=>'Create CpCommonPool', 'url'=>array('create')),
	array('label'=>'Update CpCommonPool', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CpCommonPool', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CpCommonPool', 'url'=>array('admin')),
);
?>

<h1>View CpCommonPool #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'status',
	),
)); ?>
