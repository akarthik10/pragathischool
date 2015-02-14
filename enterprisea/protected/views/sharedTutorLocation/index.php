<?php
$this->breadcrumbs=array(
	'Center Locations',
);

$this->menu=array(
	array('label'=>'Create CenterLocation', 'url'=>array('create')),
	array('label'=>'Manage CenterLocation', 'url'=>array('admin')),
);
?>

<h1>Center Locations</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
