<?php
/* @var $this OrderController */
/* @var $data Order */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num')); ?>:</b>
	<?php echo CHtml::encode($data->num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_id')); ?>:</b>
	<?php echo CHtml::encode($data->status_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cdate')); ?>:</b>
	<?php echo CHtml::encode($data->cdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('organization_id')); ?>:</b>
	<?php echo CHtml::encode($data->organization_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('performer_id')); ?>:</b>
	<?php echo CHtml::encode($data->performer_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('took')); ?>:</b>
	<?php echo CHtml::encode($data->took); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('manager_id')); ?>:</b>
	<?php echo CHtml::encode($data->manager_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('production_num')); ?>:</b>
	<?php echo CHtml::encode($data->production_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('production_fio')); ?>:</b>
	<?php echo CHtml::encode($data->production_fio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('design')); ?>:</b>
	<?php echo CHtml::encode($data->design); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('specification')); ?>:</b>
	<?php echo CHtml::encode($data->specification); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bill_num')); ?>:</b>
	<?php echo CHtml::encode($data->bill_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sum')); ?>:</b>
	<?php echo CHtml::encode($data->sum); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('deadline')); ?>:</b>
	<?php echo CHtml::encode($data->deadline); ?>
	<br />

	*/ ?>

</div>