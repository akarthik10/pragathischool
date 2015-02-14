<?php
$this->breadcrumbs=array(
	'Service Centers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ServiceCenter', 'url'=>array('index')),
	array('label'=>'Create ServiceCenter', 'url'=>array('create')),
	array('label'=>'View ServiceCenter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ServiceCenter', 'url'=>array('admin')),
);
?>

<h1>Update ServiceCenter <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>