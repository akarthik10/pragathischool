<?php
$this->breadcrumbs=array(
	'St Centers'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StCenter', 'url'=>array('index')),
	array('label'=>'Create StCenter', 'url'=>array('create')),
	array('label'=>'View StCenter', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StCenter', 'url'=>array('admin')),
);
?>

<h1>Update StCenter <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>