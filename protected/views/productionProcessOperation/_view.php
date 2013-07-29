<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('price_id')); ?>:</b>
	<?php echo CHtml::encode($data->price_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_id')); ?>:</b>
	<?php echo CHtml::encode($data->work_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('work_count')); ?>:</b>
	<?php echo CHtml::encode($data->work_count); ?>
	<br />


</div>