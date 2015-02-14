<?php
$this->breadcrumbs=array(
	'Cp Subjects'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CpSubjects', 'url'=>array('index')),
	array('label'=>'Manage CpSubjects', 'url'=>array('admin')),
);
?>

<h1>Create CpSubjects</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>