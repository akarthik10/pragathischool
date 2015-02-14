<?php
$this->breadcrumbs=array(
	'Center Locations'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CenterLocation', 'url'=>array('index')),
	array('label'=>'Create CenterLocation', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('center-location-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Center Locations</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'center-location-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'center_id',
		'name',
		'business_format',
		'registration_no',
		'tax_no',
		/*
		'vat_no',
		'is_new',
		'opertaing_from',
		'center_tutors_no',
		'students_no',
		'comp_literate',
		'ms_level',
		'computer_no',
		'is_connected',
		'isp',
		'internet_type',
		'internet_speed',
		'is_capped',
		'is_cam',
		'is_headset',
		'is_multifunction',
		'multifunction',
		'is_projector',
		'is_board',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
