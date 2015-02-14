<?php
$this->breadcrumbs=array(
	'Course Categories'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CourseCategory', 'url'=>array('index')),
	array('label'=>'Create CourseCategory', 'url'=>array('create')),
	array('label'=>'View CourseCategory', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CourseCategory', 'url'=>array('admin')),
);
?>

<h1>Update CourseCategory <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>