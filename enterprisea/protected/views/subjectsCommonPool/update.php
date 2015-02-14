<?php
$this->breadcrumbs=array(
	'Subjects Common Pools'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SubjectsCommonPool', 'url'=>array('index')),
	array('label'=>'Create SubjectsCommonPool', 'url'=>array('create')),
	array('label'=>'View SubjectsCommonPool', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SubjectsCommonPool', 'url'=>array('admin')),
);
?>

<h1>Update SubjectsCommonPool <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>