<?php
$this->breadcrumbs=array(
	'Cp Common Pools'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CpCommonPool', 'url'=>array('index')),
	array('label'=>'Manage CpCommonPool', 'url'=>array('admin')),
);
?>

<h1>Create CpCommonPool</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>