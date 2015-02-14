<?php
$this->breadcrumbs=array(
	'Curriculum Providers',
);

$this->menu=array(
	array('label'=>'Create CurriculumProviders', 'url'=>array('create')),
	array('label'=>'Manage CurriculumProviders', 'url'=>array('admin')),
);
?>

<h1>Curriculum Providers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
