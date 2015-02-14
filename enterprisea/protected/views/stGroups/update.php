<?php
$this->breadcrumbs=array(
	'St Groups'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StGroups', 'url'=>array('index')),
	array('label'=>'Create StGroups', 'url'=>array('create')),
	array('label'=>'View StGroups', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StGroups', 'url'=>array('admin')),
);
?>

<h1>Update StGroups <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>