<?php
$this->breadcrumbs=array(
	'Center Courses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CenterCourse', 'url'=>array('index')),
	array('label'=>'Create CenterCourse', 'url'=>array('create')),
	array('label'=>'Update CenterCourse', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CenterCourse', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CenterCourse', 'url'=>array('admin')),
);
?>

<h1>View CenterCourse #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'center_id',
		'course_id',
	),
)); ?>
