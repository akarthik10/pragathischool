<?php
$this->breadcrumbs=array(
	'St Group Members'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List StGroupMembers', 'url'=>array('index')),
	array('label'=>'Manage StGroupMembers', 'url'=>array('admin')),
);
?>

<h1>Create StGroupMembers</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>