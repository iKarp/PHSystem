<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_organization')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_organization),array('view','id'=>$data->id_organization)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name_organization')); ?>:</b>
	<?php echo CHtml::encode($data->name_organization); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adress_uri')); ?>:</b>
	<?php echo CHtml::encode($data->adress_uri); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('adress_fact')); ?>:</b>
	<?php echo CHtml::encode($data->adress_fact); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('telephone')); ?>:</b>
	<?php echo CHtml::encode($data->telephone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ogrn')); ?>:</b>
	<?php echo CHtml::encode($data->ogrn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('rashet_account')); ?>:</b>
	<?php echo CHtml::encode($data->rashet_account); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_name')); ?>:</b>
	<?php echo CHtml::encode($data->bank_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_kor_account')); ?>:</b>
	<?php echo CHtml::encode($data->bank_kor_account); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bank_bik')); ?>:</b>
	<?php echo CHtml::encode($data->bank_bik); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('persons_id')); ?>:</b>
	<?php echo CHtml::encode($data->persons_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inn')); ?>:</b>
	<?php echo CHtml::encode($data->inn); ?>
	<br />

	*/ ?>

</div>