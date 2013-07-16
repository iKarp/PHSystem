<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'fin-order-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'data_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'value',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'agent_str',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'comment',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'cdate',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'doc_type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'agent_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'face_id',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'type_id',array('class'=>'span5','maxlength'=>11)); ?>

	<?php echo $form->textFieldRow($model,'number_1c',array('class'=>'span5','maxlength'=>40)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
