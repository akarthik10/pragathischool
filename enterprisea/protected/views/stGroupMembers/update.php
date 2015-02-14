<?php
$this->breadcrumbs=array(
	'St Group Members'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List StGroupMembers', 'url'=>array('index')),
	array('label'=>'Create StGroupMembers', 'url'=>array('create')),
	array('label'=>'View StGroupMembers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage StGroupMembers', 'url'=>array('admin')),
);
?>

<h1>Update StGroupMembers <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>