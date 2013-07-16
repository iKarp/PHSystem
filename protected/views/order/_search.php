<?php
/* @var $this OrderController */
/* @var $model Order */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num'); ?>
		<?php echo $form->textField($model,'num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cdate'); ?>
		<?php echo $form->textField($model,'cdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'organization_id'); ?>
		<?php echo $form->textField($model,'organization_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'performer_id'); ?>
		<?php echo $form->textField($model,'performer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'took'); ?>
		<?php echo $form->textField($model,'took',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'manager_id'); ?>
		<?php echo $form->textField($model,'manager_id',array('size'=>11,'maxlength'=>11)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'production_num'); ?>
		<?php echo $form->textField($model,'production_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'production_fio'); ?>
		<?php echo $form->textField($model,'production_fio',array('size'=>60,'maxlength'=>150)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'design'); ?>
		<?php echo $form->textArea($model,'design',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'specification'); ?>
		<?php echo $form->textArea($model,'specification',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'bill_num'); ?>
		<?php echo $form->textField($model,'bill_num',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sum'); ?>
		<?php echo $form->textField($model,'sum'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'deadline'); ?>
		<?php echo $form->textField($model,'deadline'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->