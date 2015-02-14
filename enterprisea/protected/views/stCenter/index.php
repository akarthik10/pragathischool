<?php
$this->breadcrumbs=array(
	'St Centers',
);

$this->menu=array(
	array('label'=>'Create StCenter', 'url'=>array('create')),
	array('label'=>'Manage StCenter', 'url'=>array('admin')),
);
?>

<h1>St Centers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
