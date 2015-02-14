<?php
$this->breadcrumbs=array(
	'Center Experiences'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CenterExperience', 'url'=>array('index')),
	array('label'=>'Manage CenterExperience', 'url'=>array('admin')),
);
?>

<h1>Create CenterExperience</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>