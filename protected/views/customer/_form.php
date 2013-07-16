<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'customer-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name_organization',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'adress_uri',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'adress_fact',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'telephone',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'ogrn',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'rashet_account',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'bank_name',array('class'=>'span5','maxlength'=>255)); ?>

	<?php echo $form->textFieldRow($model,'bank_kor_account',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'bank_bik',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'persons_id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'inn',array('class'=>'span5','maxlength'=>20)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
