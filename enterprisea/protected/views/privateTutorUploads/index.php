<?php
$this->breadcrumbs=array(
	'Center Uploads',
);

$this->menu=array(
	array('label'=>'Create CenterUploads', 'url'=>array('create')),
	array('label'=>'Manage CenterUploads', 'url'=>array('admin')),
);
?>

<div class="contentpanel">
	<div class="col-sm-9 col-lg-12">
<h1>Center Uploads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
</div>