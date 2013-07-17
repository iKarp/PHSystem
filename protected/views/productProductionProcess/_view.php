<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calculation_id')); ?>:</b>
	<?php echo CHtml::encode($data->calculation_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fcost')); ?>:</b>
	<?php echo CHtml::encode($data->fcost); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vcost')); ?>:</b>
	<?php echo CHtml::encode($data->vcost); ?>
	<br />


</div>