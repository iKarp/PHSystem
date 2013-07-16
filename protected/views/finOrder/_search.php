<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
    'type'=>'horizontal'
)); ?>

	<?php echo $form->textFieldRow($model,'data_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'cdate',array('class'=>'span5', 'append'=>'.00')); ?>

	<?php echo $form->textFieldRow($model,'doc_type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'agent_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'face_id',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'type_id',array('class'=>'span5','maxlength'=>11)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Поиск',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
