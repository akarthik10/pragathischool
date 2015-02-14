<?php
$this->breadcrumbs=array(
	'Center Experiences',
);

$this->menu=array(
	array('label'=>'Create CenterExperience', 'url'=>array('create')),
	array('label'=>'Manage CenterExperience', 'url'=>array('admin')),
);
?>

<h1>Center Experiences</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
