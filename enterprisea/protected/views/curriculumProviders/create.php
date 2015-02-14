<?php
$this->breadcrumbs=array(
	'Curriculum Providers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CurriculumProviders', 'url'=>array('index')),
	array('label'=>'Manage CurriculumProviders', 'url'=>array('admin')),
);
?>

<h1>Create CurriculumProviders</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>