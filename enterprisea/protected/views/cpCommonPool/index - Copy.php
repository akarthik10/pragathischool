<?php
$this->breadcrumbs=array(
	'Cp Common Pools',
);

$this->menu=array(
	array('label'=>'Create CpCommonPool', 'url'=>array('create')),
	array('label'=>'Manage CpCommonPool', 'url'=>array('admin')),
);
?>

<h1>Cp Common Pools</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
