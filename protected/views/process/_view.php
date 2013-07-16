<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_folder')); ?>:</b>
	<?php echo CHtml::encode($data->is_folder); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price')); ?>:</b>
	<?php echo CHtml::encode($data->price); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('indx')); ?>:</b>
	<?php echo CHtml::encode($data->indx); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('comment_enabled')); ?>:</b>
	<?php echo CHtml::encode($data->comment_enabled); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('amortization')); ?>:</b>
	<?php echo CHtml::encode($data->amortization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accruals_zp')); ?>:</b>
	<?php echo CHtml::encode($data->accruals_zp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('oncost')); ?>:</b>
	<?php echo CHtml::encode($data->oncost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax')); ?>:</b>
	<?php echo CHtml::encode($data->tax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('balance')); ?>:</b>
	<?php echo CHtml::encode($data->balance); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('purchase')); ?>:</b>
	<?php echo CHtml::encode($data->purchase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('efficiency')); ?>:</b>
	<?php echo CHtml::encode($data->efficiency); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_cost')); ?>:</b>
	<?php echo CHtml::encode($data->price_cost); ?>
	<br />

	*/ ?>

</div>