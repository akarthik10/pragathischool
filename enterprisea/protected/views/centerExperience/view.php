<?php
$this->breadcrumbs=array(
	'Center Experiences'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CenterExperience', 'url'=>array('index')),
	array('label'=>'Create CenterExperience', 'url'=>array('create')),
	array('label'=>'Update CenterExperience', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CenterExperience', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CenterExperience', 'url'=>array('admin')),
);
?>

<h1>View CenterExperience #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'center_id',
		'year',
		'province',
		'university',
		'degree',
		'contact_person',
		'contact_no',
	),
)); ?>
