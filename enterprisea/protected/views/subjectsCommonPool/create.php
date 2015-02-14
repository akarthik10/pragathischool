<?php
$this->breadcrumbs=array(
	'Subjects Common Pools'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SubjectsCommonPool', 'url'=>array('index')),
	array('label'=>'Manage SubjectsCommonPool', 'url'=>array('admin')),
);
?>

<h1>Create SubjectsCommonPool</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>