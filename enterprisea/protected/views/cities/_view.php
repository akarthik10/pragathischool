<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
	<?php echo CHtml::encode($data->country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('province_id')); ?>:</b>
	<?php echo CHtml::encode($data->province_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Latitude')); ?>:</b>
	<?php echo CHtml::encode($data->Latitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Longitude')); ?>:</b>
	<?php echo CHtml::encode($data->Longitude); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('TimeZone')); ?>:</b>
	<?php echo CHtml::encode($data->TimeZone); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('DmaId')); ?>:</b>
	<?php echo CHtml::encode($data->DmaId); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Code')); ?>:</b>
	<?php echo CHtml::encode($data->Code); ?>
	<br />

	*/ ?>

</div>