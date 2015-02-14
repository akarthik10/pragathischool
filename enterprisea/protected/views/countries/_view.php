<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FIPS104')); ?>:</b>
	<?php echo CHtml::encode($data->FIPS104); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISO2')); ?>:</b>
	<?php echo CHtml::encode($data->ISO2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISO3')); ?>:</b>
	<?php echo CHtml::encode($data->ISO3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ISON')); ?>:</b>
	<?php echo CHtml::encode($data->ISON); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Internet')); ?>:</b>
	<?php echo CHtml::encode($data->Internet); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Capital')); ?>:</b>
	<?php echo CHtml::encode($data->Capital); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('MapReference')); ?>:</b>
	<?php echo CHtml::encode($data->MapReference); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NationalitySingular')); ?>:</b>
	<?php echo CHtml::encode($data->NationalitySingular); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('NationalityPlural')); ?>:</b>
	<?php echo CHtml::encode($data->NationalityPlural); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Currency')); ?>:</b>
	<?php echo CHtml::encode($data->Currency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CurrencyCode')); ?>:</b>
	<?php echo CHtml::encode($data->CurrencyCode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Population')); ?>:</b>
	<?php echo CHtml::encode($data->Population); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Title')); ?>:</b>
	<?php echo CHtml::encode($data->Title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Comment')); ?>:</b>
	<?php echo CHtml::encode($data->Comment); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	*/ ?>

</div>