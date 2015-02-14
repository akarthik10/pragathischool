<?php
$this->breadcrumbs=array(
	'Cp Subjects',
);

$this->menu=array(
	array('label'=>'Create CpSubjects', 'url'=>array('create')),
	array('label'=>'Manage CpSubjects', 'url'=>array('admin')),
);
?>

<h1>Cp Subjects</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
