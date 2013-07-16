<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_folder')); ?>:</b>
	<?php echo CHtml::encode($data->is_folder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('count')); ?>:</b>
	<?php echo CHtml::encode($data->count); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('profit')); ?>:</b>
	<?php echo CHtml::encode($data->profit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fix_cost')); ?>:</b>
	<?php echo CHtml::encode($data->fix_cost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fcost')); ?>:</b>
	<?php echo CHtml::encode($data->fcost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vcost')); ?>:</b>
	<?php echo CHtml::encode($data->vcost); ?>
	<br />

	*/ ?>

</div>