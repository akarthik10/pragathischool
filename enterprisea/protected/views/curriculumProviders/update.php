<?php
$this->breadcrumbs=array(
	'Curriculum Providers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CurriculumProviders', 'url'=>array('index')),
	array('label'=>'Create CurriculumProviders', 'url'=>array('create')),
	array('label'=>'View CurriculumProviders', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CurriculumProviders', 'url'=>array('admin')),
);
?>

<h1>Update CurriculumProviders <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>