<div class="view">

	


	<b><?php echo CHtml::encode($data->getAttributeLabel('center_name')); ?>:</b>
	<?php echo CHtml::encode($data->center_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pd_title')); ?>:</b>
	<?php echo CHtml::encode($data->pd_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('m_name')); ?>:</b>
	<?php echo CHtml::encode($data->m_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surname')); ?>:</b>
	<?php echo CHtml::encode($data->surname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('marital_status')); ?>:</b>
	<?php echo CHtml::encode($data->marital_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($data->dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('age')); ?>:</b>
	<?php echo CHtml::encode($data->age); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birth_place')); ?>:</b>
	<?php echo CHtml::encode($data->birth_place); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nationality')); ?>:</b>
	<?php echo CHtml::encode($data->nationality); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ethnicity')); ?>:</b>
	<?php echo CHtml::encode($data->ethnicity); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passport_id')); ?>:</b>
	<?php echo CHtml::encode($data->passport_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax_no')); ?>:</b>
	<?php echo CHtml::encode($data->tax_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language')); ?>:</b>
	<?php echo CHtml::encode($data->language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion')); ?>:</b>
	<?php echo CHtml::encode($data->religion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spouse_name')); ?>:</b>
	<?php echo CHtml::encode($data->spouse_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spouse_dob')); ?>:</b>
	<?php echo CHtml::encode($data->spouse_dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spouse_passport_id')); ?>:</b>
	<?php echo CHtml::encode($data->spouse_passport_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ph_country')); ?>:</b>
	<?php echo CHtml::encode($data->ph_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ph_province')); ?>:</b>
	<?php echo CHtml::encode($data->ph_province); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ph_city')); ?>:</b>
	<?php echo CHtml::encode($data->ph_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ph_suburb')); ?>:</b>
	<?php echo CHtml::encode($data->ph_suburb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ph_zipcode')); ?>:</b>
	<?php echo CHtml::encode($data->ph_zipcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ph_address1')); ?>:</b>
	<?php echo CHtml::encode($data->ph_address1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ph_address2')); ?>:</b>
	<?php echo CHtml::encode($data->ph_address2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ph_address3')); ?>:</b>
	<?php echo CHtml::encode($data->ph_address3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ph_home_no')); ?>:</b>
	<?php echo CHtml::encode($data->ph_home_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ph_office_no')); ?>:</b>
	<?php echo CHtml::encode($data->ph_office_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ph_cell_no')); ?>:</b>
	<?php echo CHtml::encode($data->ph_cell_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_country')); ?>:</b>
	<?php echo CHtml::encode($data->po_country); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_province')); ?>:</b>
	<?php echo CHtml::encode($data->po_province); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_city')); ?>:</b>
	<?php echo CHtml::encode($data->po_city); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_suburb')); ?>:</b>
	<?php echo CHtml::encode($data->po_suburb); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_zipcode')); ?>:</b>
	<?php echo CHtml::encode($data->po_zipcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('po_box')); ?>:</b>
	<?php echo CHtml::encode($data->po_box); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skype')); ?>:</b>
	<?php echo CHtml::encode($data->skype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('occupation')); ?>:</b>
	<?php echo CHtml::encode($data->occupation); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('qualification')); ?>:</b>
	<?php echo CHtml::encode($data->qualification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timing')); ?>:</b>
	<?php echo CHtml::encode($data->timing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registered_sace')); ?>:</b>
	<?php echo CHtml::encode($data->registered_sace); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sace_number')); ?>:</b>
	<?php echo CHtml::encode($data->sace_number); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('support_center')); ?>:</b>
	<?php echo CHtml::encode($data->support_center); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sc_students')); ?>:</b>
	<?php echo CHtml::encode($data->sc_students); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sc_tutors')); ?>:</b>
	<?php echo CHtml::encode($data->sc_tutors); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grades')); ?>:</b>
	<?php echo CHtml::encode($data->grades); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('achievements')); ?>:</b>
	<?php echo CHtml::encode($data->achievements); ?>
	<br />

	*/ ?>

</div>