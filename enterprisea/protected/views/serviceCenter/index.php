<?php
$this->breadcrumbs=array(
	'Service Centers',
);

$this->menu=array(
	array('label'=>'Create ServiceCenter', 'url'=>array('create')),
	array('label'=>'Manage ServiceCenter', 'url'=>array('admin')),
);
?>

<h1>Service Centers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
