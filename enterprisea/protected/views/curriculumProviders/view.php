<?php
$this->breadcrumbs=array(
	'Curriculum Providers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CurriculumProviders', 'url'=>array('index')),
	array('label'=>'Create CurriculumProviders', 'url'=>array('create')),
	array('label'=>'Update CurriculumProviders', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CurriculumProviders', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CurriculumProviders', 'url'=>array('admin')),
);
?>

<h1>View CurriculumProviders #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'course_id',
		'name',
		'status',
	),
)); ?>
