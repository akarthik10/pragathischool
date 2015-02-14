<?php
$this->breadcrumbs=array(
	'Centers'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Center', 'url'=>array('index')),
	array('label'=>'Create Center', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('center-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Centers</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'center-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	
		'center_name',
		'pd_title',
		
		'name',
		/*'m_name',
		'surname',
		'marital_status',
		'dob',
		'age',
		'birth_place',
		'nationality',
		'ethnicity',
		'passport_id',
		'tax_no',
		'gender',
		'language',
		'religion',
		'spouse_name',
		'spouse_dob',
		'spouse_passport_id',
		'ph_country',
		'ph_province',
		'ph_city',
		'ph_suburb',
		'ph_zipcode',
		'ph_address1',
		'ph_address2',
		'ph_address3',
		'ph_home_no',
		'ph_office_no',
		'ph_cell_no',
		'po_country',
		'po_province',
		'po_city',
		'po_suburb',
		'po_zipcode',
		'po_box',
		'email',
		'skype',
		'occupation',
		'qualification',
		'timing',
		'registered_sace',
		'sace_number',
		'support_center',
		'sc_students',
		'sc_tutors',
		'grades',
		'achievements',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
