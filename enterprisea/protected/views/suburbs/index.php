<?php
$this->breadcrumbs=array(
	'Suburbs',
);

$this->menu=array(
	array('label'=>'Create Suburbs', 'url'=>array('create')),
	array('label'=>'Manage Suburbs', 'url'=>array('admin')),
);
?>

<h1>Suburbs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
