<?php
$this->breadcrumbs=array(
	'Center Courses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CenterCourse', 'url'=>array('index')),
	array('label'=>'Create CenterCourse', 'url'=>array('create')),
	array('label'=>'View CenterCourse', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CenterCourse', 'url'=>array('admin')),
);
?>

<h1>Update CenterCourse <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>