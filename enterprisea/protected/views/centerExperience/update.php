<?php
$this->breadcrumbs=array(
	'Center Experiences'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CenterExperience', 'url'=>array('index')),
	array('label'=>'Create CenterExperience', 'url'=>array('create')),
	array('label'=>'View CenterExperience', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CenterExperience', 'url'=>array('admin')),
);
?>

<h1>Update CenterExperience <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>