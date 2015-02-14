<?php
$this->breadcrumbs=array(
	'Center Courses',
);

$this->menu=array(
	array('label'=>'Create CenterCourse', 'url'=>array('create')),
	array('label'=>'Manage CenterCourse', 'url'=>array('admin')),
);
?>

<h1>Center Courses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
