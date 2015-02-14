<?php
$this->breadcrumbs=array(
	'Centers'=>array('index'),
	$model->name,
);

?>

<h1>View Center </h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		
		'center_name',
		'pd_title',
		'name',
		'm_name',
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
		
	
		'po_country',
		'po_province',
		'po_city',
		'po_suburb',
		'po_zipcode',
		'po_box',
		'email',
		'skype',
		
		'qualification',
		
		'registered_sace',
		'sace_number',
		
		
		
		'achievements',
	),
)); ?>
