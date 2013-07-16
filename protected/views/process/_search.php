<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'is_folder',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'parent_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'is_active',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'indx',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'code',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'comment_enabled',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'amortization',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'accruals_zp',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'oncost',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'tax',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'balance',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'purchase',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'efficiency',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'price_cost',array('class'=>'span5','maxlength'=>10)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
