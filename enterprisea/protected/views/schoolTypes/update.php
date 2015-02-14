<?php
$this->breadcrumbs=array(
	'School Types'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SchoolTypes', 'url'=>array('index')),
	array('label'=>'Create SchoolTypes', 'url'=>array('create')),
	array('label'=>'View SchoolTypes', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SchoolTypes', 'url'=>array('admin')),
);
?>

<h1>Update SchoolTypes <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>