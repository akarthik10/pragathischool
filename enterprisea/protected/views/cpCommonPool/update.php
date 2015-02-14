<?php
$this->breadcrumbs=array(
	'Cp Common Pools'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CpCommonPool', 'url'=>array('index')),
	array('label'=>'Create CpCommonPool', 'url'=>array('create')),
	array('label'=>'View CpCommonPool', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CpCommonPool', 'url'=>array('admin')),
);
?>

<h1>Update CpCommonPool <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>