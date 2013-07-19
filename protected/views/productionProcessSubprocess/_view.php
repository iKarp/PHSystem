<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_price_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_price_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_id')); ?>:</b>
	<?php echo CHtml::encode($data->price_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_count')); ?>:</b>
	<?php echo CHtml::encode($data->price_count); ?>
	<br />


</div>