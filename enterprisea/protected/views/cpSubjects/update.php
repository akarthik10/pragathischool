<?php
$this->breadcrumbs=array(
	'Cp Subjects'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CpSubjects', 'url'=>array('index')),
	array('label'=>'Create CpSubjects', 'url'=>array('create')),
	array('label'=>'View CpSubjects', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CpSubjects', 'url'=>array('admin')),
);
?>

<h1>Update CpSubjects <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>